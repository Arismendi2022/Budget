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
		// Propiedades para los modales
		public $isOpenCategoryGroupModal   = false;
		public $isUpdateCategoryGroupModal = false;
		public $isOpenNewCategoryModal     = false;
		public $groups,$name,$category,$groupId,$selectedGroupId;
		
		// Propiedades para posicionamiento de modales
		public $modalGroupLeft,$modalTop = 0,$modalLeft = 0;
		public                               $modalArrowLeft,$modalArrowStyle,$modalArrowTransform,$leftAddGroup;
		
		// Propiedades para selección y edición
		public $checkedGroupId     = null;
		public $selectedCategoryId = null;
		public $isPartial          = false;
		public $selectedCategories = [];
		public $editingCategoryId;
		public $isMasterPartial    = false;
		
		// Listeners
		protected $listeners = [
			'numberFormatUpdated'  => '$refresh',
			'categoryGroupCreated' => 'loadCategoryGroups',
			'updateModalPosition'  => 'updateModalPosition',
			'updateAddGroupModal'  => 'updateAddGroupModal',
		];
		
		public function mount(){
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
		
		// Metodo para el checkbox al hacer click en el grupo
		public function toggleGroup($groupId){
			$group = CategoryGroup::with('categories')->find($groupId);
			if(!$group) return;
			
			// Alternar selección del grupo
			if($this->checkedGroupId === $groupId){
				$this->clearSelections();
			}else{
				$this->checkedGroupId     = $groupId;
				$this->selectedCategories = $group->categories->pluck('id')->toArray();
				$this->isPartial          = false;
			}
			$this->updateMasterPartialState();
		}
		
		// Metodo para activar el checkbox al hacer clic en toda la fila
		public function activateCategory($categoryId,$groupId){
			if(!in_array($categoryId,$this->selectedCategories)){
				$this->selectedCategories[] = $categoryId;
				$this->checkedGroupId       = $groupId;
				$this->isPartial            = true;
				$this->startEditing($categoryId);
				
			}else{
				$this->toggleEditingState($categoryId);
			}
			$this->updateMasterPartialState();
			$this->dispatch('focusInput',inputId:'dataCurrency-'.$categoryId);
		}
		
		// Metodo para alternar selección de categoría
		public function toggleCategory($categoryId,$groupId){
			if(in_array($categoryId,$this->selectedCategories)){
				// Remover categoría
				$this->selectedCategories = array_diff($this->selectedCategories,[$categoryId]);
				
				if(empty($this->selectedCategories)){
					$this->clearSelections();
				}else{
					$this->checkedGroupId = $groupId;
					$this->isPartial      = true;
					
					// Resetear edición si es necesario
					if($this->editingCategoryId === $categoryId){
						$this->resetEditingState();
					}
				}
			}else{
				// Agregar categoría
				$this->selectedCategories[] = $categoryId;
				$this->checkedGroupId       = $groupId;
				$this->isPartial            = true;
				$this->startEditing($categoryId);
				$this->dispatch('focusInput',inputId:'dataCurrency-'.$categoryId);
			}
			
			$this->updateMasterPartialState();
		}
		
		// Métodos para manejo de estado de edición
		public function startEditing($categoryId){
			$this->editingCategoryId = $categoryId;
		}
		
		public function toggleEditingState($categoryId){
			$this->editingCategoryId = ($this->editingCategoryId === $categoryId) ? null : $categoryId;
		}
		
		public function resetEditingState(){
			$this->editingCategoryId = null;
		}
		
		// Metodo para limpiar todas las selecciones
		private function clearSelections(){
			$this->checkedGroupId     = null;
			$this->selectedCategories = [];
			$this->isPartial          = false;
			$this->resetEditingState();
		}
		
		// Metodo para actualizar estado parcial del maestro
		protected function updateMasterPartialState(){
			if(!empty($this->selectedCategories)){
				$totalCategories       = Category::count();
				$this->isMasterPartial = count($this->selectedCategories) < $totalCategories && !empty($this->selectedCategories);
				$this->updateGroupsState();
			}else{
				$this->isMasterPartial = false;
			}
		}
		
		// Metodo para manejar el clic en el checkbox maestro CATEGORY
		public function toggleAllCategories(){
			if($this->isMasterPartial || !empty($this->selectedCategories)){
				$this->clearSelections();
				$this->isMasterPartial = false;
			}else{
				$this->selectedCategories = Category::pluck('id')->toArray();
				$this->checkedGroupId     = null;
				$this->isPartial          = false;
				$this->isMasterPartial    = false;
				$this->updateGroupsState();
			}
		}
		
		// Metodo para actualizar estado de grupos
		protected function updateGroupsState(){
			if(empty($this->selectedCategories)) return;
			
			// Encontrar grupo con más categorías seleccionadas
			$maxSelectedCount   = 0;
			$maxSelectedGroupId = null;
			$isPartial          = false;
			
			foreach(CategoryGroup::with('categories')->get() as $group){
				$groupCategoryIds = $group->categories->pluck('id')->toArray();
				$selectedInGroup  = array_intersect($groupCategoryIds,$this->selectedCategories);
				$selectedCount    = count($selectedInGroup);
				
				if($selectedCount > 0){
					$isGroupPartial = $selectedCount < count($groupCategoryIds);
					
					if($selectedCount > $maxSelectedCount){
						$maxSelectedCount   = $selectedCount;
						$maxSelectedGroupId = $group->id;
						$isPartial          = $isGroupPartial;
					}
				}
			}
			
			if($maxSelectedGroupId){
				$this->checkedGroupId = $maxSelectedGroupId;
				$this->isPartial      = $isPartial;
			}
		}
		
		// Métodos para verificar estados de grupo
		public function isGroupChecked($groupId){
			$group = CategoryGroup::with('categories')->find($groupId);
			if(!$group) return false;
			
			$groupCategoryIds = $group->categories->pluck('id')->toArray();
			return !empty(array_intersect($groupCategoryIds,$this->selectedCategories));
		}
		
		public function isGroupPartial($groupId){
			$group = CategoryGroup::with('categories')->find($groupId);
			if(!$group) return false;
			
			$groupCategoryIds = $group->categories->pluck('id')->toArray();
			$selectedInGroup  = array_intersect($groupCategoryIds,$this->selectedCategories);
			
			return !empty($selectedInGroup) && count($selectedInGroup) < count($groupCategoryIds);
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
