<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\CategoryGroup;
	use Livewire\Component;
	
	class BudgetTable extends Component
	{
		public $groups;
		
		public function mount(){
			// Obtener todos los grupos con sus categorías y calcular los totales
			$this->groups = CategoryGroup::with('categories')->get()->map(function($group){
				$group->total_assigned  = $group->categories->sum('assigned');
				$group->total_activity  = $group->categories->sum('activity');
				$group->total_available = $group->categories->sum('available');
				return $group;
			});
		}
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}
