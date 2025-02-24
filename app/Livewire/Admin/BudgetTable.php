<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Budget;
	use App\Models\Category;
	use App\Models\CategoryGroup;
	use Illuminate\Support\Facades\Log;
	use Illuminate\Validation\Rule;
	use Livewire\Component;
	
	class BudgetTable extends Component
	{
		public $isOpenCategoryGroupModal   = false;
		public $isUpdateCategoryGroupModal = false;
		public $isOpenNewCategoryModal     = false;
		public $groups,$name,$category,$groupId,$selectedGroupId;
		
		// Variables para la posición del modal
		public $modalGroupLeft;
		public $modalTop  = 0;
		public $modalLeft = 0;
		public $modalArrowLeft;
		public $modalArrowStyle;
		public $modalArrowTransform;
		public $leftAddGroup;
		
		// Nueva propiedad para almacenar la categoría seleccionada
		public $checkedGroupId     = null;
		public $selectedCategoryId = null;
		public $isPartial          = false;
		public $selectedCategories = [];
		public $editingCategoryId  = null;
		
		
		public $isMasterPartial = true;
		
		// Escucha el evento 'numberFormatUpdated'
		protected $listeners = [
			'numberFormatUpdated'  => '$refresh',
			'categoryGroupCreated' => 'loadCategoryGroups',
			'updateModalPosition'  => 'updateModalPosition',
			'updateAddGroupModal'  => 'updateAddGroupModal',
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
		
		// Metodo para el checkbox al hacer clcik en el grupo
		public function toggleGroup($groupId){
			$group = CategoryGroup::with('categories')->find($groupId);
			
			if(!$group) return;
			
			// Si el grupo ya está seleccionado, deseleccionamos todo
			if($this->checkedGroupId === $groupId){
				$this->checkedGroupId     = null;
				$this->selectedCategories = [];
				$this->isPartial          = false;
				$this->resetEditingState(); // Reseteamos también el estado de edición
			}else{
				// Si no está seleccionado, seleccionamos todas sus categorías
				$this->checkedGroupId     = $groupId;
				$this->selectedCategories = $group->categories->pluck('id')->toArray();
				$this->isPartial          = false;
			}
			
		}
		
		
		// Metodo para activar el checkbox al hacer clic en toda la fila
		public function activateCategory($categoryId,$groupId){
			// Agregar o quitar categoría de la selección
			if(!in_array($categoryId,$this->selectedCategories)){
				$this->selectedCategories[] = $categoryId;
				$this->checkedGroupId       = $groupId;
				$this->isPartial            = true;
				$this->startEditing($categoryId); // Iniciar edición
			}else{
				// Si ya estaba seleccionada, alternamos el estado de edición
				$this->toggleEditingState($categoryId);
			}
		}
		
		// Metodo para desactivar el checkbox al hacer clic en el botón del checkbox
		public function toggleCategory($categoryId,$groupId){
			if(in_array($categoryId,$this->selectedCategories)){
				// Removemos la categoría del array
				$this->selectedCategories = array_diff($this->selectedCategories,[$categoryId]);
				
				// Si no quedan categorías seleccionadas, limpiamos el grupo
				if(empty($this->selectedCategories)){
					$this->checkedGroupId = null;
					$this->isPartial      = false;
				}else{
					$this->checkedGroupId = $groupId;
					$this->isPartial      = true;
				}
				
				// Si estamos editando esta categoría, también reseteamos
				if($this->editingCategoryId === $categoryId){
					$this->resetEditingState();
				}
			}else{
				$this->selectedCategories[] = $categoryId;
				$this->checkedGroupId       = $groupId;
				$this->isPartial            = true;
				
				// Establecemos esta categoría como la que se está editando
				$this->startEditing($categoryId);
			}
		}
		
		// Metodo para iniciar la edición de una categoría
		public function startEditing($categoryId){
			$this->editingCategoryId = $categoryId;
		}
		
		// Meodo para alternar el estado de edición
		public function toggleEditingState($categoryId){
			if($this->editingCategoryId === $categoryId){
				$this->editingCategoryId = null; // Si ya estaba editando, lo quitamos
			}else{
				$this->editingCategoryId = $categoryId; // Si no estaba editando, lo activamos
			}
		}
		
		// Metodo para resetear el estado de edición
		public function resetEditingState(){
			$this->editingCategoryId = null;
		}
		
		
		/** GRUPOS Y CATEGORIAS */
		//Edit Grupo de categorias
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
		
		/** CATEGORY */
		public function addCategoryModal($groupId){
			$this->groupId                = $groupId; // Guardamos el ID del grupo seleccionado
			$this->isOpenNewCategoryModal = true;
			
			$this->dispatch('focusInput',inputId:'category');
		}
		
		public function createNewCategory(){
			$this->validate([
				'category' => [
					'required',
					Rule::unique('categories','category'),
				],
			],[
				'category.required' => 'The category name is required.',
				'category.unique'   => 'A category with this name already exists in this group',
			]);
			
			try{
				
				Category::create([
					'group_id' => $this->groupId,
					'category' => $this->category,
				]);
				
				// Emitir evento para actualizar la lista
				$this->loadCategoryGroups();
				
				// Limpiar el campo y cerrar el modal
				$this->reset('category');
				$this->resetValidation();
				$this->isOpenNewCategoryModal = false;
				
			} catch(\Throwable $e){
				// Registrar el error en los logs de Laravel (opcional)
				\Log::error('Error al crear un grupo de categorías: '.$e->getMessage());
				
				// Mostrar un mensaje de error en Livewire
				$this->addError('name','Algo salió mal. Inténtalo de nuevo.');
			}
			
		} //End Method
		
		
		public function editCategoryModal(){
			dd('Edit category modal ....');
		}
		
		public function updateModalCategory(){
			dd('Mensaje....');
		}
		
		public function hideNewCategoryModal(){
			$this->isOpenNewCategoryModal = false;
			$this->reset('category');
			$this->resetValidation();
		}
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}
