<?php

  namespace App\Livewire\Admin;

  use Illuminate\Support\Facades\Auth;
  use Livewire\Component;

  class SettingsMenu extends Component
  {
    public $name,$currency,$currency_placement,$number_format,$date_format;

    public $isUpdateBudgetModal = false;
    public $hideButtons         = false;

    public $activeBudget;
    public $budget,$budgetId;

    public function mount($hideButtons = false){
      $this->hideButtons = $hideButtons;
      // Obtener el presupuesto activo del usuario autenticado
      $this->activeBudget = Auth::user()->budgets()->where('is_active',true)->first();
    }

    public function openCreateModal(){
      $this->dispatch('budget-created');
    }

    public function openEditModal(){
      $this->dispatch('budget-updated');
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
