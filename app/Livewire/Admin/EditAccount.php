<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\BudgetAccount;
	use Illuminate\Support\Facades\DB;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class EditAccount extends Component
	{
		public $isOpenEditAccountModal = false;
		public $accountId,$accountGroupType;
		public $nickname,$notes,$balance,$dataAccountType,$interest,$payment;
		
		const ACCOUNT_TYPES        = ['CreditCard','LineOfCredit'];
		const LOAN_CATEGORY_GROUPS = ['Mortgages','Loans'];
		
		#[On('account-edit')]
		public function showEditAccountModalForm($accountId){
			$budgetAccount = BudgetAccount::find($accountId);
			
			$this->accountId        = $accountId;
			$this->accountGroupType = $budgetAccount->account_group;
			$this->nickname         = $budgetAccount->nickname;
			$this->notes            = $budgetAccount->notes;
			$this->balance          = $this->formatCurrency($budgetAccount->balance);
			$this->dataAccountType  = $budgetAccount->data_type;
			$this->interest         = $this->formatCurrency($budgetAccount->interest);
			$this->payment          = $this->formatCurrency($budgetAccount->payment);
			$this->resetErrorBag();
			$this->isOpenEditAccountModal = true;
			
			$this->dispatch('focusInput');
		}
		
		private function formatCurrency($value){
			return number_format($value,2,',','.');
		}
		
		public function hideEditAccountModalForm(){
			$this->notes                  = null;
			$this->isOpenEditAccountModal = false;
		}
		
		public function updateAccount($isLoan = false){
			$this->validateNickname();
			$this->balance = $this->calculateBalance();
			
			$payoffDate = null;
			if($isLoan){
				$payoffDate = $this->calculatePayoffDate($this->balance,$this->interest,$this->payment);
			}
			
			try{
				DB::transaction(
					function() use ($isLoan,$payoffDate){
						$data = [
							'nickname' => $this->nickname,
							'notes'    => $this->notes,
							'balance'  => $this->balance,
						];
						
						if($isLoan){
							$data['interest']    = $this->convertToDecimal($this->interest);
							$data['payment']     = $this->convertToDecimal($this->payment);
							$data['payoff_date'] = $payoffDate;
						}
						
						BudgetAccount::where('id',$this->accountId)->update($data);
						$this->hideEditAccountModalForm();
					}
				);
				
				$this->dispatch('account-refresh');
				
			} catch(\Exception $e){
				$this->dispatch('console-error',['error' => $e->getMessage()]);
				return false;
			}
		}
		
		private function validateNickname(){
			$this->validate(
				[
					'nickname' => 'required|unique:budget_accounts,nickname,'.$this->accountId,
				],[
					'nickname.required' => 'Se requiere el nombre de la cuenta.',
					'nickname.unique'   => 'Este nombre de cuenta ya existe.',
				]
			);
		}
		
		private function convertToDecimal($value){
			return str_replace(['.',','],['','.'],$value);
		}
		
		public function calculateBalance(){
			$cleanedBalance    = $this->convertToDecimal($this->balance);
			$balance           = is_numeric($cleanedBalance) ? (float)$cleanedBalance : 0;
			$isNegativeBalance = in_array($this->dataAccountType,self::ACCOUNT_TYPES) || in_array($this->accountGroupType,self::LOAN_CATEGORY_GROUPS);
			
			return $isNegativeBalance ? abs($balance) * -1 : $balance;
		}
		
		public function deleteAccount(){
			try{
				DB::transaction(
					function(){
						BudgetAccount::where('id',$this->accountId)->delete();
						$this->hideEditAccountModalForm();
					}
				);
				
				$this->dispatch('account-refresh');
				
			} catch(\Exception $e){
				$this->dispatch('console-error',['error' => $e->getMessage()]);
				return false;
			}
		}
		
		public function updateBudgetTracking(){
			$this->updateAccount(false);
		}
		
		public function updateMortgageLoans(){
			$this->updateAccount(true);
		}
		
		public function refreshAccounts(){
			$this->accounts = BudgetAccount::all();
		}
		
		//funcion para calcular la fecha final de pago.
		private function calculatePayoffDate($balance,$interestRate,$minimumPayment){
			$interestRateDecimal = $interestRate / 100;
			$months              = 0;
			$balance             = abs($balance); // Asegurarse de que el saldo sea positivo
			
			while($balance > 0){
				$interest = $balance * $interestRateDecimal / 12;
				$balance  = $balance + $interest - $minimumPayment;
				$months++;
			}
			
			// Devolver la fecha en formato Y-m-d
			return now()->addMonths($months);
			
		} //End Method
		
		
		public function render(){
			return view('livewire.admin.edit-account');
		}
	}
