<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use Carbon\Carbon;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		// Estados agrupados para mejor organización
		public array $state = [
			'isCollapsed'            => false,
			'isAutoAssign'           => true,
			'isOpenModalAssign'      => false,
			'isCreateTarget'         => false,
			'isOpenAsideModal'       => false,
			'isOpenAsideCustomModal' => false,
			'isOpenCalendarModal'    => false,
			'isActiveSwitch'         => false,
			'isSwitchRepeat'         => false,
			'isFocusedInput'         => false,
			'isTargetSuccess'        => false,
			'isCalendarVisible'      => false,
		];
		
		public string $selectedFrequency  = 'monthly';
		public string $selectedText       = 'Set aside another';
		public string $selectedTextCustom = 'Set aside';
		
		public $currencyAmount,$amount,$currencyAmountWeekly;
		
		public array  $daysInMonth = [];
		public        $firstDayOfMonth;
		public        $category;
		public string $selectedDate;
		public int    $currentMonth;
		public int    $currentYear;
		
		public $selectedDay;
		public $selectedDayOfWeek  = 6;
		public $selectedDayText    = 'Saturday';
		public $selectedOptionType = null;
		
		// Frecuencias permitidas como constante
		private const VALID_FREQUENCIES = ['weekly','monthly','yearly','custom'];
		
		public function mount():void{
			$this->initializeDate(Carbon::now()->addMonth());
			
		}
		
		public function updatedAmount():void{
			$num                  = preg_replace('/[^0-9.]/','',$this->amount);
			$this->currencyAmount = is_numeric($num) ? (float)$num : 0;
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
		
		private function resetTargetForm():void{
			$this->initializeDate(Carbon::now()->addMonth());
			$this->state['isActiveSwitch'] = false;
			$this->reset(['amount','currencyAmount','currencyAmountWeekly','selectedText','selectedTextCustom','selectedDay','selectedDayOfWeek','selectedDayText']);
		}
		
		public function showCreateTarget():void{
			$this->state['isCreateTarget'] = true;
			$this->selectedFrequency       = 'monthly';
			$this->resetTargetForm();
			$this->resetErrorBag();
			$this->dispatch('focusInput');
		}
		
		public function cancelCreateTarget():void{
			$this->state['isCreateTarget']   = false;
			$this->state['isOpenAsideModal'] = false;
			$this->resetTargetForm();
		}
		
		#[On('showCategoryTarget')]
		public function showCategoryTarget(int $categoryId):void{
			$this->category                  = Category::findOrFail($categoryId);
			$this->state['isAutoAssign']     = false;
			$this->state['isCreateTarget']   = false;
			$this->state['isOpenAsideModal'] = false;
			$this->state['isTargetSuccess']  = false;
		}
		
		#[On('hideCategoryTarget')]
		public function hideCategoryTarget():void{
			$this->state['isAutoAssign'] = true;
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
		
		public function hideModalCalendar(){
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
			$this->selectedDate                 = Carbon::create($this->currentYear,$this->currentMonth,$day)->format('Y-m-d');
			$this->state['isOpenCalendarModal'] = false;
			$this->state['isCalendarVisible']   = false;
		}
		
		public function getFormattedDateProperty():string{
			return format_date(Carbon::parse($this->selectedDate));
		}
		
		public function switchToggle():void{
			$this->state['isActiveSwitch'] = !$this->state['isActiveSwitch'];
			$this->state['isSwitchRepeat'] = $this->state['isActiveSwitch'];
		}
		
		
		public function updateSelectedText($text,$optionType = null){
			$this->selectedText              = $text;
			$this->selectedOptionType        = $optionType;
			$this->state['isOpenAsideModal'] = false;
		}
		
		public function updateSelectedTextCustom($text,$optionType = null){
			$this->selectedTextCustom              = $text;
			$this->selectedOptionType              = $optionType;
			$this->state['isOpenAsideCustomModal'] = false;
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
		
		public function saveTarget():void{
			$this->validateCurrencyAmount();
			
			// Inicializar $currencyAmountWeekly
			$this->currencyAmountWeekly = $this->currencyAmount;
			
			// Calcular el total para 'weekly'
			if($this->selectedFrequency === 'weekly' && isset($this->selectedDayOfWeek)){
				$this->calculateWeeklyTotal();
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
		}
		
		// NUEVO: Validar día de la semana
		public function updatedSelectedDayOfWeek():void{
			$this->selectedDayOfWeek = is_numeric($this->selectedDayOfWeek) ? (int)$this->selectedDayOfWeek : null;
		}
		
		
		private function calculateWeeklyTotal():void{
			if($this->currencyAmount > 0 && isset($this->selectedDayOfWeek)){
				$weeklyTotal                = $this->currencyAmount * $this->getDayOccurrencesInMonth($this->selectedDayOfWeek);
				$this->currencyAmountWeekly = $weeklyTotal; // Guarda el resultado en otra variable
			}
		}
		
		// NUEVO: Calcular ocurrencias
		private function getDayOccurrencesInMonth(int $dayOfWeek):int{
			// Usa el mes actual en lugar de $this->currentMonth
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
		
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
		
	}