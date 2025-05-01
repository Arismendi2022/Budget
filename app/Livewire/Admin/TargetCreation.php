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
			try{
				$currentDate        = Carbon::now();
				$nextMonth          = $currentDate->copy()->addMonth();
				$this->currentMonth = $nextMonth->month;
				$this->currentYear  = $nextMonth->year;
				$this->selectedDate = $nextMonth->startOfMonth()->format('Y-m-d');
				$this->updateCalendar();
			} catch(\Exception $e){
				\Log::error('Error en mount: '.$e->getMessage());
				$this->selectedDate = Carbon::now()->startOfMonth()->format('Y-m-d');
				$this->updateCalendar();
			}
		}
		
		public function currency(){
			return 'USD'; // O obtener de una configuración
		}
		
		public function formatNumber($number){
			return number_format((float)$number,2,'.','');
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
			$this->updateCalendar();
			
			$this->resetErrorBag();
			$this->reset('amount','currencyAmount');
		}
		
		public function cancelCreateTarget(){
			$this->isCreateTarget       = false;
			$this->isOpenNextMonthModal = false;
			$this->selectedDate         = Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d');
			$this->updateCalendar();
		}
		
		#[On('showCategoryTarget')]
		public function showCategoryTarget($categoryId){
			try{
				$this->category             = Category::findOrFail($categoryId);
				$this->isAutoAssign         = false;
				$this->isCreateTarget       = false;
				$this->isOpenNextMonthModal = false;
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
				\Log::error('Categoría no encontrada: '.$categoryId);
				$this->category = null;
				$this->dispatch('notify',['message' => 'Categoría no encontrada','type' => 'error']);
			}
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
			try{
				$num                  = preg_replace('/[^0-9.]/','',$this->amount);
				$this->currencyAmount = is_numeric($num) ? (float)$num : 0;
				$this->amount         = $this->currencyAmount ? $this->formatNumber($this->currencyAmount) : '';
			} catch(\Exception $e){
				\Log::error('Error en unsetFocused: '.$e->getMessage());
				$this->currencyAmount = 0;
				$this->amount         = '';
			}
		}
		
		public function updatedAmount($value){
			$this->validate([
				'amount' => 'nullable|numeric|min:0',
			],[
				'amount.numeric' => 'El monto debe ser un número válido.',
				'amount.min'     => 'El monto no puede ser negativo.',
			]);
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
			$this->isOpenCalendarModal = false;
		}
		
		public function getFormattedDateProperty(){
			return Carbon::parse($this->selectedDate)->format('M j, Y');
		}
		
		public function switchToggle(){
			$this->isActive       = !$this->isActive;
			$this->isSwitchRepeat = $this->isActive;
		}
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}