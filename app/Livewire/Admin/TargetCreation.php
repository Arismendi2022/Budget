<?php
	
	namespace App\Livewire\Admin;
	
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		public $isOpenModalAssign = false;
		public $isCreateTarget    = false;
		
		public function showAutoAssignModal(){
			$this->isOpenModalAssign = true;
			
		}
		
		public function hidenAutoAssignModal(){
			$this->isOpenModalAssign = false;
			
		}
		
		public function showCreateTarget(){
			$this->isCreateTarget = true;
		}
		
		public function hideCreateTarget(){
			$this->isCreateTarget = false;
		}
		
		public
		function render(){
			return view('livewire.admin.target-creation');
		}
	}
