<?php
	
	namespace App\Livewire\Admin;
	
	use App\Helpers\AccountHelper;
	use App\Models\Budget;
	use App\Models\BudgetAccount;
	use App\Models\Category;
	use App\Models\CategoryGroup;
	use Illuminate\Support\Facades\DB;
	use Livewire\Component;
	
	class AddAccount extends Component
	{
		const ACCOUNT_TYPES        = ['CreditCard','LineOfCredit'];
		const LOAN_CATEGORY_GROUPS = ['Mortgages','Loans'];
		const CATEGORY_MAP         = ['Cash Accounts' => 'Cash','Credit Accounts' => 'Credit','Tracking Accounts' => 'Tracking','Mortgages and Loans' => 'Loans',];
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
		
		// Constantes para los tipos de categoría
		public    $newMasterCategory = '';
		public    $activeAccountId;
		public    $BudgetAccount;
		protected $listeners         = [
			'numberFormatUpdated' => '$refresh'  //Escucha el evento 'numberFormatUpdated'
		];
		
		// Registrar el listener para el evento `reorderAccounts`
		
		public function mount(){
			$activeBudget         = Budget::where('user_id',auth()->id())->where('is_active',true)->first();
			$this->activeBudgetId = $activeBudget->id;
			
			// Inicializa el ID de la cuenta activa desde la ruta o con el valor predeterminado
			$this->activeAccountId = request()->route('id');
			
			$this->updateAccountLists();
			$this->accountTypes      = AccountHelper::getAccountTypes();
			$this->categoriesByGroup = CategoryGroup::with('categories')->get();
			
		}
		
		private function updateAccountLists(){
			$this->budgetAccounts = BudgetAccount::where('budget_id',$this->activeBudgetId)
				->orderBy('account_group')
				->orderBy('ordering')
				->get();
			
			// Agrupar las cuentas por grupo
			$this->accountGroups = $this->budgetAccounts->groupBy('account_group')->map(function($budgetAccounts){
				$groupType = $budgetAccounts->first()->account_group;
				
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
			
			// Inicializa el estado de los grupos dinámicamente
			foreach($this->accountGroups as $group){
				$this->showGroups[$group->type] = true; // Inicializa cada grupo como expandido
			}
			
		} //End Method
		
		public function addAccountModal(){
			$this->resetFields();
			$this->showAccountModalForm();
		}
		
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
		
		public function showAccountModalForm(){
			$this->resetErrorBag();
			$this->currentSection     = 1;
			$this->isOpenAccountModal = true;
			// Enfocamos el input y mostramos el modal
			$this->dispatch('focusInput',inputId:'searchFinancial');
		}
		
		public function showLinkedModal(){
			$this->currentSection = 1;
		}
		
		public function showUnlinkedModal(){
			$this->dispatch('focusInput');
			$this->currentSection = 2;
			$this->resetFields();
			// Enfocamos el input y mostramos el modal
			$this->dispatch('focusInput',inputId:'nickname');
		}
		
		public function selectAccountType(){
			//$this->dispatch('focusInput');
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
		
		public function getCanProceedProperty(){
			$basicFieldsValid = !empty($this->nickname) &&
				!empty($this->balance) &&
				!empty($this->selectedAccountType);
			
			if($this->selectedCategoryGroup !== 'Loans'){
				return $basicFieldsValid;
			}
			
			$loanFieldsValid = !empty($this->payment) &&
				!empty($this->interest);
			
			return $basicFieldsValid && $loanFieldsValid;
		}
		
		public function isNextButtonEnabled(){
			return !empty($this->nickname) && !empty($this->selectedGroup) && ($this->selectedGroup != -1 ? true : !empty($this->newMasterCategory));
		}
		
		public function checkSelection(){
			// Lógica adicional si es necesario
		}
		
		public function saveBudgetTracking(){
			$this->saveAccount(false);
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
					         'balance'       => $this->balance,
					];
					
					if($isLoan){
						$data['interest']    = $this->interest;
						$data['payment']     = $this->payment;
						$data['payoff_date'] = $payoffDate;
					}
					
					// Verificar si es CreditCard o LineOfCredit para crear grupo y categoría
					if(in_array($this->selectedDataAccountType,['CreditCard','LineOfCredit'])){
						$categoryId          = $this->createCreditCardGroupAndCategory();
						$data['category_id'] = $categoryId;
					}
					
					// Crear la cuenta y almacenarla en una variable
					$account = BudgetAccount::create($data);
					
					// Asignar el ID de la cuenta para su uso fuera de la transacción
					$this->accountId      = $account->id; // Almacenar el ID aquí
					$this->currentSection = 5;
				});
				// Código que puede lanzar una excepción
			} catch(\Exception $e){
				\Log::error('Error en el sistema: '.$e->getMessage());
				return false;
			}
		} //End Method
		
		private function validateNickname(){
			$this->validate([
				'nickname' => 'required|unique:budget_accounts,nickname',
			],[
				'nickname.required' => 'Se requiere el nombre de la cuenta.',
				'nickname.unique'   => 'Este nombre de cuenta ya existe.',
			]);
			
		}
		
		private function calculateBalance(){
			$isNegativeBalance = in_array($this->selectedDataAccountType,self::ACCOUNT_TYPES) || in_array($this->selectedCategoryGroup,self::LOAN_CATEGORY_GROUPS);
			$balance           = is_numeric($this->balance) ? $this->balance : 0;
			
			return $isNegativeBalance ? abs($balance) * -1 : $balance;
		}
		
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
			
		}
		
		/**
		 * Crear grupo y categoría para tarjetas de crédito y líneas de crédito
		 * @return int ID de la categoría creada o encontrada
		 */
		public function createCreditCardGroupAndCategory(){
			$groupName = 'Credit Card Payment';
			
			// Verificar si ya existe el grupo
			$group = CategoryGroup::where('name',$groupName)->first();
			
			// Si no existe el grupo, crearlo
			if(!$group){
				$group = CategoryGroup::create([
					'budget_id' => $this->activeBudgetId,
					'name'      => $groupName,
				]);
			}
			
			// Crear la categoría directamente ya que la cuenta es única
			$category = Category::create([
				'group_id' => $group->id,
				'name'     => $this->nickname,
				'hidden'   => false,
			]);
			
			return $category->id;
		}
		
		public function saveMortgageLoans(){
			$this->saveAccount(true);
		}
		
		public function saveMortgageLoansSkip(){
			dd('Save Mortgage Loans sin categoria...');
		}
		
		public function goToSection($section){
			$this->currentSection = $section;
		} //End Mtehod
		
		public function closeBudgetAccount(){
			$this->hideAccountModalForm();
			$this->updateAccountLists();
			//Actualiza el balance en el header
			$this->dispatch('budgetTotalUpdated');
			// Redirigir después de la transacción utilizando el ID de la cuenta
			return redirect()->route('accounts.assign',['id' => $this->accountId]);
		}
		
		public function hideAccountModalForm(){
			$this->isOpenAccountModal = false;
		}
		
		public function addAnotherAccount(){
			$this->currentSection = 1;
			$this->updateAccountLists();
			//Actualiza el balance en el header
			$this->dispatch('budgetTotalUpdated');
		}
		
		public function planCategory(){
			$this->currentSection    = 4;
			$this->selectedOption    = 'existing';
			$this->selectedGroup     = '';
			$this->newMasterCategory = '';
		}
		
		//funcion para calcular la fecha final de pago.
		
		public function setOption($option){
			$this->selectedOption    = $option;
			$this->selectedGroup     = '';
			$this->newMasterCategory = '';
		} //End Method
		
		// Esta nueva función actualiza la cuenta activa
		
		public function updateActiveAccount($accountId){
			session()->put('showGroups',$this->showGroups);
			$this->activeAccountId = $accountId;
		}
		
		public function render(){
			return view('livewire.admin.add-account');
		}
		
	}
	
	