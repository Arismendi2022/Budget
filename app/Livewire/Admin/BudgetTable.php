<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use App\Models\CategoryGroup;
	use App\Models\CategoryTarget;
	use Livewire\Component;
	
	class BudgetTable extends Component
	{
		public $isOpenEditCategoryModal = false;
		
		public $groups,$category,$groupId,$selectedGroupId,$categoryId;
		
		// Propiedades para selección y edición
		public $checkedGroupId     = null;
		public $selectedCategoryId = null;
		public $isPartial          = false;
		public $selectedCategories = [];
		public $assignedValues     = [];
		public $editingCategoryId;
		public $isMasterPartial    = false;
		public $showProgressBar    = true;
		
		// Listeners
		protected $listeners = [
			'updateGroupAndCategory' => 'loadCategoryGroups',
			'numberFormatUpdated'    => '$refresh',
			'categoryGroupCreated'   => 'loadCategoryGroups',
			'updateClearSelection'   => 'clearSelections',
			'Target.freshCategories' => 'loadCategoryGroups',
		];
		
		public function mount(){
			$this->loadCategoryGroups();
			
		}
		
		public function loadCategoryGroups(){
			$this->groups = CategoryGroup::with('categories.categoryTarget')->get();
			// Cargar categorías con la relación categoryTarget
			$this->categories = Category::with('categoryTarget')->get();
		}
		
		// Metodo para obtener información específica de CategoryTarget
		public function getCategoryTargetInfo($categoryId){
			$category = Category::with('categoryTarget')->find($categoryId);
			return $category ? $category->categoryTarget : null;
		}
		
		public function toggleGroup($groupId){
			$group = CategoryGroup::with('categories')->find($groupId);
			if(!$group || $group->categories->isEmpty()) return;
			
			$categoryIds     = $group->categories->pluck('id')->toArray();
			$isFullySelected = empty(array_diff($categoryIds,$this->selectedCategories));
			
			// 1. Si el grupo YA estaba completamente seleccionado
			if($isFullySelected){
				// Solo desmarcamos (sin cerrar modal)
				$this->clearSelections();
			}// 2. Si había selección parcial (1+ categorías pero no todas)
			else if($this->checkedGroupId === $groupId){
				// Desmarcamos Y cerramos el modal con el ID de la primera categoría
				$categoryId = $group->categories->first()->id;
				$this->clearSelections();
				$this->dispatch('hideCategoryTarget',$categoryId); // ← Ahora con $categoryId
			}// 3. Si el grupo NO estaba seleccionado
			else{
				// Marcamos todas las categorías (sin abrir modal)
				$this->checkedGroupId     = $groupId;
				$this->selectedCategories = $categoryIds;
				$this->isPartial          = false;
			}
			
			$this->updateMasterPartialState();
		}
		
		public function activateCategory($categoryId,$groupId){
			// If this category is not already selected
			if(!in_array($categoryId,$this->selectedCategories)){
				// Clear previous selections
				$this->clearSelections();
				
				// Select only this category
				$this->selectedCategories = [$categoryId];
				$this->checkedGroupId     = $groupId;
				$this->isPartial          = false;
				$this->startEditing($categoryId);
			}else{
				// If already selected, just toggle the editing state
				$this->toggleEditingState($categoryId);
			}
			
			$this->updateMasterPartialState();
			$this->dispatch('focusInput',inputId:'dataCurrency-'.$categoryId);
			
			// Verificamos si la categoría existe en CategoryTarget
			$categoryTargetExists = CategoryTarget::where('category_id',$categoryId)->exists();
			
			if($categoryTargetExists){
				// Si existe en CategoryTarget, mostramos el formulario alternativo
				$this->dispatch('showEditForm',$categoryId);
			}else{
				// Si no existe en CategoryTarget, mostramos el formulario original
				$this->dispatch('showCategoryTarget',$categoryId);
			}
			
		}
		
		public function toggleCategory($categoryId,$groupId){
			if(in_array($categoryId,$this->selectedCategories)){
				$this->selectedCategories = array_diff($this->selectedCategories,[$categoryId]);
				if(empty($this->selectedCategories)){
					$this->clearSelections();
				}else{
					$this->checkedGroupId = $groupId;
					$this->isPartial      = true;
					
					if($this->editingCategoryId === $categoryId){
						$this->dispatch('showCategoryTarget',$categoryId);
						$this->resetEditingState();
					}
				}
			}else{
				$this->selectedCategories[] = $categoryId;
				$this->checkedGroupId       = $groupId;
				$this->isPartial            = true;
				$this->startEditing($categoryId);
				$this->dispatch('focusInput',inputId:'dataCurrency-'.$categoryId);
			}
			$this->updateMasterPartialState();
			$this->dispatch('hideCategoryTarget',$categoryId);
		}
		
		public function toggleCheckboxTarget($categoryId,$groupId){
			// Verificamos si la categoría ya está seleccionada
			$isAlreadySelected = in_array($categoryId,$this->selectedCategories);
			
			if($isAlreadySelected){
				// Si ya está seleccionada, solo usamos toggleCategory que ya cierra el modal
				$this->toggleCategory($categoryId,$groupId);
			}else{
				// Si no está seleccionada, primero la seleccionamos y luego activamos el modal
				// Añadimos la categoría al array de seleccionadas
				$this->selectedCategories[] = $categoryId;
				$this->checkedGroupId       = $groupId;
				$this->isPartial            = true;
				$this->startEditing($categoryId);
				
				// Enfocamos el input y mostramos el modal
				$this->dispatch('focusInput',inputId:'dataCurrency-'.$categoryId);
				
				// Verificamos si la categoría existe en CategoryTarget
				$categoryTargetExists = CategoryTarget::where('category_id',$categoryId)->exists();
				
				if($categoryTargetExists){
					// Si existe en CategoryTarget, mostramos el formulario alternativo
					$this->dispatch('showEditForm',$categoryId);
				}else{
					// Si no existe en CategoryTarget, mostramos el formulario original
					$this->dispatch('showCategoryTarget',$categoryId);
				}
				
				// Actualizamos el estado
				$this->updateMasterPartialState();
			}
		}
		
		public function startEditing($categoryId){
			$this->editingCategoryId = $categoryId;
		}
		
		public function toggleEditingState($categoryId){
			$this->editingCategoryId = ($this->editingCategoryId === $categoryId) ? null : $categoryId;
		}
		
		public function resetEditingState(){
			$this->editingCategoryId = null;
		}
		
		public function clearSelections(){
			$this->checkedGroupId     = null;
			$this->selectedCategories = [];
			$this->isPartial          = false;
			$this->resetEditingState();
		}
		
		protected function updateMasterPartialState(){
			if(!empty($this->selectedCategories)){
				$totalCategories       = Category::count();
				$this->isMasterPartial = count($this->selectedCategories) < $totalCategories && !empty($this->selectedCategories);
				$this->updateGroupsState();
			}else{
				$this->isMasterPartial = false;
			}
		}
		
		public function toggleAllCategories(){
			// Caso 1: Hay selección parcial o categorías seleccionadas
			if($this->isMasterPartial || !empty($this->selectedCategories)){
				// Obtener el ID de la primera categoría seleccionada (si existe)
				$categoryId = !empty($this->selectedCategories) ? $this->selectedCategories[0] : null;
				
				$this->clearSelections();
				$this->isMasterPartial = false;
				
				// Cerrar el modal solo si había selección parcial o una categoría activa
				if($categoryId){
					$this->dispatch('hideCategoryTarget',$categoryId);
				}
			}// Caso 2: No hay nada seleccionado
			else{
				$this->selectedCategories = Category::pluck('id')->toArray();
				$this->checkedGroupId     = null;
				$this->isPartial          = false;
				$this->isMasterPartial    = false;
				$this->updateGroupsState();
			}
		}
		
		protected function updateGroupsState(){
			if(empty($this->selectedCategories)) return;
			
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
		
		public function editCategoryGroup($id){
			$this->dispatch('editCategoryGroup',$id);
		}
		
		public function showCategoryGroupModal(){
			$this->dispatch('newGroupModal');
		}
		
		public function addCategoryModal($groupId){
			$this->dispatch('newCategoryModal',groupId:$groupId);
		}
		
		public function editCategoryModal($id){
			$this->dispatch('editCategoryModal',$id);
		}
		
		public function toggleProgressBar(){
			$this->showProgressBar = !$this->showProgressBar;
		}
		
		// OPCIÓN 3: Una sola línea con operador ternario
		public function getCategoryTitle($category){
			$assigned = format_currency($category->categoryTarget?->assigned ?? 0);
			$assign   = format_currency($category->categoryTarget?->assign ?? 0);
			return "$assigned Assign $assign more to fund your $assign monthly target.";
		}
		
		/**
		 *  Metodo pata guardar valor asiognado a la categoria
		 */
		public function updatedAssignedValues($value,$key){
			// Limpiar y formatear el valor
			$cleanValue = max(0.0,sanitize_float($value,0.0));
			
			// Actualizar el array con el valor limpio formateado
			$this->assignedValues[$key] = $cleanValue > 0 ? format_number($cleanValue) : '';
		}
		
		/**
		 *  Metodo pata guardar valor asiognado a la categoria
		 */
		public function updateAssignedValue($value,$categoryId){
			
			$cleanValue = sanitize_float($value);
			$category   = Category::find($categoryId);
			
			if($category && $category->categoryTarget){
				$category->categoryTarget->update(['assigned' => $cleanValue]);
				
				// En lugar de refresh(), actualiza la propiedad local
				$this->assignedValues[$categoryId] = $cleanValue;
			}
			// Actualizar el valor
			$category->categoryTarget->update(['assigned' => $cleanValue]);
			
			//Actualiza vista create-target
			$this->dispatch('Table.freshTarget');
		}
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}