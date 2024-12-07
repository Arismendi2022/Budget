<?php

  use App\Http\Controllers\AccountController;
  use App\Http\Controllers\AdminController;
  use App\Http\Controllers\AuthController;
  use App\Http\Controllers\BudgetController;
  use App\Livewire\Admin\FormWizard;
  use Illuminate\Support\Facades\Route;

  Route::get('/',function(){
    return redirect()->route('admin.home');
  });

  /**
   * TESTING ROUTES
   */
  Route::view('/example-page','example-page');
  Route::view('/example-auth','example-auth');

  /**
   * ADMIN ROUTES
   */
  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest','preventBackHistory'])->group(function(){
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
      });
    });

    Route::middleware(['auth','preventBackHistory'])->group(function(){
      Route::controller(AdminController::class)->group(function(){
        Route::get('/home','adminHome')->name('home');
        Route::get('/reflect','reflectView')->name('reflect');
        Route::get('/accounts','allAccounts')->name('accounts');
        Route::get('/budgets','adminBudgets')->name('budgets');
        Route::post('/logout','logoutHandler')->name('logout');
        Route::get('/settings','settingsView')->name('settings');
        Route::get('/edit_login','editLogin')->name('edit_login');
        Route::post('/change-password','changePassword')->name('change_password');
        Route::get('/transaction','adminTransaction')->name('transaction');

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




