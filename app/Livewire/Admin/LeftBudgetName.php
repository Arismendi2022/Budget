<?php
	
	namespace App\Livewire\Admin;
	
	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;
	
	class LeftBudgetName extends Component
	{
		public $user;
		public $activeBudget;
		
		protected $listeners = [
			'updateBudgetName' => '$refresh'
		];
		
		public function openMenuSettingsModal(){
			$this->dispatch('open-settings-modal');
		}
		
		public function render(){
			$this->user         = Auth::user();
			$this->activeBudget = $this->user ? $this->user->budgets()->where('is_active',true)->first() : null;
			
			return view('livewire.admin.left-budget-name',[
				'activeBudget' => $this->activeBudget
			]);
		}
	}
