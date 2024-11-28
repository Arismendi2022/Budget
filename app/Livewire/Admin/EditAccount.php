<?php

  namespace App\Livewire\Admin;

  use App\Models\BudgetAccount;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class EditAccount extends Component
  {

    public $isOpenEditAccountModal = false;
    public $accountId,$accountGroupType;
    public $nickname,$balance;

    #[On('account-edit')]
    public function showEditAccountModalForm($accountId){
      $budgetAccount = BudgetAccount::find($accountId);

      $this->accountId        = $accountId;
      $this->accountGroupType = $budgetAccount->account_group;
      $this->nickname         = $budgetAccount->nickname;
      $this->balance          = $budgetAccount->balance;
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
