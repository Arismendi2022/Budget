<?php
	
	namespace App\Livewire\Auth;
	
	use App\UserStatus;
	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;
	
	class Login extends Component
	{
		public $email    = '';
		public $password = '';
		public $remember = false;
		
		protected $rules = [
			'email'    => 'required|email:rfc,dns|exists:users,email',
			'password' => 'required|min:8',
		];
		
		protected function messages(){
			return [
				'email.required'    => 'El campo correo electrónico es obligatorio.',
				'email.email'       => 'El formato del correo electrónico no es válido.',
				'email.exists'      => 'No pudimos encontrar una cuenta con ese correo.',
				'password.required' => 'El campo contraseña es obligatorio.',
				'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
			];
		}
		
		public function login(){
			$this->validate();
			
			// Intentar autenticar al usuario
			if(Auth::attempt(['email' => $this->email,'password' => $this->password],$this->remember)){
				session()->regenerate();
				
				if(Auth::user()->status == UserStatus::Pending){
					// Si el estado es "Pending", cerrar sesión y mostrar un mensaje
					Auth::logout();
					$this->addError('email','Tu cuenta está pendiente de activación. Por favor, revisa tu correo electrónico.');
				}else{
					//return $this->redirect(route('admin.budget'),navigate:true);
					$this->redirectIntended(default:route('admin.budget',absolute:false),navigate:true);
				}
			}else{
				// Si la autenticación falla, mostrar un error
				$this->addError('password','La contraseña es incorrecta. ¿Olvidaste tu contraseña?');
			}
			
		} //End Method
		
		public function clearError($field){
			$this->resetErrorBag($field); // Limpia el error del campo especificado
		}
		
		public function render(){
			return view('livewire.auth.login');
		}
	}
