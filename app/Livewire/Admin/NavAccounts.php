<?php
	
	namespace App\Livewire\Admin;
	
	use App\Helpers\AccountHelper;
	use App\Models\Budget;
	use App\Models\BudgetAccount;
	use App\Models\CategoryGroup;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	
	class NavAccounts extends Component
	{
		
		public $showGroups = [];
		public $budgetAccounts,$accountGroups,$activeAccountId;
		public $activeBudgetId,$accountId;
		
		// Registrar el listener para el evento `reorderAccounts`
		protected $listeners = [
			'updateOrder','handleDragEnd',
			'numberFormatUpdated' => 'accountRefresh'  //Escucha el evento 'numberFormatUpdated'
		
		];
		
		public function mount(){
			$activeBudget         = Budget::where('user_id',auth()->id())->where('is_active',true)->first();
			$this->activeBudgetId = $activeBudget->id;
			
			// Inicializa el ID de la cuenta activa desde la ruta o con el valor predeterminado
			$this->activeAccountId = request()->route('id');
			
			$this->updateAccountLists();
			$this->accountTypes      = AccountHelper::getAccountTypes();
			$this->categoriesByGroup = CategoryGroup::with('categories')->get();
			
			// Recuperar el estado de los grupos desde la sesión o inicializarlo como vacío
			$this->showGroups = session()->get('showGroups',[]);
			
			// Si no hay estado guardado en la sesión, inicializar todos los grupos como expandidos
			if(empty($this->showGroups)){
				$this->showGroups = collect($this->accountGroups)
					->pluck('type') // Obtiene los tipos de grupo
					->mapWithKeys(fn($type) => [$type => true]) // Inicializa cada grupo como expandido
					->toArray();
			}
			
		} //End Method
		
		private function updateAccountLists(){
			$this->budgetAccounts = BudgetAccount::where('budget_id',$this->activeBudgetId)
				->orderBy('account_group')
				->orderBy('ordering')
				->get();
			
			// Agrupar las cuentas por grupo
			$this->accountGroups = $this->budgetAccounts->groupBy('account_group')->map(function($budgetAccounts){
				$groupType = $budgetAccounts->first()->account_group;
				
				return (object)[
					'type'          => $groupType,
					'accounts'      => $budgetAccounts->map(function($account){
						return (object)[
							'id'          => $account->id,
							'budget_id'   => $this->activeBudgetId,
							'nickname'    => $account->nickname,
							'balance'     => $account->balance,
							'is_selected' => false
						];
					}),
					'total_balance' => $budgetAccounts->sum('balance')
				];
			});
			
			// Inicializa el estado de los grupos dinámicamente
			foreach($this->accountGroups as $group){
				$this->showGroups[$group->type] = true; // Inicializa cada grupo como expandido
			}
			
		} //End Mtehod
		
		#[On('account-refresh')]
		public function accountRefresh(){
			$this->updateAccountLists();
		}
		
		public function updateOrder($orderedIds){
			// Actualiza el campo 'ordering' para cada cuenta
			foreach($orderedIds as $position => $accountId){
				BudgetAccount::where('id',$accountId)->update(['ordering' => $position + 1]);
			}
			// Recargar cuentas después de actualizar
			$this->updateAccountLists();
			
		}
		
		public function toggleGroup($type){
			// Alternar el estado del grupo
			$this->showGroups[$type] = !($this->showGroups[$type] ?? true);
			// Guardar el estado actualizado en la sesión
			session()->put('showGroups',$this->showGroups);
			
			// Emitir evento para reinicializar drag & drop
			$this->dispatch('groupToggled');
		}
		
		public function openEditAccountModal($accountId){
			$this->dispatch('account-edit',$accountId);
		}
		
		public function render(){
			return view('livewire.admin.nav-accounts');
		}
	}
