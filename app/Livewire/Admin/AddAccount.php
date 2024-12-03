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
    public $categoriesByGroup;
    public $budgetAccounts,$activeBudgetId,$dataAccountType;
    public $accountGroups,$selectedDataAccountType;
    public $newMasterCategory     = '';

    // Constantes para los tipos de categoría
    const ACCOUNT_TYPES        = ['CreditCard','LineOfCredit'];
    const LOAN_CATEGORY_GROUPS = ['Mortgages','Loans'];
    const CATEGORY_MAP
                               = ['Budget Accounts' => 'Budget','Tracking Accounts' => 'Tracking','Mortgages and Loans' => 'Loans',];

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

    public function mount(){
      $activeBudget         = Budget::where('user_id',auth()->id())->where('is_active',true)->first();
      $this->activeBudgetId = $activeBudget->id;

      $this->updateAccountLists();
      $this->accountTypes      = AccountHelper::getAccountTypes();
      $this->categoriesByGroup = BudgetGroup::with('categories')->get();

      foreach($this->accountGroups as $group){
        $this->showGroups[$group->type] = true;
      }

    }

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

      try{
        DB::transaction(function() use ($isLoan){
          $data = ['budget_id'     => $this->activeBudgetId,
                   'nickname'      => $this->nickname,
                   'account_group' => $this->selectedCategoryGroup,
                   'data_type'     => $this->selectedDataAccountType,
                   'account_type'  => $this->selectedAccountType,
                   'balance'       => $this->balance,];

          if($isLoan){
            $data['interest'] = $this->interest;
            $data['payment']  = $this->payment;
          }

          BudgetAccount::create($data);
          $this->currentSection = 5;
        });
      } catch(\Exception $e){
        $this->dispatch('console-error',['error' => $e->getMessage()]);
        return false;
      }
    }

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
      $this->budgetAccounts = BudgetAccount::where('budget_id',$this->activeBudgetId)->get();
      //$this->accounts       = BudgetAccount::where('budget_id',$this->activeBudgetId)->get();

      $this->accountGroups = $this->budgetAccounts->groupBy('account_group')->map(function($budgetAccounts){
        $groupType                    = $budgetAccounts->first()->account_group;
        $this->showGroups[$groupType] = true;

        return (object)['type' => $groupType,'accounts' => $budgetAccounts->map(function($account){
          return (object)['id' => $account->id,'budget_id' => $this->activeBudgetId,'nickname' => $account->nickname,'balance' => $account->balance,'is_selected' => false];
        }),'total_balance'     => $budgetAccounts->sum('balance')];
      });
    }

    public function toggleGroup($type){
      if(!isset($this->showGroups[$type])){
        $this->showGroups[$type] = true;
      }
      $this->showGroups[$type] = !$this->showGroups[$type];
    }

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

    public function render(){
      return view('livewire.admin.add-account');
    }


  }
