<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use App\Models\User;

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

      return view('front.pages.dashboard',$data, compact('users'));
    }

    public function logoutHandler(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('admin.login');
    }  //End Method

    public function settingsView(Request $request){
      $data = [
        'pageTitle' => 'Account Settings | YNAB',
      ];
      return view('front.pages.settings',$data);

    } //End Method

  }
