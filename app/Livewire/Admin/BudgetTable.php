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
		public $isOpenEditCategoryModal    = false;
		public $groups,$name,$category,$groupId,$selectedGroupId,$categoryId;
		
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
		
		public function toggleGroup($groupId){
			$group = CategoryGroup::with('categories')->find($groupId);
			if(!$group) return;
			
			if($this->checkedGroupId === $groupId){
				$this->clearSelections();
			}else{
				$this->checkedGroupId     = $groupId;
				$this->selectedCategories = $group->categories->pluck('id')->toArray();
				$this->isPartial          = false;
			}
			$this->updateMasterPartialState();
		}
		
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
		
		public function toggleCategory($categoryId,$groupId){
			if(in_array($categoryId,$this->selectedCategories)){
				$this->selectedCategories = array_diff($this->selectedCategories,[$categoryId]);
				
				if(empty($this->selectedCategories)){
					$this->clearSelections();
				}else{
					$this->checkedGroupId = $groupId;
					$this->isPartial      = true;
					
					if($this->editingCategoryId === $categoryId){
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
		
		private function clearSelections(){
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
			$this->dispatch('modalPositionUpdated',$this->modalGroupLeft);
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
			$this->validateCategoryGroupName();
			
			try{
				$activeBudget = Budget::where('is_active',true)->first();
				CategoryGroup::create([
					'budget_id' => $activeBudget->id,
					'name'      => $this->name,
				]);
				
				$this->reset('name');
				$this->resetValidation();
				$this->isOpenCategoryGroupModal = false;
				
				$this->emit('categoryGroupCreated');
			} catch(\Throwable $e){
				$this->handleError('Error al crear un grupo de categorías: '.$e->getMessage(),'name');
			}
		}
		
		public function updateCategoryGroup(){
			$groupCategory = CategoryGroup::findOrFail($this->groupId);
			$this->validateCategoryGroupName($groupCategory->id);
			
			try{
				$groupCategory->update(['name' => $this->name]);
				$this->loadCategoryGroups();
				$this->hideEditCategoryGroupModal();
			} catch(\Throwable $e){
				$this->handleError('Error al actualizar un grupo de categorías: '.$e->getMessage(),'name');
			}
		}
		
		public function deleteCategoryGroup(){
			try{
				$groupCategory = CategoryGroup::findOrFail($this->groupId);
				$groupCategory->delete();
				$this->loadCategoryGroups();
				$this->hideEditCategoryGroupModal();
			} catch(\Throwable $e){
				$this->handleError('Error al eliminar el grupo de categorías: '.$e->getMessage(),'deleteError');
			}
		}
		
		public function addCategoryModal($groupId){
			$this->groupId                = $groupId;
			$this->isOpenNewCategoryModal = true;
			$this->dispatch('focusInput',inputId:'category');
		}
		
		public function createNewCategory(){
			$this->validate([
				'name' => [
					'required',
					Rule::unique('categories','name'),
				],
			],[
				'name.required' => 'The category name is required.',
				'name.unique'   => 'A category with this name already exists in this group',
			]);
			
			try{
				Category::create([
					'group_id' => $this->groupId,
					'name'     => $this->name,
				]);
				
				$this->loadCategoryGroups();
				$this->reset('name');
				$this->resetValidation();
				$this->isOpenNewCategoryModal = false;
			} catch(\Throwable $e){
				$this->handleError('Error al crear una categoría: '.$e->getMessage(),'name');
			}
		}
		
		public function editCategoryModal($id){
			$category         = Category::findOrFail($id);
			$this->categoryId = $category->id;
			$this->name       = $category->name;
			
			$this->isOpenEditCategoryModal = true;
			$this->dispatch('focusInput',inputId:'editCategory');
		}
		
		public function updateModalCategory(){
			$category = Category::findOrFail($this->categoryId);
			
			$this->validate([
				'name' => [
					'required',
					Rule::unique('categories','name')->ignore($this->categoryId),
				],
			],[
				'name.required' => 'The category name is required.',
				'name.unique'   => 'A category with this name already exists in this group',
			]);
			
			try{
				$category->update(['name' => $this->name]);
				$this->loadCategoryGroups();
				$this->hideCategoryModal();
			} catch(\Throwable $e){
				$this->handleError('Error al actualizar una categoría: '.$e->getMessage(),'name');
			}
		}
		
		public function deleteCategory(){
			try{
				$category = Category::findOrFail($this->categoryId);
				$category->delete();
				$this->loadCategoryGroups();
				$this->hideCategoryModal();
			} catch(\Throwable $e){
				$this->handleError('Error al eliminar la categoría: '.$e->getMessage(),'deleteError');
			}
		}
		
		public function hideNewCategoryModal(){
			$this->isOpenNewCategoryModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		public function hideCategoryModal(){
			$this->isOpenEditCategoryModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		private function validateCategoryGroupName($ignoreId = null){
			$this->validate([
				'name' => [
					'required',
					Rule::unique('category_groups','name')->ignore($ignoreId),
				],
			],[
				'name.required' => 'The group name is required.',
				'name.unique'   => 'This group name already exists.',
			]);
		}
		
		private function handleError($errorMessage,$field = null){
			Log::error($errorMessage);
			if($field){
				$this->addError($field,'Algo salió mal. Inténtalo de nuevo.');
			}
		}
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}