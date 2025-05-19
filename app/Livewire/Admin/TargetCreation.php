<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use Carbon\Carbon;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		// Estados agrupados con valores por defecto
		public array $state = [
			'isCollapsed'            => false,
			'isAutoAssign'           => true,
			'isOpenModalAssign'      => false,
			'isCreateTarget'         => false,
			'isOpenAsideModal'       => false,
			'isOpenAsideCustomModal' => false,
			'isOpenCalendarModal'    => false,
			'isRepeatEnabled'        => false,
			'isDateFilterEnabled'    => false,
			'isFocusedInput'         => false,
			'isTargetSuccess'        => false,
			'isCalendarVisible'      => false,
		];
		
		public string $selectedFrequency  = 'monthly';
		public string $selectedText       = 'Set aside another';
		public string $selectedTextCustom = 'Set aside';
		
		public string $amount      = '';
		public int    $currentYear;
		public string $selectedDate;
		public int    $currentMonth;
		public float  $currencyAmount;
		public int    $firstDayOfMonth;
		public float  $currencyAmountWeekly;
		public float  $monthlySavingsAmount;
		public array  $daysInMonth = [];
		
		public         $category           = null;
		public ?int    $selectedDay        = null;
		public ?string $selectedOptionType = null;
		
		public $selectedDayOfWeek = 6;
		public $selectedDayText   = 'Saturday';
		public $selectedMonth,$selectedYear,$formattedMonthYear,$formattedEndDate;
		
		private const VALID_FREQUENCIES = ['weekly','monthly','yearly','custom'];
		
		public function mount():void{
			$this->initializeDate(Carbon::now()->addMonth());
			
		}
		
		public function updatedAmount():void{
			$num                  = preg_replace('/[^0-9.]/','',$this->amount);
			$this->currencyAmount = is_numeric($num) ? (float)$num : 0.0;
			$this->amount         = $this->currencyAmount ? format_number($this->currencyAmount) : '';
		}
		
		public function showAutoAssignModal():void{
			$this->state['isOpenModalAssign'] = true;
		}
		
		public function setFrequency(string $frequency):void{
			if(in_array($frequency,self::VALID_FREQUENCIES)){
				$this->selectedFrequency = $frequency;
			}
		}
		
		public function showCreateTarget():void{
			$this->state['isCreateTarget'] = true;
			$this->selectedFrequency       = 'monthly';
			$this->resetForm();
			$this->dispatch('focusInput');
		}
		
		public function cancelCreateTarget():void{
			$this->state['isCreateTarget']   = false;
			$this->state['isOpenAsideModal'] = false;
			$this->resetForm();
		}
		
		#[On('showCategoryTarget')]
		public function showCategoryTarget(int $categoryId):void{
			$this->category = Category::findOrFail($categoryId);
			$this->state    = array_merge($this->state,[
				'isAutoAssign'     => false,
				'isCreateTarget'   => false,
				'isOpenAsideModal' => false,
				'isTargetSuccess'  => false,
			]);
		}
		
		#[On('hideCategoryTarget')]
		public function hideCategoryTarget():void{
			$this->state['isAutoAssign'] = true;
			$this->category              = null;
		}
		
		public function showNextMonthModal():void{
			$this->state['isOpenAsideModal'] = true;
		}
		
		public function showAsideCustomModal():void{
			$this->state['isOpenAsideCustomModal'] = true;
		}
		
		public function setFocused():void{
			$this->state['isFocusedInput'] = true;
			$this->dispatch('focusInput');
		}
		
		public function unsetFocused():void{
			$this->state['isFocusedInput'] = false;
			$this->updatedAmount();
		}
		
		public function toggleCollapse():void{
			$this->state['isCollapsed'] = !$this->state['isCollapsed'];
		}
		
		public function showModalCalendar():void{
			$this->initializeDate(Carbon::parse($this->selectedDate));
			$this->state['isOpenCalendarModal'] = true;
			$this->state['isCalendarVisible']   = true;
		}
		
		public function hideModalCalendar():void{
			$this->state['isOpenCalendarModal'] = false;
			$this->state['isCalendarVisible']   = false;
		}
		
		public function previousMonth():void{
			$this->initializeDate(Carbon::create($this->currentYear,$this->currentMonth,1)->subMonth());
		}
		
		public function nextMonth():void{
			$this->initializeDate(Carbon::create($this->currentYear,$this->currentMonth,1)->addMonth());
		}
		
		public function selectDate(int $day):void{
			$this->selectedDate = Carbon::create($this->currentYear,$this->currentMonth,$day)->format('Y-m-d');
			$this->hideModalCalendar();
		}
		
		public function getFormattedDateProperty():string{
			return format_date(Carbon::parse($this->selectedDate));
		}
		
		public function toggleRepeat(){
			$this->state['isRepeatEnabled'] = !$this->state['isRepeatEnabled'];
		}
		
		public function toggleDateFilter(){
			$this->state['isDateFilterEnabled'] = !$this->state['isDateFilterEnabled'];
		}
		
		public function updateSelectedText(string $text,?string $optionType = null):void{
			$this->selectedText              = $text;
			$this->selectedOptionType        = $optionType;
			$this->state['isOpenAsideModal'] = false;
		}
		
		public function updateSelectedTextCustom(string $text,?string $optionType = null):void{
			$this->selectedTextCustom              = $text;
			$this->selectedOptionType              = $optionType;
			$this->state['isOpenAsideCustomModal'] = false;
		}
		
		public function saveTarget():void{
			$this->validate([
				'currencyAmount' => ['required','numeric','min:0.01'],
			],[
				'currencyAmount.required' => 'Targets require a positive amount.',
				'currencyAmount.min'      => 'Targets require a positive amount.',
			]);
			
			$this->currencyAmountWeekly = $this->currencyAmount;
			
			if($this->selectedFrequency === 'weekly' && $this->selectedDayOfWeek !== null){
				$this->currencyAmountWeekly = $this->currencyAmount * $this->getDayOccurrencesInMonth($this->selectedDayOfWeek);
			}
			
			if($this->selectedFrequency === 'yearly' || $this->selectedFrequency === 'custom'){
				$this->monthlySavingsAmount = $this->calculateMonthlySavings();
			}
			
			if($this->selectedFrequency === 'custom' && $this->state['isDateFilterEnabled']){
				$this->monthlySavingsAmount = $this->calculateMonthlyGoal();
			}
			
			$this->state['isCreateTarget']  = false;
			$this->state['isTargetSuccess'] = true;
		}
		
		private function initializeDate(Carbon $date):void{
			$this->currentMonth    = $date->month;
			$this->currentYear     = $date->year;
			$this->selectedDate    = $date->startOfMonth()->format('Y-m-d');
			$this->firstDayOfMonth = $date->dayOfWeek;
			$this->daysInMonth     = range(1,$date->daysInMonth);
			$this->selectedMonth   = $date->month - 1;
		}
		
		public function updatedSelectedDayOfWeek():void{
			$this->selectedDayOfWeek = is_numeric($this->selectedDayOfWeek) ? (int)$this->selectedDayOfWeek : 6;
			$this->selectedDayText   = Carbon::create()->dayOfWeek($this->selectedDayOfWeek)->format('l');
		}
		
		private function getDayOccurrencesInMonth(int $dayOfWeek):int{
			$start = Carbon::now()->startOfMonth();
			$end   = $start->copy()->endOfMonth();
			$count = 0;
			
			while($start->lte($end)){
				if($start->dayOfWeek === $dayOfWeek){
					$count++;
				}
				$start->addDay();
			}
			
			return $count;
		}
		
		private function calculateMonthlySavings():float{
			$currentDate = Carbon::now()->startOfMonth();
			
			$endDate          = Carbon::parse($this->selectedDate)->endOfMonth();
			$monthsDifference = max(1,$currentDate->diffInMonths($endDate));
			
			// Formatea la fecha final como "Dec 30 2025"
			$this->formattedEndDate = Carbon::parse($this->selectedDate)->format('M j Y');
			
			return $this->currencyAmount / $monthsDifference;
		}
		
		private function calculateMonthlyGoal():float{
			$currentDate = Carbon::now()->startOfMonth();
			
			$endDate = Carbon::create($this->selectedYear,$this->selectedMonth + 1,1)->endOfMonth();
			if($endDate->lt($currentDate)){
				return 0;
			}
			
			$monthsDifference = max(1,$currentDate->diffInMonths($endDate));
			
			// Añade esta línea para crear la variable formateada Jun 2026
			$this->formattedMonthYear = Carbon::create($this->selectedYear,$this->selectedMonth + 1,1)->format('M Y');
			
			return $this->currencyAmount / $monthsDifference;
		}
		
		private function resetForm():void{
			$this->initializeDate(Carbon::now()->addMonth());
			$this->reset([
				'amount',
				'currencyAmount',
				'currencyAmountWeekly',
				'monthlySavingsAmount',
				'selectedText',
				'selectedTextCustom',
				'selectedDay',
				'selectedDayOfWeek',
				'selectedDayText',
				'formattedMonthYear',
				'formattedEndDate',
			]);
			$this->state['isRepeatEnabled']     = false;
			$this->state['isDateFilterEnabled'] = false;
			$this->resetErrorBag();
		}
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}