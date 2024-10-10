<?php

  namespace App\Livewire;

  use Livewire\Component;

  class CreateBudget extends Component
  {
    public $name;
    public $date_format;

    public function saveBudget(){
      /**
       * Validate form
       */

      // Validar el formulario
      $this->validate([
        'name' => 'required|unique:budget_details,name',
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);

    }

    public function mount(){

      $this->date_format = 'DD/MM/YYYY';  // Valor predeterminado
    }

    public function render(){
      return view('livewire.create-budget');
    }

  }
