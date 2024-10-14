<?php

  namespace App\Livewire\Admin;

  use Livewire\Component;

  class SettingsMenu extends Component
  {
    public $hideButtons = false;

    public function mount($hideButtons = false){
      $this->hideButtons = $hideButtons;
    }

    public function render(){
      return view('livewire.admin.settings-menu');
    }
  }
