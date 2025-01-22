<?php
	
	namespace App\Http\Controllers;
	
	use App\Models\BudgetAccount;
	
	
	class AccountController extends Controller
	{
		public function accountAssign($accountId){
			// Buscar la cuenta asociada al presupuesto activo.
			$account = BudgetAccount::where('id',$accountId)
				->whereHas('budget',function($query){
					$query->where('is_active',true);
				})->first();
			
			$data = [
				'account'   => $account,
				'pageTitle' => "{$account->nickname} | {$account->budget->name}",
			];
			
			return view('front.pages.account_assign',$data);
			
		} //End Method
		
	}
