<?php
	
	namespace App\Livewire\Admin;
	
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class SettingsMenu extends Component
	{
		public $name,$currency,$currency_placement,$number_format,$date_format;
		
		public $isUpdateBudgetModal = false;
		public $hideButtons         = false;
		public $openSettingsModal   = false;
		
		public $activeBudget,$budget,$budgetId;
		
		protected $listeners = ['hideMenuSettingsModal' => 'hideMenuSettingsModal'];
		
		public function mount($hideButtons = false){
			$this->hideButtons = $hideButtons;
		}
		
		#[On('open-settings-modal')]
		public function toggleSettingsModal(){
			// Alternar el estado del modal
			$this->openSettingsModal = !$this->openSettingsModal;
		}
		
		public function hideMenuSettingsModal(){
			$this->openSettingsModal = false;
		}
		
		public function openCreateModal(){
			$this->dispatch('budget-created');
			$this->openSettingsModal = false;
		}
		
		public function openEditModal(){
			$this->dispatch('budget-updated');
		}
		
		public function hideCreateModalForm(){
			$this->reset();
			$this->resetErrorBag();
			$this->dispatch('hideCreateModalForm');
			$this->isUpdateBudgetModal = false;
		}
		
		public function redirectToSettings(){
			$this->dispatch('redirectToSettings');
		}
		
		public function render(){
			return view('livewire.admin.settings-menu');
		}
		
	}
