<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		public $isAutoAssign      = true;
		public $isOpenModalAssign = false;
		public $isCreateTarget    = false;
		public $selectedFrequency = 'monthly'; // Valor predeterminado
		
		public $category;
		
		public function showAutoAssignModal(){
			$this->isOpenModalAssign = true;
		}
		
		public function hidenAutoAssignModal(){
			$this->isOpenModalAssign = false;
		}
		
		public function setFrequency($frequency){
			$this->selectedFrequency = $frequency;
		}
		
		public function showCreateTarget(){
			$this->isCreateTarget = true;
		}
		
		public function hideCreateTarget(){
			$this->isCreateTarget = false;
		}
		
		#[On('showCategoryTarget')]
		public function showCategoryTarget($categoryId){
			$this->category       = Category::findOrFail($categoryId);
			$this->isAutoAssign   = false;
			$this->isCreateTarget = false;
		}
		
		#[On('hideCategoryTarget')]
		public function hideCategoryTarget($categoryId){
			$this->isAutoAssign = true;
		}
		
		public
		function render(){
			return view('livewire.admin.target-creation');
		}
	}
