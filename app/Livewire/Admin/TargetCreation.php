<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use Carbon\Carbon;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		public $isCollapsed            = false;
		public $isAutoAssign           = true;
		public $isOpenModalAssign      = false;
		public $isCreateTarget         = false;
		public $openNextMonthModal     = false;
		public $isOpenAsideCustomModal = false;
		public $selectedFrequency      = 'monthly'; // Valor predeterminado
		public $isOpenCalendarModal    = false;
		
		public $daysInMonth = [];
		public $firstDayOfMonth;
		public $category,$selectedDate,$currentMonth,$currentYear;
		
		public function mount(){
			$currentDate        = Carbon::now();
			$nextMonth          = $currentDate->copy()->addMonth();
			$this->currentMonth = $nextMonth->month;
			$this->currentYear  = $nextMonth->year;
			$this->selectedDate = $nextMonth->startOfMonth()->format('Y-m-d');
			$this->updateCalendar();
		}
		
		public function showAutoAssignModal(){
			$this->isOpenModalAssign = true;
		}
		
		public function hidenAutoAssignModal(){
			$this->isOpenModalAssign = false;
		}
		
		public function setFrequency($frequency){
			$this->selectedFrequency = $frequency;
		}
		
		public function showCreateTarget(){
			$this->isCreateTarget    = true;
			$this->selectedFrequency = 'monthly';
			$this->dispatch('focusInput');
			// Reiniciar la fecha al primer día del mes siguiente
			$this->selectedDate = Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d');
			$this->updateCalendar();
		}
		
		public function hideCreateTarget(){
			$this->isCreateTarget     = false;
			$this->openNextMonthModal = false;
			// Reiniciar la fecha al primer día del mes siguiente
			$this->selectedDate = Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d');
			$this->updateCalendar();
		}
		
		#[On('showCategoryTarget')]
		public function showCategoryTarget($categoryId){
			$this->category           = Category::findOrFail($categoryId);
			$this->isAutoAssign       = false;
			$this->isCreateTarget     = false;
			$this->openNextMonthModal = false;
		}
		
		#[On('hideCategoryTarget')]
		public function hideCategoryTarget($categoryId){
			$this->isAutoAssign = true;
		}
		
		public function showNextMonthModal(){
			$this->openNextMonthModal = true;
		}
		
		public function hideNextMonthModal(){
			$this->openNextMonthModal = false;
		}
		
		public function showAsideCustomModal(){
			$this->isOpenAsideCustomModal = true;
		}
		
		public function hideAsideCustomModal(){
			$this->isOpenAsideCustomModal = false;
		}
		
		public function toggleCollapse(){
			$this->isCollapsed = !$this->isCollapsed;
		}
		
		public function showModalCalendar(){
			$this->isOpenCalendarModal = true;
		}
		
		public function updateCalendar(){
			$date                  = Carbon::create($this->currentYear,$this->currentMonth,1);
			$this->firstDayOfMonth = $date->dayOfWeek;
			$this->daysInMonth     = range(1,$date->daysInMonth);
		}
		
		public function previousMonth(){
			$date               = Carbon::create($this->currentYear,$this->currentMonth,1)->subMonth();
			$this->currentMonth = $date->month;
			$this->currentYear  = $date->year;
			$this->updateCalendar();
		}
		
		public function nextMonth(){
			$date               = Carbon::create($this->currentYear,$this->currentMonth,1)->addMonth();
			$this->currentMonth = $date->month;
			$this->currentYear  = $date->year;
			$this->updateCalendar();
		}
		
		public function selectDate($day){
			$this->selectedDate        = Carbon::create($this->currentYear,$this->currentMonth,$day)->format('Y-m-d');
			$this->isOpenCalendarModal = false; // Cerrar el modal después de seleccionar la fecha
		}
		
		public function getFormattedDateProperty(){
			return Carbon::parse($this->selectedDate)->format('M j, Y');
		}
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}
	
	