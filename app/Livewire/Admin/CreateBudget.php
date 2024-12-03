<?php

  namespace App\Livewire\Admin;

  use App\Helpers\FormatHelper;
  use App\Models\Budget;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class CreateBudget extends Component
  {
    public $name,$currency,$currency_placement,$number_format,$date_format;

    public $currencies,$numberFormats,$placement,$dateFormats;

    public $isUpdateBudgetModal = false;
    public $fromBudget          = false;
    public $isOpenCreateModal   = false;
    public $user,$budgets;
    public $activeBudget,$budget,$budgetId;

    public function mount($fromBudget = false){
      // Formatos por defecto
      $this->loadFormats(); // Llama al metodo que carga los formatos
      $this->setDefaultFormats();
      $this->fromBudget = $fromBudget;
    }

    public function loadFormats(){
      // Cargar las formatos de divisas, simbolos, numeros y fechads desde el helper
      $this->currencies    = FormatHelper::getCurrencies();
      $this->placement     = FormatHelper::getPlacement();
      $this->numberFormats = FormatHelper::getNumberFormats();
      $this->dateFormats   = FormatHelper::getDateFormats();

    }//End Method

    public function setDefaultFormats(){
      $this->name               = null;
      $this->currency           = 'USD';
      $this->currency_placement = 'Symbol First';
      $this->number_format      = '123,456.78';
      $this->date_format        = 'MM/DD/YYYY';
    }

    #[On('budget-created')]
    public function showCreateModalForm(){
      $this->resetErrorBag();
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
          Budget::create(['user_id' => Auth::id(),'name' => $this->name,'currency' => $this->currency,'currency_placement' => $this->currency_placement,'number_format' => $this->number_format,'date_format' => $this->date_format,]);

        });

        if(!$this->fromBudget){
          $this->dispatch('updateBudgetName')->to(LeftBudgetName::class);
        }

        if($this->fromBudget){
          $this->dispatch('budgetSaved');
          $this->dispatch('redirect-home');
        }

        /** Cierra el modal */
        $this->hideCreateModalForm();

      } catch(\Exception $e){
        // Nueva sintaxis para Livewire 3
        $this->dispatch('console-error',['error' => $e->getMessage()]);

        return false;
      }

    } //End Method

    public function updateBudget(){
      $this->validate([
        'name' => 'required|unique:budgets,name,'.$this->budgetId,
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);

      try{
        DB::transaction(function(){
          $budget = Budget::findOrFail($this->budgetId);

          /** Update Budget */
          $budget->update([
            'name'               => $this->name,
            'currency'           => $this->currency,
            'currency_placement' => $this->currency_placement,
            'number_format'      => $this->number_format,
            'date_format'        => $this->date_format,]);
        });

        if(!$this->fromBudget){
          $this->dispatch('updateBudgetName')->to(LeftBudgetName::class);
        }

        /** Cierra el modal */
        $this->hideCreateModalForm();

      } catch(\Exception $e){
        return "No se pudo actualizar el presupuesto.".$e->getMessage();
      };
    } //End Method

    public function render(){
      return view('livewire.admin.create-budget');
    }

  }
