<?php
	
	namespace App\Http\Controllers;
	
	use App\Helpers\CMail;
	use App\Helpers\ConstDefaults;
	use App\Models\User;
	use App\Models\VerificationToken;
	use App\Rules\StrongPassword;
	use App\UserStatus;
	use App\UserType;
	use Illuminate\Http\Request;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	
	class AuthController extends Controller
	{
		public function loginForm(Request $request){
			$data = [
				'pageTitle' => 'Login',
			];
			return view('back.pages.auth.login',$data);
		}
		
		public function forgotForm(Request $request){
			$data = [
				'pageTitle' => 'Forgot Password',
			];
			return view('back.pages.auth.forgot',$data);
		}
		
		public function loginHandler(Request $request){
			// Validación para correo electrónico
			$request->validate([
				'email'    => 'required|email:rfc,dns|exists:users,email',
				'password' => 'required|min:6'
			],[
				'email.required'    => 'Se requiere correo electrónico.',
				'email.email'       => 'Dirección de correo electrónico no válida.',
				'email.exists'      => 'El correo electrónico no existe en el sistema.',
				'password.required' => 'Se requiere contraseña.',
				'password.min'      => 'La contraseña debe tener al menos 6 caracteres.',
			]);
			
			// Credenciales para autenticación
			$creds = [
				'email'    => $request->email,
				'password' => $request->password
			];
			
			if(Auth::attempt($creds)){
				// Check if account is inactive
				if(auth()->user()->status == UserStatus::Inactive){
					Auth::logout();
					$request->session()->invalidate();
					$request->session()->regenerateToken();
					
					return response()->json([
						'status'  => 'error',
						'message' => 'Su cuenta está inactiva en este momento. Póngase en contacto con soporte técnico en soporte@ynab.co.'
					],500);
				}
				// Check if account is in Pending mode
				if(auth()->user()->status == UserStatus::Pending){
					Auth::logout();
					$request->session()->invalidate();
					$request->session()->regenerateToken();
					
					return response()->json([
						'status'  => 'error',
						'message' => 'Su cuenta está actualmente pendiente de aprobación. Por favor, revise su correo electrónico para obtener más instrucciones.'
					],500);
				}
				
				// Redirect user to dashboard
				return response()->json([
					'status'   => 'success',
					'redirect' => route('admin.budget')
				]);
			}else{
				return response()->json([
					'success' => false,
					'errors'  => [
						'password' => ['La contraseña es incorrecta.']
					]
				],422);
			}
		}//End Method
		
		public function sendPasswordResetLink(Request $request){
			//Validate the form
			$request->validate([
				'email' => 'required|email:rfc|exists:users,email',
			],[
				'email.required' => 'Correo electronico es requerido',
				'email.email'    => 'Dirección de correo electrónico no válida',
				'email.exists'   => 'El correo electrónico no existe en el sistema',
			]);
			
			//Get user details
			$user = User::where('email',$request->email)->first();
			
			//Generate Token
			$token = base64_encode(Str::random(64));
			
			//Check if there is an existing token
			$oldToken = DB::table('password_reset_tokens')->where('email',$user->email)->first();
			
			if($oldToken){
				//Update existing token
				DB::table('password_reset_tokens')->where('email',$user->email)
					->update(['token'      => $token,
					          'created_at' => Carbon::now()]);
			}else{
				//Add new reset password token
				DB::table('password_reset_tokens')->insert([
					'email'      => $user->email,
					'token'      => $token,
					'created_at' => Carbon::now()
				]);
			}
			
			//Create clickable action link
			$actionLink = route('users.reset_password_form',['token' => $token]);
			
			$data = [
				'actionlink' => $actionLink,
				'user'       => $user
			];
			
			$mail_body = view('emails.forgot-template',$data)->render();
			
			$mailConfig = [
				'recipient_address' => $user->email,
				'recipient_name'    => $user->name,
				'subject'           => 'Reset Password',
				'body'              => $mail_body
			];
			
			// Cola para enviar correos electrónicos si es un proceso largo
			if(CMail::send($mailConfig)){
				return response()->json(['success' => true,'email' => $user->email]);
			}else{
				return response()->json(['errors' => ['email' => ['Se produjo un error. Inténtelo nuevamente más tarde.']]]);
			}
			
		}//End Methos
		
		public function resetForm(Request $request,$token = null){
			//check if token is exists
			$isTokenExists = DB::table('password_reset_tokens')->where('token',$token)->first();
			
			if(!$isTokenExists){
				return redirect()->route('users.forgot')->withErrors(['email' => 'Token no válido. Solicita otro enlace para restablecer contraseña.']);;
			}else{
				
				return view('back.pages.auth.reset')->with(['token' => $token]);
			}
		} //End Method
		
		public function resetPasswordHandler(Request $request){
			//Validate the form
			$request->validate([
				'new_password' => ['required','min:6','max:20',new StrongPassword],
			
			],[
				'required' => 'Se requiere nueva contraseña.',
				'min'      => 'La nueva contraseña debe tener al menos 6 caracteres.',
				'max'      => 'La nueva contraseña no debe exceder más de 20 caracteres.',
			]);
			
			$dbToken = DB::table('password_reset_tokens')->where('token',$request->token)->first();
			
			// Check if this token is not expired
			$diffMins = Carbon::createFromFormat('Y-m-d H:i:s',$dbToken->created_at)->diffInMinutes(Carbon::now());
			
			if($diffMins > constDefaults::tokenExpiredMinutes){
				//when token is older that 6 hours espired
				return response()->json(['errors' => ['new_password' => ['El token de restablecimiento de contraseña no es válido o ha expirado. Solicite uno nuevo.']]]);
			}
			
			//Get user details
			$user = User::where('email',$dbToken->email)->first();
			
			//Update Password
			User::where('email',$user->email)->update([
				'password' => Hash::make($request->new_password)
			]);
			
			//Send notification email this user email address than contains new password
			$data = [
				'user'         => $user,
				'new_password' => $request->new_password
			];
			
			$mail_body = view('emails.password-changes-template',$data)->render();
			
			$mailConfig = [
				'from_address'      => 'noreply@ynab.co',
				'from_name'         => 'Ynab Budget',
				'recipient_address' => $user->email,
				'recipient_name'    => $user->name,
				'subject'           => 'Password Changed',
				'body'              => $mail_body
			];
			if(CMail::send($mailConfig)){
				
				//Delete token record
				DB::table('password_reset_tokens')->where([
					'email' => $dbToken->email,
					'token' => $dbToken->token,
				])->delete();
				
				//Redirect and display message
				return response()->json(['success' => true]);
			}else{
				return response()->json(['errors' => ['new_password' => ['Algo salió mal. Inténtalo de nuevo más tarde.']]]);
			}
		} //End Method
		
		public function register(Request $request){
			$data = [
				'pageTitle'       => 'Register',
				'backgroundClass' => 'body-background--dark-shapes-inverted'
			];
			return view('back.pages.auth.register',$data);
			
		} //End Method
		
		public function createUser(Request $request){
			// Validación
			$validatedData = $request->validate([
				'email'    => 'required|email:rfc,dns|lowercase|unique:users',
				'password' => ['required','min:6','max:20',new StrongPassword],
			],[
				'email.required'    => 'Se requiere correo electrónico.',
				'email.email'       => 'Dirección de correo electrónico no válida.',
				'email.lowercase'   => 'El correo electrónico debe estar en minúsculas.',
				'email.unique'      => 'Esta dirección de correo electrónico ya está registrada.',
				'password.required' => 'Se requiere contraseña.',
				'password.min'      => 'La contraseña debe tener al menos 6 caracteres.',
				'password.max'      => 'La contraseña no debe exceder más de 20 caracteres.',
			]);
			
			// Usar transacción para las operaciones en la base de datos
			return DB::transaction(function() use ($validatedData,$request){
				// Crear el usuario
				$user = User::create([
					'email'    => $validatedData['email'],
					'password' => Hash::make($validatedData['password']),
				]);
				
				// Generar token (manteniendo la versión original)
				$token = base64_encode(Str::random(64));
				
				VerificationToken::create([
					'user_type' => UserType::Admin,
					'email'     => $user->email,
					'token'     => $token
				]);
				
				// Construir el enlace de verificación
				$actionLink = route('users.verify',['token' => $token]);
				
				// Preparar datos para la vista del correo
				$mailData = [
					'action_link' => $actionLink,
					'users_email' => $user->email,
				];
				
				// Renderizar el cuerpo del correo
				$mailBody = view('emails.verify-template',$mailData)->render();
				
				// Configurar el correo
				$mailConfig = [
					'recipient_address' => $user->email,
					'recipient_name'    => $user->name ?? '',
					'subject'           => 'Verificación de cuenta',
					'body'              => $mailBody
				];
				
				// Enviar el correo
				if(!CMail::send($mailConfig)){
					throw new \Exception('Error al enviar el correo electrónico.');
				}
				
				return response()->json([
					'status'  => 'success',
					'message' => 'Por favor revise su correo electrónico para verificar su cuenta antes de continuar.'
				],200);
			});
		} //End Method
		
		
		public function verifyAccount(Request $request,$token){
			// Buscar el token de verificación
			$verifyToken = VerificationToken::where('token',$token)->first();
			
			if(!$verifyToken){
				// Si no se encuentra el token, redirigir con un mensaje de error
				return redirect()->route('users.login');
			}
			
			// Buscar el usuario asociado al token
			$user = User::where('email',$verifyToken->email)->first();
			
			if(!$user->verified){
				// Actualizar el estado del usuario
				$user->update([
					'verified'          => true,
					'status'            => UserStatus::Active,
					'email_verified_at' => Carbon::now()
				]);
				
				// Eliminar el token de verificación usado
				$verifyToken->delete();
				
				// Redirigir a la vista de confirmación
				return view('emails.confirmation',['email' => $user->email]);
			}
			
			// Si el usuario ya está verificado, redirigir al login
			return redirect()->route('users.login');
		} //End Method
		
		
	}


