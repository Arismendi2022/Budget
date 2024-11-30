<?php

  namespace App\Livewire\Admin;

  use App\Models\BudgetAccount;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class EditAccount extends Component
  {

    public $isOpenEditAccountModal = false;
    public $accountId,$accountGroupType;
    public $nickname,$balance,$dataAccountType,$interest,$payment;

    #[On('account-edit')]
    public function showEditAccountModalForm($accountId){
      $budgetAccount = BudgetAccount::find($accountId);

      $this->accountId        = $accountId;
      $this->accountGroupType = $budgetAccount->account_group;
      $this->nickname         = $budgetAccount->nickname;
      // Formatear el balance como moneda
      $this->balance        = number_format($budgetAccount->balance,2,',','.');
      $this->dataAccountType = $budgetAccount->data_account_type;
      $this->interest       = number_format($budgetAccount->interest,2,',','.');
      $this->payment        = number_format($budgetAccount->payment,2,',','.');
      $this->resetErrorBag();
      $this->isOpenEditAccountModal = true;
      $this->dispatch('focusInput');

    }

    public function hideEditAccountModalForm(){
      $this->isOpenEditAccountModal = false;

    }


    public function render(){
      return view('livewire.admin.edit-account');
    }

  }
