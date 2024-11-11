<?php

  namespace App\Livewire\Admin;

  use App\Helpers\AccountHelper;
  use Livewire\Component;

  class AddAccount extends Component
  {
    public $isOpenAccountModal  = false;
    public $nickname,$name,$balance,$currentBalance,$interestRate;
    public $currentSection      = 1;
    public $accountTypes        = [];
    public $selectedAccountType = null;

    public function resetFields(){
      $this->nickname            = null;
      $this->balance             = null;
      $this->currentBalance      = null;
      $this->interestRate        = null;
      $this->selectedAccountType = null;
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
    public function selectAccount($type){
      $this->selectedAccountType = $type; // Actualiza el tipo de cuenta seleccionado
      $this->currentSection      = 2;
    }

    // Metodo para cambiar a la sección especificada
    public function goToSection($section){
      $this->currentSection = $section;
    }

    public function render(){
      return view('livewire.admin.add-account');
    }
  }



