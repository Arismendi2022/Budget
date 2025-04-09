<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\BudgetAccount;
	use Carbon\Carbon;
	use Livewire\Component;
	
	class HeaderCalendar extends Component
	{
		public $currentDate;
		public $selectedYear,$months;
		
		// Escucha el evento 'numberFormatUpdated'
		protected $listeners = [
			'numberFormatUpdated' => '$refresh',
			'budgetTotalUpdated'  => 'getPositiveBudgetTotal', // o $refresh
			'dateSelected'        => 'updateDate'
		];
		
		public function mount(){
			$this->currentDate = now(); // Inicializa con el mes actual.
		}
		
		public function nextMonth(){
			$this->currentDate = Carbon::parse($this->currentDate)->addMonth();
		}
		
		public function previousMonth(){
			$this->currentDate = Carbon::parse($this->currentDate)->subMonth();
		}
		
		public function goToToday(){
			$this->currentDate  = now();
			$this->selectedYear = now()->year; // Add this line to update the selected year
		}
		
		public function isCurrentMonth(){
			return Carbon::parse($this->currentDate)->format('Y-m') === now()->format('Y-m');
		}
		
		public function openCalendarModal(){
			// Emite el evento y pasa el valor de $currentDate
			$this->dispatch('openCalendarModal',currentDate:$this->currentDate->toDateString());
		}
		
		public function getPositiveBudgetTotal(){
			return BudgetAccount::where('account_group','Cash')
				->where('balance','>',0)
				->sum('balance');
		}
		
		// Metodo para actualizar currentDate cuando se recibe el evento
		public function updateDate($data){
			$this->currentDate  = Carbon::parse($data['currentDate']);
			$this->selectedYear = $this->currentDate->year; // Actualizar el año si es necesario
		}
		
		public function render(){
			$this->months = collect(range(1,12))->map(function($month){
				$date = Carbon::createFromDate($this->selectedYear,$month,1);
				
				return [
					'number'         => $month,
					'name'           => $date->format('M'),
					'isSelected'     => $date->format('Y-m') === Carbon::parse($this->currentDate)->format('Y-m'),
					'isCurrentMonth' => $date->format('Y-m') === now()->format('Y-m'),
				];
			});
			
			return view('livewire.admin.header-calendar',[
				'formattedDate'   => Carbon::parse($this->currentDate)->format('M Y'),
				'showTodayButton' => !$this->isCurrentMonth(),
				'months'          => $this->months,
				'budgetTotal'     => $this->getPositiveBudgetTotal(),
			]);
		}
		
	}
