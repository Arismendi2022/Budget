<?php

  namespace App\Livewire\Admin;

  use App\Helpers\AccountHelper;
  use App\Models\Budget;
  use App\Models\BudgetGroup;
  use Livewire\Component;

  class AddAccount extends Component
  {
    public $isOpenAccountModal  = false;
    public $nickname,$balance,$interest,$payment;
    public $currentSection      = 1;
    public $accountTypes        = [];
    public $selectedAccountType = null;
    public $selectedCategory    = null;

    public $isButtonDisabled = true;
    public $selectedOption   = 'existing';
    public $selectedGroup    = '';
    public $categoriesByGroup;
    public $accounts;

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

      // Obtenemos las cuentas usando la relación
      $this->accounts = $activeBudget->budgetAccounts;

      // Obtiene los tipos de cuentas que se muestran Select Account type
      $this->accountTypes = AccountHelper::getAccountTypes();
      // Obtiene todos los grupos y categorías
      $this->categoriesByGroup = BudgetGroup::with('categories')->get();

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
        $this->isButtonDisabled = empty($this->nickname) || empty($this->selectedAccountType) || empty($this->balance);
      }else if($this->selectedCategory === 'Loans'){
        $this->isButtonDisabled = !$this->nickname || !$this->selectedAccountType || !$this->balance || !$this->interest || !$this->payment;
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
      dd('Save Budget Tracking...');
    }

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

  }



