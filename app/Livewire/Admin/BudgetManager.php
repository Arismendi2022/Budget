<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Budget;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class BudgetManager extends Component
	{
		public $user;
		public $activeBudget;
		public $budgets;
		public $isUpdateBudgetModal = false;
		public $isOpenSureModal     = false;
		
		public $budgetId;
		
		#[On('budgetSaved')]
		public function mount(){
			$this->user         = Auth::user();
			$this->activeBudget = $this->user->budgets()->where('is_active',true)->first();
			$this->budgets      = $this->user->budgets()->orderBy('created_at','desc')->get();
		}
		
		public function setActiveBudget($budgetId){
			try{
				// Verificar si el presupuesto seleccionado existe
				$budget = Budget::find($budgetId);
				if($budget->is_active){
					// Si ya está activo, redirigir al home sin hacer cambios
					$this->dispatch('closeSureModal');
					
					$this->dispatch('redirectHome');
				}
				
				DB::transaction(function() use ($budgetId){
					// Cambiar el campo `is_active` a true para el presupuesto seleccionado
					Budget::where('id',$budgetId)->update(['is_active' => true]);
					Budget::where('user_id',auth()->id())->where('id','!=',$budgetId)->update(['is_active' => false]);
				});
				$this->dispatch('closeSureModal');
				
				$this->dispatch('redirectHome');
				
			} catch(\Exception $e){
				\Log::error('Error en el sistema: '.$e->getMessage());
				return false;
			}
			
		} //End Method
		
		public function openCreateModal(){
			$this->isUpdateBudgetModal = false;
			$this->dispatch('budget-created');
		}
		
		public function deleteBudget($id){
			$user = auth()->user();
			
			$budget    = $user->budgets()->findOrFail($id);
			$wasActive = $budget->is_active;
			
			$budget->delete();
			
			$this->budgets = $user->budgets;
			// Despachar evento de presupuesto eliminado
			$this->dispatch('closeBudgetDeleted');
			
			if($wasActive){
				$this->activeBudget = $user->budgets()->where('is_active',true)->first();
				$this->dispatch('updateActiveBudget',$this->activeBudget?->name);
			}
			
		} //End Method
		
		public function openSureDelete(){
			$this->isOpenSureModal = true;
		}
		
		public function closeSureModal(){
			$this->isOpenSureModal = false;
		}
		
		public function openMenuSettingsModal(){
			$this->dispatch('open-settings-modal');
		}
		
		public function render(){
			$data = [
				$this->budgets = $this->user->budgets()->orderBy('created_at','desc')->get(),
			];
			
			return view('livewire.admin.budget-manager',$data);
		}
		
		
	}

