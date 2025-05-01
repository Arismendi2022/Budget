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
		public $isOpenNextMonthModal   = false;
		public $isOpenAsideCustomModal = false;
		public $selectedFrequency      = 'monthly';
		public $isOpenCalendarModal    = false;
		public $isActive               = false;
		public $isSwitchRepeat         = false;
		public $isFocusedInput         = false;
		
		public $currencyAmount;
		public $amount = '';
		
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
		
		public function formatNumber($number){
			return format_number($number);
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
			$this->selectedDate = Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d');
			// Actualizar el mes y año del calendario para que coincida con selectedDate
			$dateObj            = Carbon::parse($this->selectedDate);
			$this->currentMonth = $dateObj->month;
			$this->currentYear  = $dateObj->year;
			$this->updateCalendar();
			
			$this->resetErrorBag();
			$this->reset('amount','currencyAmount');
		}
		
		public function cancelCreateTarget(){
			$this->isCreateTarget       = false;
			$this->isOpenNextMonthModal = false;
			$this->selectedDate         = Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d');
			// Actualizar el mes y año del calendario para que coincida con selectedDate
			$dateObj            = Carbon::parse($this->selectedDate);
			$this->currentMonth = $dateObj->month;
			$this->currentYear  = $dateObj->year;
			$this->updateCalendar();
		}
		
		#[On('showCategoryTarget')]
		public function showCategoryTarget($categoryId){
			$this->category             = Category::findOrFail($categoryId);
			$this->isAutoAssign         = false;
			$this->isCreateTarget       = false;
			$this->isOpenNextMonthModal = false;
		}
		
		#[On('hideCategoryTarget')]
		public function hideCategoryTarget($categoryId){
			$this->isAutoAssign = true;
		}
		
		public function showNextMonthModal(){
			$this->isOpenNextMonthModal = true;
		}
		
		public function hideNextMonthModal(){
			$this->isOpenNextMonthModal = false;
		}
		
		public function showAsideCustomModal(){
			$this->isOpenAsideCustomModal = true;
		}
		
		public function hideAsideCustomModal(){
			$this->isOpenAsideCustomModal = false;
		}
		
		public function setFocused(){
			$this->isFocusedInput = true;
			$this->dispatch('focusInput');
		}
		
		public function unsetFocused(){
			$this->isFocusedInput = false;
			$num                  = preg_replace('/[^0-9.]/','',$this->amount);
			$this->currencyAmount = is_numeric($num) ? (float)$num : 0;
			$this->amount         = $this->currencyAmount ? $this->formatNumber($this->currencyAmount) : '';
		}
		
		public function toggleCollapse(){
			$this->isCollapsed = !$this->isCollapsed;
		}
		
		public function showModalCalendar(){
			// Sincronizar el calendario con la fecha seleccionada actual
			$dateObj            = Carbon::parse($this->selectedDate);
			$this->currentMonth = $dateObj->month;
			$this->currentYear  = $dateObj->year;
			$this->updateCalendar();
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
			$this->isOpenCalendarModal = false;
		}
		
		public function getFormattedDateProperty(){
			return Carbon::parse($this->selectedDate)->format('M j, Y');
		}
		
		public function switchToggle(){
			$this->isActive       = !$this->isActive;
			$this->isSwitchRepeat = $this->isActive;
		}
		
		private function validateCurrencyAmount(){
			$this->validate([
				'currencyAmount' => [
					'required',
				],
			],[
				'currencyAmount.required' => 'Targets require a positive amount.',
			]);
		}
		
		public function saveTarget(){
			$this->validateCurrencyAmount();
			
		}
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}