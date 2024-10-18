<?php

  namespace App\Livewire\Admin;

  use App\Models\Budget;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Livewire\Component;

  class BudgetManager extends Component
  {
    public $user;
    public $activeBudget;
    public $budgets;

    public $name;
    public $currency,$currency_placement,$number_format,$date_format;
    public $budgetId;

    public function mount(){
      $this->user         = Auth::user();
      $this->activeBudget = $this->user->budgets()->where('is_active',true)->first();
      $this->budgets      = $this->user->budgets;


      $this->currency           = 'USD';
      $this->number_format      = '123,456.78';
      $this->date_format        = 'MM/DD/YYYY';
    }

    public function setActiveBudget($budgetId){
      try{
        // Verificar si el presupuesto seleccionado existe
        $budget = Budget::find($budgetId);
        if($budget->is_active){
          // Si ya está activo, redirigir al home sin hacer cambios
          return redirect()->route('admin.home',['id' => $budgetId,'name' => $budget->name]);
        }

        // Iniciar una transacción para asegurar que ambos pasos se realicen juntos
        DB::transaction(function() use ($budgetId){
          // Cambiar el campo `is_active` a true para el presupuesto seleccionado
          Budget::where('id',$budgetId)->update(['is_active' => true]);
          Budget::where('user_id',auth()->id())->where('id','!=',$budgetId)->update(['is_active' => false]);
        });

        // Redirigir al home
        return redirect()->route('admin.home',['id' => $budgetId,'name' => Budget::find($budgetId)->name]);

      } catch(\Exception $e){
        // Manejar cualquier error que ocurra
        return "Error al seleccionar el presupuesto: ".$e->getMessage();
      }

    } //End Method


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

        // Redirigir a admin.home
        return redirect()->route('admin.home');

      } catch(\Exception $e){
        // En caso de error, puedes retornar el mensaje de error
        return "Error al enviar el correo: ".$e->getMessage();
      };

    } //End Method

    public function deleteBudget($id){
      $user   = auth()->user();
      $budget = $user->budgets()->where('id',$id)->first();
      // Verificar si el presupuesto existe
      if($budget){
        if($budget->is_active){
          // Actualizar el presupuesto activo
          $this->activeBudget = null; // O puedes establecerlo en otro presupuesto si lo deseas
        }

        $budget->delete();
        // Emitir evento para que jQuery lo escuche
        $this->dispatch('budgetDeleted');
        // Recargar la lista de presupuestos
        $this->budgets = Budget::all();
      }

    } //End Method


    public
    function render(){
      $data = [
        'user'         => $this->user,
        'activeBudget' => $this->activeBudget,
        'budgets'      => $this->budgets, // Pasar los presupuestos a la vista
      ];

      return view('livewire.admin.budget-manager',$data);
    }
  }
