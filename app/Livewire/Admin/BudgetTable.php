<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Budget;
	use App\Models\CategoryGroup;
	use Illuminate\Support\Facades\Log;
	use Illuminate\Validation\Rule;
	use Livewire\Component;
	
	class BudgetTable extends Component
	{
		public $isOpenCategoryGroupModal   = false;
		public $isUpdateCategoryGroupModal = false;
		public $isOpenNewCategoryModal     = false;
		public $groups,$name,$category,$groupId;
		
		// Variables para la posición del modal
		public $modalGroupLeft;
		public $modalTop  = 0;
		public $modalLeft = 0;
		public $modalArrowLeft;
		public $modalArrowStyle;
		public $modalArrowTransform;
		public $leftAddGroup;
		
		// Escucha el evento 'numberFormatUpdated'
		protected $listeners = [
			'numberFormatUpdated'   => '$refresh',
			'categoryGroupCreated'  => 'loadCategoryGroups',
			'updateModalPosition'   => 'updateModalPosition',
			'updateAddGroupModal'   => 'updateAddGroupModal',
			'categoryModalPosition' => 'categoryModalPosition',
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
		
		public function updateModalPosition($top,$left,$arrowLeft,$arrowStyle,$arrowTransform){
			$this->modalTop            = $top;
			$this->modalLeft           = $left;
			$this->modalArrowLeft      = $arrowLeft;
			$this->modalArrowStyle     = $arrowStyle;
			$this->modalArrowTransform = $arrowTransform;
		}
		
		public function showCategoryGroupModal(){
			$this->dispatch('modalPositionUpdated',$this->modalGroupLeft); // Enviar a JavaScript
			
			$this->isOpenCategoryGroupModal = true;
			$this->dispatch('focusInput',inputId:'nameGroup');
		}
		
		public function updateAddGroupModal($left){
			$this->modalGroupLeft = $left;
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
				'name' => [
					'required',
					Rule::unique('category_groups','name'),
				],
			],[
				'name.required' => 'The group name is required.',
				'name.unique'   => 'This group name already exists.',
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
				$this->loadCategoryGroups();
				
				// Limpiar el campo y cerrar el modal
				$this->reset('name');
				$this->resetValidation();
				$this->isOpenCategoryGroupModal = false;
				
			} catch(\Throwable $e){
				// Registrar el error en los logs de Laravel (opcional)
				\Log::error('Error al crear un grupo de categorías: '.$e->getMessage());
				
				// Mostrar un mensaje de error en Livewire
				$this->addError('name','Algo salió mal. Inténtalo de nuevo.');
			}
			
		} //End Method
		
		public function updateCategoryGroup(){
			$groupCategory = CategoryGroup::findOrFail($this->groupId);
			
			$this->validate([
				'name' => [
					'required',
					Rule::unique('category_groups','name')->ignore($groupCategory->id),
				],
			],[
				'name.required' => 'The group name is required.',
				'name.unique'   => 'This group name already exists',
			]);
			
			/** Update Category Group */
			try{
				
				$groupCategory->update([
					'name' => $this->name,
				]);
				
				// Emitir evento para actualizar la lista
				$this->loadCategoryGroups();
				// Limpiar el campo y cerrar el modal
				$this->hideEditCategoryGroupModal();
				
			} catch(\Throwable $e){
				Log::error('Error al actualizar un grupo de categorías: '.$e->getMessage());
				$this->addError('name','Algo salió mal. Inténtalo de nuevo.');
			}
			
		} //End Method
		
		public function deleteCategoryGroup(){
			try{
				$groupCategory = CategoryGroup::findOrFail($this->groupId);
				$groupCategory->delete();
				
				// Emitir evento para actualizar la lista
				$this->loadCategoryGroups();
				// Limpiar el campo y cerrar el modal
				$this->hideEditCategoryGroupModal();
				
			} catch(\Throwable $e){
				Log::error('Error al eliminar el grupo de categorías: '.$e->getMessage());
				$this->addError('deleteError','No se pudo eliminar el grupo. Intenta de nuevo.');
			}
		} //End Method
		
		public function addCategoryModal(){
			$this->isOpenNewCategoryModal = true;
			
			$this->dispatch('focusInput',inputId:'category');
		}
		
		public function updateModalCategory(){
			dd('Mensaje....');
		}
		
		public function hideNewCategoryModal(){
			$this->isOpenNewCategoryModal = false;
			$this->reset('category');
			$this->resetValidation();
		}
		
		public function categoryModalPosition(){
			dd('Mensaje desde categoryMopdalPosition....');
			
		}
		
		public function createNewCategory(){
		
		}
		
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}
