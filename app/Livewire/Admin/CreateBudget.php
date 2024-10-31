<?php

  namespace App\Livewire\Admin;

  use App\Models\Budget;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class CreateBudget extends Component
  {
    public $name,$currency,$currency_placement,$number_format,$date_format;

    public $isUpdateBudgetModal = false;
    public $fromBudget          = false;
    public $isOpenCreateModal   = false;
    public $user,$budgets;
    public $activeBudget,$budget,$budgetId;

    public function mount($fromBudget = false){
      // Formatos por defecto
      $this->setDefaultFormats();
      $this->fromBudget = $fromBudget;
    }

    public function setDefaultFormats(){
      $this->name               = null;
      $this->currency           = 'USD';
      $this->currency_placement = 'Symbol First';
      $this->number_format      = '123,456.78';
      $this->date_format        = 'MM/DD/YYYY';
    }

    #[On('budget-created')]
    public function showCreateModalForm(){
      $this->setDefaultFormats();
      $this->isUpdateBudgetModal = false;
      $this->isOpenCreateModal   = true;

      $this->dispatch('focusInput');
    }

    #[On('budget-updated')]
    public function editBudgetModal(){
      $budget = auth()->user()->budgets()->where('is_active',true)->firstOrFail();

      $this->budgetId           = $budget->id;
      $this->name               = $budget->name;
      $this->currency           = $budget->currency;
      $this->currency_placement = $budget->currency_placement;
      $this->number_format      = $budget->number_format;
      $this->date_format        = $budget->date_format;

      $this->isUpdateBudgetModal = true;
      $this->isOpenCreateModal   = true;

      $this->dispatch('focusInput');
    }


    public function hideCreateModalForm(){
      $this->resetErrorBag();
      $this->isUpdateBudgetModal = false;
      $this->isOpenCreateModal   = false;
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

      //Iniciar transacción
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

        if(!$this->fromBudget){
          $this->dispatch('updateBudgetName')->to(LeftBudgetName::class);
        }

        if($this->fromBudget){
          $this->dispatch('budgetSaved');
          $this->dispatch('redirect-home');
        }

        //Cierra el modal
        $this->hideCreateModalForm();

      } catch(\Exception $e){
        return "Error al enviar el correo: ".$e->getMessage();
      };

    } //End Method

    public function updateBudget(){
      $this->validate([
        'name' => 'required|unique:budgets,name,'.$this->budgetId,
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);
    } //End Method


    public function render(){
      return view('livewire.admin.create-budget');
    }
  }
