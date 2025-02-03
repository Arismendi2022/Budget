<?php
	
	use App\Http\Controllers\AccountController;
	use App\Http\Controllers\AdminController;
	use App\Http\Controllers\AuthController;
	use App\Http\Controllers\BudgetController;
	use App\Http\Controllers\TooltipController;
	use App\Livewire\Admin\FormWizard;
	use Illuminate\Support\Facades\Route;
	
	Route::get('/',function(){
		return redirect()->route('admin.budget');
	});
	
	/**
	 * TESTING ROUTES
	 */
	Route::view('/example-page','example-page');
	Route::view('/example-auth','example-auth');
	
	/**
	 * ADMIN ROUTES
	 */
	
	// Rutas de autenticación (accesibles solo para usuarios no autenticados)
	Route::middleware(['guest','preventBackHistory'])->group(function(){
		Route::prefix('users')->name('users.')->group(function(){
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
	});
	
	// Rutas protegidas (accesibles solo para usuarios autenticados)
	Route::middleware(['auth','preventBackHistory'])->prefix('admin')->name('admin.')->group(function(){
		// Rutas del dashboard
		Route::controller(AdminController::class)->group(function(){
			Route::get('/budget','adminBudget')->name('budget');
			Route::get('/reflect','reflectView')->name('reflect');
			Route::get('/accounts','allAccounts')->name('accounts');
			Route::get('/budgets','adminBudgets')->name('budgets');
			Route::post('/logout','logoutHandler')->name('logout');
			Route::get('/settings','settingsView')->name('settings');
			Route::get('/edit-login','editLogin')->name('edit-login');
			Route::post('/change-password','changePassword')->name('change-password');
		});
	});
	
	
	// Rutas protegidas para accounts (accesibles solo para usuarios autenticados)
	// Rutas para cuentas
	Route::middleware(['auth','preventBackHistory'])->prefix('accounts')->name('accounts.')->group(function(){
		Route::controller(AccountController::class)->group(function(){
			Route::get('/assign/{id}','accountAssign')->name('assign');
		});
	});
	
	//Grupo Add Account
	/*Route::prefix('account')->name('account.')->group(function(){
		Route::controller(AccountController::class)->group(function(){
			Route::get('/add',[AccountController::class,'addAccount'])->name('add-account');
			Route::post('/create',[AccountController::class,'createAccount'])->name('create-account');
			
		});
	});*/




