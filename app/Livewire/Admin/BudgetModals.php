<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Budget;
	use App\Models\Category;
	use App\Models\CategoryGroup;
	use Illuminate\Validation\Rule;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	
	class BudgetModals extends Component
	{
		// Propiedades para los modales
		public $isOpenCategoryGroupModal   = false;
		public $isUpdateCategoryGroupModal = false;
		public $isOpenNewCategoryModal     = false;
		public $isOpenEditCategoryModal    = false;
		
		// Propiedades para posicionamiento de modales
		public $modalArrowLeft,$modalArrowStyle,$modalArrowTransform,$leftAddGroup;
		
		public $modalGroupLeft,$modalTop = 0,$modalLeft = 0;
		
		public $name,$groupId,$categoryId;
		
		protected $listeners = [
			'updateModalPosition' => 'updateModalPosition',
			'updateAddGroupModal' => 'updateAddGroupModal',
		];
		
		#[On('newGroupModal')]
		public function showCategoryGroupModal(){
			$this->dispatch('modalPositionUpdated',$this->modalGroupLeft);
			$this->isOpenCategoryGroupModal = true;
			$this->dispatch('focusInput',inputId:'nameGroup');
		}
		
		public function hidenCategoryGroupModal(){
			$this->isOpenCategoryGroupModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		#[On('newCategoryModal')]
		public function addCategoryModal($groupId){
			$this->groupId                = $groupId;
			$this->isOpenNewCategoryModal = true;
			$this->dispatch('focusInput',inputId:'category');
		}
		
		public function hideNewCategoryModal(){
			$this->isOpenNewCategoryModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		#[On('editCategoryGroup')]
		public function editCategoryGroup($id){
			$groupCategory = CategoryGroup::findOrFail($id);
			$this->groupId = $groupCategory->id;
			$this->name    = $groupCategory->name;
			
			$this->isUpdateCategoryGroupModal = true;
			$this->dispatch('focusInput',inputId:'nameGroupEdit');
		}
		
		public function hideEditCategoryGroupModal(){
			$this->isUpdateCategoryGroupModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		public function updateModalPosition($top,$left,$arrowLeft,$arrowStyle,$arrowTransform){
			$this->modalTop            = $top;
			$this->modalLeft           = $left;
			$this->modalArrowLeft      = $arrowLeft;
			$this->modalArrowStyle     = $arrowStyle;
			$this->modalArrowTransform = $arrowTransform;
		}
		
		public function updateAddGroupModal($left){
			$this->modalGroupLeft = $left;
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
		
		//Crear nuevo grupo
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
				
				$this->dispatch('updateGroupAndCategory');
			} catch(\Throwable $e){
				$this->handleError('Error al crear un grupo de categorías: '.$e->getMessage(),'name');
			}
		}
		
		//Editar grupo
		public function updateCategoryGroup(){
			$groupCategory = CategoryGroup::findOrFail($this->groupId);
			$this->validateCategoryGroupName($groupCategory->id);
			
			try{
				$groupCategory->update(['name' => $this->name]);
				$this->hideEditCategoryGroupModal();
				$this->dispatch('updateGroupAndCategory');
			} catch(\Throwable $e){
				$this->handleError('Error al actualizar un grupo de categorías: '.$e->getMessage(),'name');
			}
		}
		
		//Eliminar grupo
		public function deleteCategoryGroup(){
			try{
				$groupCategory = CategoryGroup::findOrFail($this->groupId);
				$groupCategory->delete();
				$this->hideEditCategoryGroupModal();
				$this->dispatch('updateGroupAndCategory');
			} catch(\Throwable $e){
				$this->handleError('Error al eliminar el grupo de categorías: '.$e->getMessage(),'deleteError');
			}
		}
		
		//Crear Nueva Categoria
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
				
				$this->reset('name');
				$this->resetValidation();
				$this->isOpenNewCategoryModal = false;
				$this->dispatch('updateGroupAndCategory');
			} catch(\Throwable $e){
				$this->handleError('Error al crear una categoría: '.$e->getMessage(),'name');
			}
		}
		
		//Edit Category
		#[On('editCategoryModal')]
		public function editCategoryModal($id){
			$category         = Category::findOrFail($id);
			$this->categoryId = $category->id;
			$this->name       = $category->name;
			
			$this->isOpenEditCategoryModal = true;
			$this->dispatch('focusInput',inputId:'editCategory');
		}
		
		//Actualizar categotria
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
				$this->hideCategoryModal();
				$this->dispatch('updateGroupAndCategory');
			} catch(\Throwable $e){
				$this->handleError('Error al actualizar una categoría: '.$e->getMessage(),'name');
			}
		}
		
		//eliminar categoria
		public function deleteCategory(){
			try{
				$category = Category::findOrFail($this->categoryId);
				$category->delete();
				$this->hideCategoryModal();
				$this->dispatch('updateGroupAndCategory');
				$this->dispatch('updateClearSelection');
			} catch(\Throwable $e){
				$this->handleError('Error al eliminar la categoría: '.$e->getMessage(),'deleteError');
			}
		}
		
		public function hideCategoryModal(){
			$this->isOpenEditCategoryModal = false;
			$this->reset('name');
			$this->resetValidation();
		}
		
		private function handleError($errorMessage,$field = null){
			\Log::error($errorMessage);
			if($field){
				$this->addError($field,'Algo salió mal. Inténtalo de nuevo.');
			}
		}
		
		public function render(){
			return view('livewire.admin.budget-modals');
		}
		
	}
