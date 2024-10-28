<?php

  namespace App\Livewire\Admin;

  use Livewire\Component;

  class SettingsMenu extends Component
  {
    public $hideButtons         = false;
    public $isUpdateBudgetModal = false;

    public function mount($hideButtons = false){
      $this->hideButtons = $hideButtons;
    }

    public function openCreateModal(){
      $this->isUpdateBudgetModal = false;
      $this->showCreateModalForm();
    }

    public function showCreateModalForm(){
      $this->dispatch('showCreateModalForm');
    }

    public function hideCreateModalForm(){
      $this->reset();
      $this->resetErrorBag();
      $this->dispatch('hideCreateModalForm');
      $this->isUpdateBudgetModal = false;
    }

    public function render(){
      return view('livewire.admin.settings-menu');
    }

  }
