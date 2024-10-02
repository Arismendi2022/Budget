<?php

  namespace App\Http\Controllers;

  use App\Helpers\CMail;
  use App\Models\User;
  use App\Rules\StrongPassword;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\Hash;

  class AdminController extends Controller
  {
    public function index(){
      return redirect()->route('admin.login');
    }

    public function adminHome(Request $request){

      $user   = Auth::user();
      $budget = $user->budgetDetails()->first();

      $data = [
        'pageTitle' => 'Budget | YNAB',
        'user'      => $user,
        'budget'    => $budget,
      ];

      return view('front.pages.home',$data);
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


  }
