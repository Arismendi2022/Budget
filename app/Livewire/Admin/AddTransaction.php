<?php
	
	namespace App\Livewire\Admin;
	
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class AddTransaction extends Component
	{
		
		public $addTransaction = false;
		public $isCheched = false;
		
		// Escuchar el evento 'closeModal'
		protected $listeners = ['closeTransaction'];
		
		#[On('addAccountEvent')]
		public function handleAddAccount(){
			// Lógica para manejar el evento
			//dd('message','Se ha añadido una nueva cuenta.');
			$this->addTransaction = true;
			
		}
		
	 
		// Metodo para cerrar el modal
		public function closeTransaction(){
			$this->addTransaction = false;
		}
		
		public function render(){
			return view('livewire.admin.add-transaction');
		}
	}
	