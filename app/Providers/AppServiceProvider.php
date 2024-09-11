<?php

  namespace App\Providers;

  use Illuminate\Auth\Middleware\Authenticate;
  use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
  use Illuminate\Support\Facades\Validator;
  use Illuminate\Support\ServiceProvider;

  class AppServiceProvider extends ServiceProvider
  {
    /**
     * Register any application services.
     */
    public function register():void{
      //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot():void{
      //Redirect an Authenticated User to dashboard
      RedirectIfAuthenticated::redirectUsing(function(){
        return route('admin.dashboard');
      });

      //Redirect No Authenticated User to Admin Login Page
      Authenticate::redirectUsing(function(){
        //Session::flash('fail');
        return route('admin.login');
      });

      // Definir la regla 'lowercase'
      Validator::extend('lowercase',function($attribute,$value,$parameters,$validator){
        return strtolower($value) === $value;
      });

      // Definir el mensaje de error personalizado para la regla 'lowercase'
      Validator::replacer('lowercase',function($message,$attribute,$rule,$parameters){
        return str_replace(':attribute',$attribute,$message);
      });

    }

  }
