<?php

  namespace App\Http\Controllers;

  use App\Helpers\CMail;
  use App\Models\User;
  use App\UserStatus;
  use constDefaults;
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
      $fieldType = filter_var($request->login_id,FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

      if($fieldType == 'email'){
        $request->validate([
          'login_id' => 'required|email|exists:users,email',
          'password' => 'required'
        ],[
          'login_id.required' => 'Se requiere correo electrónico o nombre de usuario.',
          'login_id.email'    => 'Dirección de correo electrónico no válida.',
          'login_id.exists'   => 'El correo electrónico no existe en el sistema.',
          'password.required' => 'Se requiere contraseña.',
        ]);
      }else{
        $request->validate([
          'login_id' => 'required|exists:users,username',
          'password' => 'required'
        ],[
          'login_id.required' => 'Se requiere nombre de usuario o correo electrónico.',
          'login_id.exists'   => 'El usuario no existe en el sistema.',
          'password.required' => 'Se requiere contraseña.',
        ]);

      }

      $creds = [
        $fieldType => $request->login_id,
        'password' => $request->password
      ];

      if(Auth::attempt($creds)){
        // Check if account is inactive mode
        if(auth()->user()->status == UserStatus::Inactive){
          Auth::logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();

          return response()->json([
            'status' => 'error',
            'errors' => ['password' => 'Su cuenta está inactiva en este momento. Póngase en contacto con soporte técnico en soporte@ynab.co.']
          ],422);
        }
        // Check if account is in Pending mode
        if(Auth()->user()->status == UserStatus::Pending){
          Auth::logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();

          return response()->json([
            'status' => 'error',
            'errors' => ['password' => 'Su cuenta está actualmente pendiente de aprobación. Por favor, revise su correo electrónico para obtener más instrucciones.']
          ],422);
        }

        // Redirect user to dashboard
        return response()->json([
          'status'   => 'success',
          'redirect' => route('admin.dashboard')
        ]);
      }else{
        return response()->json([
          'status' => 'error',
          'errors' => ['password' => 'Contraseña incorrecta.']
        ],422);
      }
    }//End Method

    public function sendPasswordResetLink(Request $request){
      //Validate the form
      $request->validate([
        'email' => 'required|email|exists:users,email',
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
      $actionLink = route('admin.reset_password_form',['token' => $token]);

      $data = [
        'actionlink' => $actionLink,
        'user'       => $user
      ];

      $mail_body = view('email-templates.forgot-template',$data)->render();

      $mailConfig = [
        'from_address'      => 'noreply@ynab.co',
        'from_name'         => 'Ynab Budget',
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
        return redirect()->route('admin.forgot')->withErrors(['email' => 'Token no válido. Solicita otro enlace para restablecer contraseña.']);;
      }else{

        return view('back.pages.auth.reset')->with(['token' => $token]);
      }
    } //End Method

    public
    function resetPasswordHandler(Request $request
    ){
      //Validate the form
      $request->validate([
        'new_password' => 'required|min:5|max:20',

      ],[
        'required' => 'Se requiere nueva contraseña.',
        'min'      => 'La nueva contraseña debe tener al menos 5 caracteres.',
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

      $mail_body = view('email-templates.password-changes-template',$data)->render();

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

  }
