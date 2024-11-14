<?php

  namespace App\Livewire\Admin;

  use App\Helpers\AccountHelper;
  use Livewire\Component;

  class AddAccount extends Component
  {
    public $isOpenAccountModal  = false;
    public $nickname,$balance,$interest,$payment;
    public $currentSection      = 1;
    public $accountTypes        = [];
    public $selectedAccountType = null;
    public $selectedCategory    = null;

    public $isNextButtonDisabled = true;

    /** Limpia todos los campos */
    public function resetFields(){
      $this->nickname             = null;
      $this->balance              = null;
      $this->interest             = null;
      $this->payment              = null;
      $this->selectedAccountType  = null;
      $this->selectedCategory     = null; // Restablece la categoría seleccionada
      $this->isNextButtonDisabled = true;
    }

    public function mount(){
      $this->accountTypes = AccountHelper::getAccountTypes();
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
     * Habilita boton Next
     *
     * @return response()
     */

    // Méeodo para verificar si el botón "Next" debe estar habilitado
    public function checkNextButtonState(){
      $this->isNextButtonDisabled = empty($this->nickname);
    }

    public function updated($propertyName){
      $this->dispatch('isDisabledButon');

    }


    // Metodo para cambiar a la sección especificada
    public function goToSection($section){
      $this->currentSection = $section;
    }

    public function render(){
      return view('livewire.admin.add-account');
    }
  }



