<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use App\Models\CategoryGroup;
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
		public $editingCategoryId;
		public $isMasterPartial    = false;
		public $showProgressBar    = true;
		
		// Listeners
		protected $listeners = [
			'updateGroupAndCategory' => 'loadCategoryGroups',
			'numberFormatUpdated'    => '$refresh',
			'categoryGroupCreated'   => 'loadCategoryGroups',
			'updateClearSelection'   => 'clearSelections',
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
		
		public function render(){
			return view('livewire.admin.budget-table');
		}
	}