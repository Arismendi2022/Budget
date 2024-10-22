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

    public $name;
    public $currency,$currency_placement,$number_format,$date_format;
    public $budgetId;
    public $isUpdateBudgetModal = false;

    public function mount(){
      $this->user         = Auth::user();
      $this->activeBudget = $this->user->budgets()->where('is_active',true)->first();
      $this->budgets      = $this->user->budgets()->orderBy('created_at','desc')->get();
      // Formatos por defecto
      $this->setDefaultFormats();
    }

    public function setDefaultFormats(){
      $this->name               = null;
      $this->currency           = 'USD';
      $this->currency_placement = 'Symbol First';
      $this->number_format      = '123,456.78';
      $this->date_format        = 'MM/DD/YYYY';
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

    #[On('open-create-budget')]
    public function openCreateModal(){
      $this->setDefaultFormats();
      $this->isUpdateBudgetModal = false;
      $this->showCreateModalForm();
    }

    public function showCreateModalForm(){
      $this->resetErrorBag();
      $this->dispatch('showCreateModalForm');
    }

    public function hideCreateModalForm(){
      $this->dispatch('hideCreateModalForm');
      $this->isUpdateBudgetModal = false;
    }

    public function saveBudget(){
      /**
       * Validate form
       */

      $this->validate([
        'name' => 'required|unique:budgets,name',
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);

      // Iniciar transacción
      try{
        DB::transaction(function(){
          // Desactivar todos los presupuestos activos del usuario
          auth()->user()->budgets()->update(['is_active' => false]);

          // Guardar detalles del presupuesto
          Budget::create([
            'user_id'            => Auth::id(),
            'name'               => $this->name,
            'currency'           => $this->currency,
            'currency_placement' => $this->currency_placement,
            'number_format'      => $this->number_format,
            'date_format'        => $this->date_format,
          ]);
        });

        $this->redirect(route('admin.home'));

      } catch(\Exception $e){
        // En caso de error, puedes retornar el mensaje de error
        return "Error al enviar el correo: ".$e->getMessage();
      };

    } //End Method

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

