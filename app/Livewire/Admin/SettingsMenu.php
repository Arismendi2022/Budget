<?php

  namespace App\Livewire\Admin;

  use Livewire\Component;

  class SettingsMenu extends Component
  {
    public $hideButtons = false;

    public function mount($hideButtons = false){
      $this->hideButtons = $hideButtons;
      $this->resetValues();
    }

    public function resetValues(){
      // Establecer valores predeterminados
      $this->currency           = 'USD';
      $this->currency_placement = 'Symbol First';
      $this->number_format      = '123,456.78';
      $this->date_format        = 'MM/DD/YYYY';
    }

    public function render(){
      return view('livewire.admin.settings-menu');
    }
  }
