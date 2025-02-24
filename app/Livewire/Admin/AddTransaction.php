<?php
	
	namespace App\Livewire\Admin;
	
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class AddTransaction extends Component
	{
		
		public $addTransaction = false;
		
		// Escuchar el evento 'closeModal'
		protected $listeners = ['closeTransaction'];
		
		#[On('addAccountEvent')]
		public function handleAddAccount(){
			//dd('message','Se ha añadido una nueva cuenta.');
			$this->addTransaction = true;
			
		}
		
		// Metodo para cerrar el elemento transacciones
		public function closeTransaction(){
			$this->addTransaction = false;
		}
		
		public function render(){
			return view('livewire.admin.add-transaction');
		}
	}
	