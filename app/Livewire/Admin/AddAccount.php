<?php
	
	namespace App\Livewire\Admin;
	
	use App\Helpers\AccountHelper;
	use App\Models\Budget;
	use App\Models\BudgetAccount;
	use App\Models\BudgetGroup;
	use Illuminate\Support\Facades\DB;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class AddAccount extends Component
	{
		public $isOpenAccountModal    = false;
		public $nickname,$balance,$interest,$payment;
		public $currentSection        = 1;
		public $accountTypes          = [];
		public $showGroups            = [];
		public $selectedAccountType   = null;
		public $selectedCategoryGroup = null;
		public $isButtonDisabled      = true;
		public $selectedOption        = 'existing';
		public $selectedGroup         = '';
		public $categoriesByGroup,$accountId;
		public $budgetAccounts,$activeBudgetId,$dataAccountType;
		public $accountGroups,$selectedDataAccountType;
		public $newMasterCategory     = '';
		
		// Constantes para los tipos de categoría
		const ACCOUNT_TYPES        = ['CreditCard','LineOfCredit'];
		const LOAN_CATEGORY_GROUPS = ['Mortgages','Loans'];
		const CATEGORY_MAP         = ['Budget Accounts' => 'Budget','Tracking Accounts' => 'Tracking','Mortgages and Loans' => 'Loans',];
		
		/** Limpia todos los campos */
		public function resetFields(){
			$this->nickname                = null;
			$this->balance                 = null;
			$this->interest                = null;
			$this->payment                 = null;
			$this->selectedAccountType     = null;
			$this->selectedDataAccountType = null;
			$this->selectedCategoryGroup   = null;
			$this->isButtonDisabled        = true;
			$this->selectedGroup           = '';
			$this->selectedOption          = 'existing';
		}
		
		// Registrar el listener para el evento `reorderAccounts`
		protected $listeners = ['updateOrder'];
		
		public function mount(){
			$activeBudget         = Budget::where('user_id',auth()->id())->where('is_active',true)->first();
			$this->activeBudgetId = $activeBudget->id;
			
			$this->updateAccountLists();
			$this->accountTypes      = AccountHelper::getAccountTypes();
			$this->categoriesByGroup = BudgetGroup::with('categories')->get();
			
			// Inicializa el estado de los grupos dinámicamente
			foreach($this->accountGroups as $group){
				$this->showGroups[$group->type] = true; // Inicializa cada grupo como colapsado
			}
			
			
		} //End Method
		
		#[On('account-refresh')]
		public function accountRefresh(){
			$this->updateAccountLists();
		}
		
		public function addAccountModal(){
			$this->resetFields();
			$this->showAccountModalForm();
		}
		
		public function showAccountModalForm(){
			$this->resetErrorBag();
			$this->currentSection     = 1;
			$this->isOpenAccountModal = true;
		}
		
		public function hideAccountModalForm(){
			$this->isOpenAccountModal = false;
		}
		
		public function showLinkedModal(){
			$this->currentSection = 1;
		}
		
		public function showUnlinkedModal(){
			$this->dispatch('focusInput');
			$this->currentSection = 2;
			$this->resetFields();
		}
		
		public function selectAccountType(){
			$this->dispatch('focusInput');
			$this->currentSection = 3;
		}
		
		public function selectAccount($type,$category,$dataAccountType){
			if(array_key_exists($category,self::CATEGORY_MAP)){
				$this->selectedAccountType     = $type;
				$this->selectedCategoryGroup   = self::CATEGORY_MAP[$category];
				$this->selectedDataAccountType = $dataAccountType;
				$this->currentSection          = 2;
			}
		}
		
		public function nextButtonState(){
			$isCommonFieldsEmpty = empty($this->nickname) || empty($this->selectedAccountType) || ($this->balance === '' || $this->balance === null);
			
			if($this->selectedCategoryGroup === 'Budget' || $this->selectedCategoryGroup === 'Tracking'){
				$this->isButtonDisabled = $isCommonFieldsEmpty;
			}else if($this->selectedCategoryGroup === 'Loans'){
				$this->isButtonDisabled = $isCommonFieldsEmpty || ($this->interest === '' || $this->interest === null) || ($this->payment === '' || $this->payment === null);
			}
		}
		
		public function isNextButtonEnabled(){
			return !empty($this->nickname) && !empty($this->selectedGroup) && ($this->selectedGroup != -1 ? true : !empty($this->newMasterCategory));
		}
		
		public function checkSelection(){
			// Lógica adicional si es necesario
		}
		
		private function validateNickname(){
			$this->validate([
				'nickname' => 'required|unique:budget_accounts,nickname',
			],[
				'nickname.required' => 'Se requiere el nombre de la cuenta.',
				'nickname.unique'   => 'Este nombre de cuenta ya existe.',
			]);
			
			$this->nickname = ucfirst($this->nickname);
		}
		
		private function saveAccount($isLoan = false){
			$this->validateNickname();
			$this->balance = $this->calculateBalance();
			
			// Solo calcular la fecha de pago si es un préstamo
			$payoffDate = null;
			if($isLoan){
				$payoffDate = $this->calculatePayoffDate($this->balance,$this->interest,$this->payment);
			}
			
			try{
				DB::transaction(function() use ($isLoan,$payoffDate){
					$data = ['budget_id'     => $this->activeBudgetId,
					         'nickname'      => $this->nickname,
					         'account_group' => $this->selectedCategoryGroup,
					         'data_type'     => $this->selectedDataAccountType,
					         'account_type'  => $this->selectedAccountType,
					         'balance'       => $this->balance,];
					
					if($isLoan){
						$data['interest']    = $this->interest;
						$data['payment']     = $this->payment;
						$data['payoff_date'] = $payoffDate;
					}
					
					BudgetAccount::create($data);
					$this->currentSection = 5;
				});
				
				// Código que puede lanzar una excepción
			} catch(\Exception $e){
				$this->dispatch('console-error',['error' => $e->getMessage()]);
				return false;
			}
			
		} //End Method
		
		public function saveBudgetTracking(){
			$this->saveAccount(false);
		}
		
		public function saveMortgageLoans(){
			$this->saveAccount(true);
		}
		
		private function calculateBalance(){
			$isNegativeBalance = in_array($this->selectedDataAccountType,self::ACCOUNT_TYPES) || in_array($this->selectedCategoryGroup,self::LOAN_CATEGORY_GROUPS);
			$balance           = is_numeric($this->balance) ? $this->balance : 0;
			
			return $isNegativeBalance ? abs($balance) * -1 : $balance;
		}
		
		public function saveMortgageLoansSkip(){
			dd('Save Mortgage Loans sin categoria...');
		}
		
		public function goToSection($section){
			$this->currentSection = $section;
		}
		
		private function updateAccountLists(){
			$this->budgetAccounts = BudgetAccount::where('budget_id',$this->activeBudgetId)
				->orderBy('account_group')
				->orderBy('ordering')
				->get();
			
			// Agrupar las cuentas por grupo
			$this->accountGroups = $this->budgetAccounts->groupBy('account_group')->map(function($budgetAccounts){
				$groupType                    = $budgetAccounts->first()->account_group;
				$this->showGroups[$groupType] = true;
				
				return (object)[
					'type'          => $groupType,
					'accounts'      => $budgetAccounts->map(function($account){
						return (object)[
							'id'          => $account->id,
							'budget_id'   => $this->activeBudgetId,
							'nickname'    => $account->nickname,
							'balance'     => $account->balance,
							'is_selected' => false
						];
					}),
					'total_balance' => $budgetAccounts->sum('balance')
				];
			});
			
		} //End Mtehod
		
		/* public function toggleGroup($type){
			 if(!isset($this->showGroups[$type])){
				 $this->showGroups[$type] = true;
			 }
			 $this->showGroups[$type] = !$this->showGroups[$type];
		 }*/
		
		
		public function closeBudgetAccount(){
			$this->hideAccountModalForm();
			$this->updateAccountLists();
		}
		
		public function addAnotherAccount(){
			$this->currentSection = 1;
			$this->updateAccountLists();
		}
		
		public function pairCategory(){
			$this->currentSection    = 4;
			$this->selectedOption    = 'existing';
			$this->selectedGroup     = '';
			$this->newMasterCategory = '';
		}
		
		public function setOption($option){
			$this->selectedOption    = $option;
			$this->selectedGroup     = '';
			$this->newMasterCategory = '';
		}
		
		public function openEditAccountModal($accountId){
			$this->dispatch('account-edit',$accountId);
		}
		
		public function updateOrder($orderedIds){
			// Actualiza el campo 'ordering' para cada cuenta
			foreach($orderedIds as $position => $accountId){
				BudgetAccount::where('id',$accountId)->update(['ordering' => $position + 1]);
			}
			
			// Recargar cuentas después de actualizar
			$this->updateAccountLists();
		}
		
		//funcion para calcular la feca final de pago.
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
			return view('livewire.admin.add-account');
		}
		
	}
