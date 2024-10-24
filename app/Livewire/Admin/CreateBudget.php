<?php

	namespace App\Livewire\Admin;

	use App\Models\Budget;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Livewire\Component;

	class CreateBudget extends Component
	{
		public $name;
		public $currency,$currency_placement,$number_format,$date_format;
    public $isUpdateBudgetModal = false;

		public $user;
		public $budgets;

		public function mount(){
			// Formatos por defecto
			$this->setDefaultFormats();
		}

		public function setDefaultFormats(){
			$this->name               = null;
			$this->currency           = 'USD';
			$this->currency_placement = 'Symbol First';
			$this->number_format      = '123,456.78';
			$this->date_format        = 'MM/DD/YYYY';
		}

		public function hideCreateModalForm(){
			$this->resetErrorBag();
			$this->dispatch('hideCreateModalForm');
			$this->isUpdateBudgetModal = false;
		}

		public function saveBudget(){
			/**
			 * Validate form
			 */

			$this->validate([
				'name' => 'required|unique:budgets,name',
			],[
				'name.required' => 'Se requiere el nombre del presupuesto',
				'name.unique'   => 'El nombre del presupuesto ya existe',
			]);

			// Iniciar transacción
			try{
				DB::transaction(function(){
					// Desactivar todos los presupuestos activos del usuario
					auth()->user()->budgets()->update(['is_active' => false]);

					// Guardar detalles del presupuesto
					Budget::create([
						'user_id'            => Auth::id(),
						'name'               => $this->name,
						'currency'           => $this->currency,
						'currency_placement' => $this->currency_placement,
						'number_format'      => $this->number_format,
						'date_format'        => $this->date_format,
					]);
				});

				$this->hideCreateModalForm();
				$this->dispatch('budgetSaved');
				$this->dispatch('redirect-home'); // Usamos 'dispatch' en Livewire 3

			} catch(\Exception $e){
				// En caso de error, puedes retornar el mensaje de error
				return "Error al enviar el correo: ".$e->getMessage();
			};

		} //End Method

		public function render(){
			return view('livewire.admin.create-budget');
		}
	}
