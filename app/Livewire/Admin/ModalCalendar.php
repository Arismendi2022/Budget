<?php
	
	namespace App\Livewire\Admin;
	
	use Carbon\Carbon;
	use Livewire\Component;
	
	class ModalCalendar extends Component
	{
		public $isOpenCalendarModal = false;
		public $selectedYear,$months;
		public $currentDate;
		
		// Escucha el evento 'openCalendarModal'
		protected $listeners = ['openCalendarModal' => 'openCalendarModal'];
		
		public function mount(){
			$this->currentDate  = now();
			$this->selectedYear = now()->year;
		}
		
		public function openCalendarModal($currentDate = null){
			
			// Actualiza $this->currentDate con el valor recibido del componente padre
			if($currentDate){
				$this->currentDate = Carbon::parse($currentDate);
			}
			
			$this->selectedYear        = Carbon::parse($this->currentDate)->year;
			$this->isOpenCalendarModal = true;
		}
		
		public function closeCalendarModal(){
			$this->isOpenCalendarModal = false;
		}
		
		public function nextYear(){
			$this->selectedYear++;
		}
		
		public function previousYear(){
			$this->selectedYear--;
		}
		
		public function isCurrentMonth(){
			return Carbon::parse($this->currentDate)->format('Y-m') === now()->format('Y-m');
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
		
		public function selectMonth($month){
			$this->currentDate         = Carbon::createFromDate($this->selectedYear,$month,1);
			$this->isOpenCalendarModal = false;
			// Emitir el evento con el valor de currentDate
			$this->dispatch('dateSelected',['currentDate' => $this->currentDate->toDateString()]);
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
			
			return view('livewire.admin.modal-calendar');
		}
		
	}
	
	
	
