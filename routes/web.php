<?php

  use App\Http\Controllers\AccountController;
  use App\Http\Controllers\AdminController;
  use App\Http\Controllers\AuthController;
  use Illuminate\Support\Facades\Route;

  Route::get('/',[AdminController::class,'index']);

  /**
   * TESTING ROUTES
   */
  Route::view('/example-page','example-page');
  Route::view('/example-auth','example-auth');

  /**
   * ADMIN ROUTES
   */
  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest'])->group(function(){
      Route::controller(AuthController::class)->group(function(){
        Route::get('/login','loginForm')->name('login');
        Route::post('/login','loginHandler')->name('login_handler');
        Route::get('/forgot-password','forgotForm')->name('forgot');
        Route::post('/send-password-reset-link','sendPasswordResetLink')->name('send_password_reset_link');
        Route::get('/password/reset/{token}','resetForm')->name('reset_password_form');
        Route::post('/reset-password-handler','resetPasswordHandler')->name('reset_password_handler');
        Route::get('/register','register')->name('register');
        Route::post('/create','createUser')->name('create');
        Route::get('/account/verify/{token}','verifyAccount')->name('verify');
        //Route::get('/register-success','registerSuccess')->name('register-success');
      });
    });

    Route::middleware(['auth'])->group(function(){
      Route::controller(AdminController::class)->group(function(){
        Route::get('/dashboard','adminDashboard')->name('dashboard');
        Route::post('/logout','logoutHandler')->name('logout');
        Route::get('/settings','settingsView')->name('settings');
        Route::get('/edit_login','editLogin')->name('edit_login');
        Route::post('/change-password','changePassword')->name('change_password');
      });
    });
  });

  //Grupo Add Account
  Route::prefix('account')->name('account.')->group(function(){
    Route::controller(AccountController::class)->group(function(){
      Route::get('/add',[AccountController::class,'addAccount'])->name('add-account');
      Route::post('/create',[AccountController::class,'createAccount'])->name('create-account');

    });
  });




