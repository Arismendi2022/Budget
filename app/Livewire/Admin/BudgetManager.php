<?php

  namespace App\Livewire\Admin;

  use App\Models\Budget;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class BudgetManager extends Component
  {
    public $user;
    public $activeBudget;
    public $budgets;
    public $isUpdateBudgetModal = false;

    public $budgetId;

    #[On('budgetSaved')]
    public function mount(){
      $this->user         = Auth::user();
      $this->activeBudget = $this->user->budgets()->where('is_active',true)->first();
      $this->budgets      = $this->user->budgets()->orderBy('created_at','desc')->get();
    }

    public function setActiveBudget($budgetId){
      try{
        // Verificar si el presupuesto seleccionado existe
        $budget = Budget::find($budgetId);
        if($budget->is_active){
          // Si ya está activo, redirigir al home sin hacer cambios
          $this->redirect(route('admin.home'));
        }

        DB::transaction(function() use ($budgetId){
          // Cambiar el campo `is_active` a true para el presupuesto seleccionado
          Budget::where('id',$budgetId)->update(['is_active' => true]);
          Budget::where('user_id',auth()->id())->where('id','!=',$budgetId)->update(['is_active' => false]);
        });
        $this->redirect(route('admin.home'));

      } catch(\Exception $e){
        // Manejar cualquier error que ocurra
        return "Error al seleccionar el presupuesto: ".$e->getMessage();
      }

    } //End Method

    public function openCreateModal(){
      $this->isUpdateBudgetModal = false;
      $this->showCreateModalForm();
    }

    public function showCreateModalForm(){
      $this->resetErrorBag();
      $this->dispatch('showCreateModalForm');
    }

    public function deleteBudget($id){
      $budget    = Budget::findOrFail($id);
      $wasActive = $budget->is_active;

      $budget->delete();
      $this->budgets = auth()->user()->budgets;

      $this->dispatch('budgetDeleted');
      // Si el presupuesto eliminado era el activo, actualizar el sidebar
      if($wasActive){
        $this->activeBudget = Budget::where('is_active',true)->first();
        $this->dispatch('updateActiveBudget',$this->activeBudget?->name);
      }

    }//End Method

    public function render(){
      $data = [
        $this->budgets = $this->user->budgets()->orderBy('created_at','desc')->get(),
      ];

      return view('livewire.admin.budget-manager',$data);
    }


  }

