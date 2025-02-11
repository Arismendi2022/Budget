<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Budget;
	use App\Models\CategoryGroup;
	use Livewire\Component;
	
	class BudgetTable extends Component
	{
		public $isOpenCategoryGroupModal   = false;
		public $isUpdateCategoryGroupModal = false;
		public $groups,$name;
		
		// Variables para la posición del modal
		public $modalTop       = 0;
		public $modalLeft      = 0;
		public $modalArrowLeft;
		
		// Escucha el evento 'numberFormatUpdated'
		protected $listeners = [
			'numberFormatUpdated'  => '$refresh',
			'categoryGroupCreated' => 'loadCategoryGroups',
			'updateModalPosition'  => 'updateModalPosition'
		];
		
		public function mount(){
			// Obtener todos los grupos con sus categorías y calcular los totales
			$this->loadCategoryGroups();
		}
		
		public function loadCategoryGroups(){
			$this->groups = CategoryGroup::with('categories')->get()->map(function($group){
				$group->total_assigned  = $group->categories->sum('assigned');
				$group->total_activity  = $group->categories->sum('activity');
				$group->total_available = $group->categories->sum('available');
				return $group;
			});
		}
		
		public function editCategoryGroup($id){
			$groupCategory = CategoryGroup::findOrFail($id);
			$this->groupId = $groupCategory->id;
			$this->name    = $groupCategory->name;
			
			$this->isUpdateCategoryGroupModal = true;
			$this->dispatch('focusInput',inputId:'nameGroupEdit');
		}
		
		public function updateModalPosition($top,$left,$arrowLeft){
			$this->modalTop       = $top;
			$this->modalLeft      = $left;
			$this->modalArrowLeft = $arrowLeft;
		}
		
		
		public function showCategoryGroupModal(){
			$this->isOpenCategoryGroupModal = true;
			$this->dispatch('focusInput',inputId:'nameGroup');
		}
		
		public function hidenCategoryGroupModal(){
			$this->isOpenCategoryGroupModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		public function hideEditCategoryGroupModal(){
			$this->isUpdateCategoryGroupModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		public function createCategoryGroup(){
			$this->validate([
				'name' => 'required|unique:category_groups,name',
			],[
				'name.required' => 'The group name is required.',
				'name.unique'   => 'This group name already exists',
			]);
			
			try{
				// Buscar el presupuesto activo
				$activeBudget = Budget::where('is_active',true)->first();
				
				// Intentar guardar el nuevo grupo de categorías
				CategoryGroup::create([
					'budget_id' => $activeBudget->id,
					'name'      => $this->name,
				]);
				
				// Emitir evento para actualizar la lista
				$this->dispatch('categoryGroupCreated');
				
				// Limpiar el campo y cerrar el modal
				$this->reset('name');
				$this->resetValidation();
				$this->isOpenCategoryGroupModal = false;
				
			} catch(\Throwable $e){
				// Registrar el error en los logs de Laravel (opcional)
				\Log::error('Error al crear un grupo de categorías: '.$e->getMessage());
				
				// Mostrar un mensaje de error en Livewire
				$this->addError('name','Something went wrong. Please try again.');
			}
			
		} //End Method
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}
