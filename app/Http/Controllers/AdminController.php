<?php
	
	namespace App\Http\Controllers;
	
	use App\Helpers\CMail;
	use App\Models\BudgetAccount;
	use App\Models\User;
	use App\Rules\StrongPassword;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;
	
	
	class AdminController extends Controller
	{
		public function adminHome(Request $request){
			/**
			 * Verificar si el usuario está autenticado y tiene un presupuesto
			 */
			
			$user         = Auth::user();
			$activeBudget = $user->budgets()->where('is_active',true)->first();
			
			// Si no hay presupuesto activo, redirige a la vista que contiene el componente Livewire
			if($activeBudget === null){
				return redirect()->route('admin.budgets');
			}
			
			// Captura el ID y el nombre del presupuesto desde la solicitud
			$presupuestoId = $request->query('id');
			$budgetName    = $request->query('name');
			
			$data = [
				'pageTitle'    => 'Budget | '.$activeBudget->name,
				'user'         => $user,
				'activeBudget' => $activeBudget,
				'budgetName'   => $budgetName, // Agrega el nombre del presupuesto
			];
			
			return view('front.pages.home',$data);
			
		} //End Method
		
		public function reflectView(Request $request){
			$user         = Auth::user();
			$activeBudget = $user->budgets()->where('is_active',true)->first();
			
			$data = [
				'pageTitle' => 'Spending Breakdown | '.$activeBudget->name,
			];
			
			return view('front.pages.reflect',$data);
		} //End Method
		
		public function allAccounts(Request $request){
			$user         = Auth::user();
			$activeBudget = $user->budgets()->where('is_active',true)->first();
			
			$data = [
				'pageTitle' => 'All Accounts | '.$activeBudget->name,
			];
			
			return view('front.pages.accounts',$data);
		} //End Method
		
		public function adminBudgets(Request $request){
			$user         = Auth::user();
			$budgets      = $user->budgets()->get(); // Obtiene los presupuestos del usuario autenticado
			$activeBudget = $budgets->where('is_active',true)->first(); // Encuentra el presupuesto activo
			
			$data = [
				'pageTitle'    => 'Open Budget | YNAB',
				'user'         => $user,
				'budgets'      => $budgets,
				'activeBudget' => $activeBudget,
			];
			
			return view('front.pages.budgets',$data);
			
		} //End Method
		
		public function logoutHandler(Request $request){
			Auth::logout();
			$request->session()->invalidate();
			$request->session()->regenerateToken();
			return redirect()->route('admin.login');
		}  //End Method
		
		public function settingsView(Request $request){
			$user = User::findOrFail(auth()->id());
			
			$data = [
				'pageTitle' => 'Account Settings | YNAB',
				'user'      => $user,
			];
			return view('front.settings.settings',$data);
			
		} //End Method
		
		public function editLogin(Request $request){
			$user = User::findOrFail(auth()->id());
			
			$data = [
				'pageTitle' => 'Change Email & Password | YNAB',
				'user'      => $user,
			];
			
			return view('front.settings.edit-login',$data);
			
		} //End Method
		
		public function changePassword(Request $request){
			$user = User::findOrFail(auth()->id());
			
			//Validate Form
			$request->validate([
				'current_password' => [
					'required',function($attribute,$value,$fail){
						if(!Hash::check($value,Auth::user()->password)){
							return $fail(__('La contraseña actual es incorrecta'));
						}
					}
				],
				'new_password'     => ['required','min:6','max:20','different:current_password',new StrongPassword],
			],[
				'new_password.required'  => 'El campo nueva contraseña es obligatorio.',
				'new_password.min'       => 'La nueva contraseña debe tener al menos 6 caracteres.',
				'new_password.max'       => 'La nueva contraseña no debe exceder más de 20 caracteres.',
				'new_password.different' => 'La nueva contraseña debe ser diferente a la contraseña actual.',
			]);
			
			DB::beginTransaction();
			try{
				
				// Actualizar la contraseña del usuario
				$user->update([
					'password' => Hash::make($request->new_password)
				]);
				
				// Preparar datos para el correo
				$data = [
					'user'         => $user,
					'new_password' => $request->new_password,
				];
				
				// Generar el cuerpo del correo
				$mailBody = view('emails.password-changes-template',$data)->render();
				
				// Configuración del correo
				$mailConfig = [
					'recipient_address' => $user->email,
					'recipient_name'    => $user->name,
					'subject'           => 'Contraseña Cambiada',
					'body'              => $mailBody
				];
				
				// Enviar el correo
				CMail::send($mailConfig);
				
				DB::commit();
				
				return response()->json([
					'status'  => 'success',
					'message' => 'Su contraseña ha sido cambiada con éxito.'
				],200);
				
			} catch(\Exception $e){
				DB::rollBack();
				\Log::error('Error al cambiar la contraseña: '.$e->getMessage());
				
				return response()->json([
					'status'  => 'error',
					'message' => 'Se produjo un error. Inténtelo nuevamente más tarde.'
				],500);
			}
		} //End Method
		
		public function showAccountDetail($accountId){
			$account = BudgetAccount::with('budget')
				->whereHas('budget',fn($query) => $query->where('is_active',true))
				->firstWhere('id',$accountId);
			
			$data = [
				'account'   => $account,
				'pageTitle' => "{$account->nickname} | {$account->budget->name}",
			];
			
			if(request()->ajax()){
				return response()->json([
					'content' => view('front.pages.account_details',$data)->renderSections()['content'],
					'title'   => $data['pageTitle'],
				]);
			}
			
			return view('front.pages.account_details',$data);
		} //End Method
		
		
	}
