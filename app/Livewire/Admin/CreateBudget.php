<?php

  namespace App\Livewire\Admin;

  use App\Models\Budget;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Livewire\Component;

  class CreateBudget extends Component
  {
    public $name;
    public $currency,$currency_placement,$number_format,$date_format;

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
        // Mostrar el mensaje de error en la consola
        error_log('Error al crear el presupuesto: '.$e->getMessage());
      }

    } //End Method

    public function mount(){
      // Establecer valores predeterminados a los que ya están en el select
      $this->currency           = 'USD';
      $this->currency_placement = 'Symbol First';
      $this->number_format      = '123,456.78';
      $this->date_format        = 'MM/DD/YYYY';
    }

    public function render(){
      return view('livewire.admin.create-budget');
    }

  }
