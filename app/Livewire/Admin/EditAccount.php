<?php

  namespace App\Livewire\Admin;

  use Livewire\Component;

  class EditAccount extends Component
  {

    protected $listeners = ['openEditAccount'];

    public function openEditAccount($data){
      dd('cuenta....');
    }


    public function render(){
      return view('livewire.admin.edit-account');
    }
  }
