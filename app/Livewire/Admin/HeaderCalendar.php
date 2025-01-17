<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\BudgetAccount;
	use Carbon\Carbon;
	use Livewire\Component;
	
	class HeaderCalendar extends Component
	{
		public $currentDate;
		public $selectedYear,$months;
		public $isOpenCalendarModal = false;
		
		protected $listeners = ['budgetTotalUpdated' => '$refresh'];
		
		public function mount(){
			$this->currentDate  = now();
			$this->selectedYear = now()->year;
		}
		
		public function nextMonth(){
			$this->currentDate = Carbon::parse($this->currentDate)->addMonth();
		}
		
		public function previousMonth(){
			$this->currentDate = Carbon::parse($this->currentDate)->subMonth();
		}
		
		public function nextYear(){
			$this->selectedYear++;
		}
		
		public function previousYear(){
			$this->selectedYear--;
		}
		
		private function updateMonths(){
			$this->months = collect(range(1,12))->map(function($month){
				$date = Carbon::createFromDate($this->selectedYear,$month,1);
				
				return [
					'number'         => $month,
					'name'           => $date->format('M'),
					'isSelected'     => $date->format('Y-m') === Carbon::parse($this->currentDate)->format('Y-m'),
					'isCurrentMonth' => $date->format('Y-m') === now()->format('Y-m'),
				];
			});
		}
		
		public function goToToday(){
			$this->currentDate  = now();
			$this->selectedYear = now()->year; // Add this line to update the selected year
		}
		
		public function isCurrentMonth(){
			return Carbon::parse($this->currentDate)->format('Y-m') === now()->format('Y-m');
		}
		
		public function selectMonth($month){
			$this->currentDate         = Carbon::createFromDate($this->selectedYear,$month,1);
			$this->isOpenCalendarModal = false;
		}
		
		public function openCalendarModal(){
			$this->selectedYear        = Carbon::parse($this->currentDate)->year; // Sync selected year with current date
			$this->isOpenCalendarModal = true;
		}
		
		public function closeCalendarModal(){
			$this->isOpenCalendarModal = false;
		}
		
		public function getPositiveBudgetTotal(){
			return BudgetAccount::where('account_group','Budget')
				->where('balance','>',0)
				->sum('balance');
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
