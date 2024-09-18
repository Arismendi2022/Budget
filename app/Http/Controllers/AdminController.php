<?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Hash;

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
        'new_password'     => 'required|min:5|max:20',
      ],[
        'current_password.min'  => 'La contraseña actual debe tener al menos 5 caracteres.',
        'new_password.required' => 'El campo nueva contraseña es obligatorio.',
        'new_password.min'      => 'La nueva contraseña debe tener al menos 5 caracteres.',
        'new_password.max'      => 'La nueva contraseña no debe exceder más de 20 caracteres.',
      ]);

    } //End Method


  }
