<?php

  namespace App\Http\Controllers;

  use App\Helpers\CMail;
  use App\Models\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Facades\DB;

  class AdminController extends Controller
  {
    public function index(){
      return redirect()->route('admin.login');
    }

    public function adminDashboard(Request $request){
      $data = [
        'pageTitle' => 'Budget | YNAB',
      ];
      // Recuperar todos los usuarios
      /*$users = User::all();*/
      $users = null;
      $users = User::findOrFail(Auth()->id());

      return view('front.pages.dashboard',$data,compact('users'));
    }

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
        'new_password'     => 'required|min:6|max:20|different:current_password|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
      ],[
        'new_password.required'  => 'El campo nueva contraseña es obligatorio.',
        'new_password.min'       => 'La nueva contraseña debe tener al menos 6 caracteres.',
        'new_password.max'       => 'La nueva contraseña no debe exceder más de 20 caracteres.',
        'new_password.different' => 'La nueva contraseña debe ser diferente a la contraseña actual.',
        'new_password.regex'     => 'La nueva contraseña debe contener al menos una letra mayúscula, una minúscula, un número y un carácter especial.',
      ]);

      DB::beginTransaction();
      try{

        //Update user password
        $updated = $user->update([
          'password' => Hash::make($request->new_password)
        ]);

        //Send email notification to this user
        $data = [
          'user'         => $user,
          'new_password' => $request->new_password,
        ];

        $mail_body = view('email-templates.password-changes-template',$data);

        $mail_Config = [
          'from_address'      => 'noreply@ynab.co',
          'from_name'         => 'Ynab Budget',
          'recipient_address' => $user->email,
          'recipient_name'    => $user->name,
          'subject'           => 'Password Changed',
          'body'              => $mail_body
        ];

        CMail::send($mail_Config);

        DB::commit();

        return response()->json([
          'status'  => 'success',
          'success' => 'Tu contraseña ha sido cambiada exitosamente. Por favor, inicia sesión con tu nueva contraseña.'
        ],200);

      } catch(\Exception $e){
        // En caso de cualquier error, revertimos la transacción
        DB::rollBack();

        return response()->json([
          'status' => 'error',
          'errors' => ['new_password' => ['Se produjo un error. Inténtelo nuevamente más tarde.']]
        ],500);
      }
    } //End Method


  }
