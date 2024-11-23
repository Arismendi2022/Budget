<?php

  namespace App\Livewire\Admin;

  use App\Helpers\AccountHelper;
  use App\Models\Budget;
  use App\Models\BudgetAccount;
  use App\Models\BudgetGroup;
  use Illuminate\Support\Facades\DB;
  use Livewire\Component;

  class AddAccount extends Component
  {
    public $isOpenAccountModal  = false;
    public $nickname,$balance,$interest,$payment;
    public $currentSection      = 1;
    public $accountTypes        = [];
    public $showGroups          = [];
    public $selectedAccountType = null;
    public $selectedCategory    = null;

    public $isButtonDisabled = true;
    public $selectedOption   = 'existing';
    public $selectedGroup    = '';
    public $categoriesByGroup;
    public $accounts,$activeBudgetId;

    public $accountGroups; // Nueva propiedad para los grupos

    /** Limpia todos los campos */
    public function resetFields(){
      $this->nickname            = null;
      $this->balance             = null;
      $this->interest            = null;
      $this->payment             = null;
      $this->selectedAccountType = null;
      $this->selectedCategory    = null;
      $this->isButtonDisabled    = true;
      $this->selectedGroup       = '';
      $this->selectedOption      = 'existing';
    }

    public function mount(){
      // Obtenemos el presupuesto activo del usuario actual
      $activeBudget = Budget::where('user_id',auth()->id())->where('is_active',true)->first();
      // Asignamos el ID
      $this->activeBudgetId = $activeBudget->id;

      // Agregar el agrupamiento de cuentas
      $this->updateAccountLists();

      // Obtiene los tipos de cuentas que se muestran Select Account type
      $this->accountTypes = AccountHelper::getAccountTypes();
      // Obtiene todos los grupos y categorías
      $this->categoriesByGroup = BudgetGroup::with('categories')->get();

      // Inicializar todos los grupos como expandidos
      foreach($this->accountGroups as $group){
        $this->showGroups[$group->type] = true;
      }

    } //End Mount

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

    // Metodo para mostrar la sección Add Account
    public function showLinkedModal(){
      $this->currentSection = 1;
    }

    // Metodo para mostrar la sección Unlinked
    public function showUnlinkedModal(){
      $this->dispatch('focusInput');
      $this->currentSection = 2;
      $this->resetFields();
    }

    // Metodo para mostrar la sección Type Account
    public function selectAccountType(){
      $this->dispatch('focusInput');
      $this->currentSection = 3;
    }

    // Actualiza el tipo de cuenta seleccionado
    public function selectAccount($type,$category){
      // Mapeo de categorías a nombres simplificados
      $categoryMap = [
        'Budget Accounts'     => 'Budget',
        'Tracking Accounts'   => 'Tracking',
        'Mortgages and Loans' => 'Loans',
      ];

      // Verifica si la categoría está en el mapeo
      if(array_key_exists($category,$categoryMap)){
        $this->selectedAccountType = $type; // Actualiza el tipo de cuenta seleccionado
        $this->selectedCategory    = $categoryMap[$category]; // Almacena la categoría simplificada
        $this->currentSection      = 2;
      }
    }

    /**
     * Activa el boton Next cuando los campos tiene datos.
     * @return void
     */
    public function nextButtonState(){
      if($this->selectedCategory === 'Budget' || $this->selectedCategory === 'Tracking'){
        $this->isButtonDisabled = $this->nickname === '' ||
                                  $this->selectedAccountType === '' ||
                                  ($this->balance === '' && $this->balance !== '0');
      }else if($this->selectedCategory === 'Loans'){
        $this->isButtonDisabled = $this->nickname === '' ||
                                  $this->selectedAccountType === '' ||
                                  ($this->balance === '' && $this->balance !== '0') ||
                                  ($this->interest === '' && $this->interest !== '0') ||
                                  ($this->payment === '' && $this->payment !== '0');
      }
    }

    // Función para emparejar categoría
    public function pairCategory(){
      $this->currentSection = 4;
    }

    // activa los radio buttons
    public function setOption($option){
      $this->selectedOption = $option; // Cambiar opción seleccionada
      $this->selectedGroup  = '';
    }

    //Activa del boton Next de Pair a Category
    public function checkSelection(){
      // Aquí puedes manejar cualquier lógica adicional si es necesario
    }

    /** Guarda la cuenta de budget o Tracking en la tabla */
    public function saveBudgetTracking(){
      $this->validate([
        'nickname' => 'required|unique:budget_accounts,nickname',
      ],[
        'nickname.required' => 'Se requiere el nombre de la cuenta.',
        'nickname.unique'   => 'Este nombre de cuenta ya existe.',
      ]);

      // Convertir la primera letra de nickname a mayúscula
      $this->nickname = ucfirst($this->nickname);

      if(in_array($this->selectedAccountType,['Credit Card','Line of Credit'])){
        $this->balance = is_numeric($this->balance) ? abs($this->balance) * -1 : 0;
      }else{
        $this->balance = is_numeric($this->balance) ? $this->balance : 0;
      }

      //Iniciar transacción
      try{
        DB::transaction(function(){

          BudgetAccount::create([
            'budget_id'     => $this->activeBudgetId,
            'nickname'      => $this->nickname,
            'account_group' => $this->selectedCategory,
            'account_type'  => $this->selectedAccountType,
            'balance'       => $this->balance,
          ]);

          // Cambiar a la sección de éxito
          $this->currentSection = 5;
        });

      } catch(\Exception $e){
        // Nueva sintaxis para Livewire 3
        $this->dispatch('console-error',[
          'error' => $e->getMessage()
        ]);

        return false;
      }
    } //End Method

    /** Guarda la cuenta de Loans en la tabla */
    public function saveMortgageLoans(){
      dd('Save Mortgage Loans...');
    }

    /** Guarda la cuenta de Loans sin asignar categoria */
    public function saveMortgageLoansSkip(){
      dd('Save Mortgage Loans sin categoria...');
    }

    // Metodo para cambiar a la sección especificada
    public function goToSection($section){
      $this->currentSection = $section;
    }

    public function render(){
      return view('livewire.admin.add-account');
    }

    // Nueva función para manejar las actualizaciones
    private function updateAccountLists(){
      // Actualizar las cuentas del sidebar
      $this->budgetAccounts = BudgetAccount::where('budget_id',$this->activeBudgetId)->get();

      // Actualizar las cuentas
      $this->accounts = BudgetAccount::where('budget_id',$this->activeBudgetId)->get();

      // Actualizar el agrupamiento de cuentas
      $this->accountGroups = $this->accounts->groupBy('account_group')->map(function($accounts){
        $groupType = $accounts->first()->account_group;

        // Asegurar que el grupo esté expandido por defecto
        $this->showGroups[$groupType] = true;

        return (object)[
          'type'          => $groupType,
          'accounts'      => $accounts->map(function($account){
            return (object)[
              'id'          => $account->id,
              'budget_id'   => $this->activeBudgetId,
              'nickname'    => $account->nickname,
              'balance'     => $account->balance,
              'is_selected' => false
            ];
          }),
          'total_balance' => $accounts->sum('balance')
        ];
      });

    } //End Method

    //Toggle expand/collapsed para los grupos de cuentas
    public function toggleGroup($type){
      if(!isset($this->showGroups[$type])){
        $this->showGroups[$type] = true;
      }
      $this->showGroups[$type] = !$this->showGroups[$type];
    }  //End Method

    //cierra el modal success y actualiza cuentas
    public function hideAccountModal(){
      $this->hideAccountModalForm();
      // Llamar a la función de actualización
      $this->updateAccountLists();
    }

    //cierra el modal success y actualiza cuentas
    public function goToSectionModal(){
      $this->currentSection = 1;
      // Llamar a la función de actualización
      $this->updateAccountLists();
    }

  }



