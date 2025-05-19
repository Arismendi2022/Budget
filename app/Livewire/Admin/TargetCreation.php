<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use Carbon\Carbon;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		// Constantes
		private const VALID_FREQUENCIES   = ['weekly','monthly','yearly','custom'];
		private const DEFAULT_FREQUENCY   = 'monthly';
		private const DEFAULT_DAY_OF_WEEK = 6;
		
		// Estados unificados con valores por defecto
		public array $state = [
			// Estados de visibilidad de componentes UI
			'isCollapsed'            => false,
			'isAutoAssign'           => true,
			'isCreateTarget'         => false,
			'isTargetSuccess'        => false,
			
			// Estados de modales
			'isOpenModalAssign'      => false,
			'isOpenAsideModal'       => false,
			'isOpenAsideCustomModal' => false,
			'isOpenCalendarModal'    => false,
			'isCalendarVisible'      => false,
			
			// Estados de funcionalidad
			'isRepeatEnabled'        => false,
			'isDateFilterEnabled'    => false,
			'isFocusedInput'         => false,
		];
		
		// Propiedades relacionadas con fechas y calendario
		public int    $currentYear;
		public int    $currentMonth;
		public int    $firstDayOfMonth;
		public string $selectedDate;
		public array  $daysInMonth = [];
		public ?int   $selectedDay = null;
		public        $selectedMonth,$selectedYear;
		public        $formattedMonthYear,$formattedEndDate;
		
		// Propiedades relacionadas con día de la semana
		public int    $selectedDayOfWeek = self::DEFAULT_DAY_OF_WEEK;
		public string $selectedDayText   = 'Saturday';
		
		// Propiedades relacionadas con montos
		public string $amount               = '';
		public float  $currencyAmount       = 0.0;
		public float  $currencyAmountWeekly = 0.0;
		public float  $monthlySavingsAmount = 0.0;
		
		// Propiedades relacionadas con la frecuencia y opciones
		public string  $selectedFrequency  = self::DEFAULT_FREQUENCY;
		public string  $selectedText       = 'Set aside another';
		public string  $selectedTextCustom = 'Set aside';
		public ?string $selectedOptionType = null;
		
		// 1. Añadir estas propiedades
		public $cadenceFrequency = '1';
		public $cadenceUnit      = '1'; // 1 = Month, 2 = Year
		public $frequencyOptions = [];
		
		// Categoría seleccionada
		public $category = null;
		
		/**
		 * Inicializa el componente
		 */
		public function mount():void{
			$this->initializeDate(Carbon::now()->addMonth());
			$this->updateFrequencyOptions();
		}
		
		/**
		 * Actualiza el monto cuando cambia el valor del input
		 */
		public function updatedAmount():void{
			$num                  = preg_replace('/[^0-9.]/','',$this->amount);
			$this->currencyAmount = is_numeric($num) ? (float)$num : 0.0;
			$this->amount         = $this->currencyAmount ? format_number($this->currencyAmount) : '';
		}
		
		/**
		 * Establece la frecuencia seleccionada
		 */
		public function setFrequency(string $frequency):void{
			if(in_array($frequency,self::VALID_FREQUENCIES)){
				$this->selectedFrequency = $frequency;
			}
		}
		
		/**
		 * Actualiza el día de la semana seleccionado
		 */
		public function updatedSelectedDayOfWeek():void{
			$this->selectedDayOfWeek = is_numeric($this->selectedDayOfWeek) ? (int)$this->selectedDayOfWeek : self::DEFAULT_DAY_OF_WEEK;
			$this->selectedDayText   = Carbon::create()->dayOfWeek($this->selectedDayOfWeek)->format('l');
		}
		
		/**
		 * Métodos para manejar los estados de los modales
		 */
		public function toggleState(string $stateKey):void{
			if(isset($this->state[$stateKey])){
				$this->state[$stateKey] = !$this->state[$stateKey];
			}
		}
		
		public function setState(string $stateKey,bool $value):void{
			if(isset($this->state[$stateKey])){
				$this->state[$stateKey] = $value;
			}
		}
		
		// Métodos de UI simplificados
		public function toggleCollapse():void{
			$this->toggleState('isCollapsed');
		}
		
		public function toggleRepeat():void{
			$this->toggleState('isRepeatEnabled');
		}
		
		public function toggleDateFilter():void{
			$this->toggleState('isDateFilterEnabled');
		}
		
		/**
		 * Métodos relacionados con modales
		 */
		public function showAutoAssignModal():void{
			$this->setState('isOpenModalAssign',true);
		}
		
		public function showCreateTarget():void{
			$this->setState('isCreateTarget',true);
			$this->selectedFrequency = self::DEFAULT_FREQUENCY;
			$this->resetForm();
			$this->dispatch('focusInput');
		}
		
		public function cancelCreateTarget():void{
			$this->setState('isCreateTarget',false);
			$this->setState('isOpenAsideModal',false);
			$this->resetForm();
		}
		
		public function showNextMonthModal():void{
			$this->setState('isOpenAsideModal',true);
		}
		
		public function showAsideCustomModal():void{
			$this->setState('isOpenAsideCustomModal',true);
		}
		
		/**
		 * Métodos para la gestión del calendario
		 */
		public function showModalCalendar():void{
			$this->initializeDate(Carbon::parse($this->selectedDate));
			$this->setState('isOpenCalendarModal',true);
			$this->setState('isCalendarVisible',true);
		}
		
		public function hideModalCalendar():void{
			$this->setState('isOpenCalendarModal',false);
			$this->setState('isCalendarVisible',false);
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
		
		/**
		 * Métodos para manejo del foco en el input
		 */
		public function setFocused():void{
			$this->setState('isFocusedInput',true);
			$this->dispatch('focusInput');
		}
		
		public function unsetFocused():void{
			$this->setState('isFocusedInput',false);
			$this->updatedAmount();
		}
		
		/**
		 * Métodos para actualizar texto seleccionado
		 */
		public function updateSelectedText(string $text,?string $optionType = null):void{
			$this->selectedText       = $text;
			$this->selectedOptionType = $optionType;
			$this->setState('isOpenAsideModal',false);
		}
		
		public function updateSelectedTextCustom(string $text,?string $optionType = null):void{
			$this->selectedTextCustom = $text;
			$this->selectedOptionType = $optionType;
			$this->setState('isOpenAsideCustomModal',false);
		}
		
		/**
		 * Métodos para manejo de categorías
		 */
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
			$this->setState('isAutoAssign',true);
			$this->category = null;
		}
		
		/**
		 * Método para guardar el objetivo
		 */
		public function saveTarget():void{
			$this->validate([
				'currencyAmount' => ['required','numeric','min:0.01'],
			],[
				'currencyAmount.required' => 'Targets require a positive amount.',
				'currencyAmount.min'      => 'Targets require a positive amount.',
			]);
			
			$this->currencyAmountWeekly = $this->currencyAmount;
			
			// Cálculos según frecuencia seleccionada
			if($this->selectedFrequency === 'weekly' && $this->selectedDayOfWeek !== null){
				$this->currencyAmountWeekly = $this->currencyAmount * $this->getDayOccurrencesInMonth($this->selectedDayOfWeek);
			}
			
			if($this->selectedFrequency === 'yearly' || $this->selectedFrequency === 'custom'){
				$this->monthlySavingsAmount = $this->calculateMonthlySavings();
			}
			
			if($this->selectedFrequency === 'custom' && $this->state['isDateFilterEnabled']){
				$this->monthlySavingsAmount = $this->calculateMonthlyGoal();
			}
			
			$this->setState('isCreateTarget',false);
			$this->setState('isTargetSuccess',true);
		}
		
		/**
		 * Inicializa las propiedades de fecha
		 */
		private function initializeDate(Carbon $date):void{
			$this->currentMonth    = $date->month;
			$this->currentYear     = $date->year;
			$this->selectedDate    = $date->startOfMonth()->format('Y-m-d');
			$this->firstDayOfMonth = $date->dayOfWeek;
			$this->daysInMonth     = range(1,$date->daysInMonth);
			$this->selectedMonth   = $date->month - 1;
		}
		
		/**
		 * Calcula el número de ocurrencias de un día de la semana en el mes actual
		 */
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
		
		/**
		 * Calcula los ahorros mensuales para objetivos anuales
		 */
		private function calculateMonthlySavings():float{
			$currentDate      = Carbon::now()->startOfMonth();
			$endDate          = Carbon::parse($this->selectedDate)->endOfMonth();
			$monthsDifference = max(1,$currentDate->diffInMonths($endDate));
			
			// Formatea la fecha final
			$this->formattedEndDate = Carbon::parse($this->selectedDate)->format('M j Y');
			
			return $this->currencyAmount / $monthsDifference;
		}
		
		/**
		 * Calcula el objetivo mensual para fechas personalizadas
		 */
		private function calculateMonthlyGoal():float{
			$currentDate = Carbon::now()->startOfMonth();
			$endDate     = Carbon::create($this->selectedYear,$this->selectedMonth + 1,1)->endOfMonth();
			
			if($endDate->lt($currentDate)){
				return 0;
			}
			
			$monthsDifference = max(1,$currentDate->diffInMonths($endDate));
			
			// Formatea la fecha como "Jun 2026"
			$this->formattedMonthYear = Carbon::create($this->selectedYear,$this->selectedMonth + 1,1)->format('M Y');
			
			return $this->currencyAmount / $monthsDifference;
		}
		
		// Añadir este método al componente TargetCreation
		public function updatedCadenceUnit(){
			$this->updateFrequencyOptions();
			
			// Si se selecciona Year y la frecuencia actual es mayor que las opciones disponibles,
			// resetea a 1
			if($this->cadenceUnit == '2' && $this->cadenceFrequency > '2'){
				$this->cadenceFrequency = '1';
			}
		}
		
		// Añadir este método privado
		private function updateFrequencyOptions(){
			if($this->cadenceUnit == '1'){ // Month
				// Para Month, mostrar opciones 1-11
				$this->frequencyOptions = range(1,11);
			}else{ // Year
				// Para Year, mostrar solo opciones 1-2
				$this->frequencyOptions = range(1,2);
			}
		}
		
		/**
		 * Reinicia el formulario
		 */
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
				'selectedYear',
				'selectedDayOfWeek',
				'selectedDayText',
				'formattedMonthYear',
				'formattedEndDate',
				'cadenceFrequency',
				'cadenceUnit',
			]);
			
			$this->setState('isRepeatEnabled',false);
			$this->setState('isDateFilterEnabled',false);
			$this->resetErrorBag();
		}
		
		/**
		 * Propiedad calculada para mostrar la fecha formateada
		 */
		public function getFormattedDateProperty():string{
			return format_date(Carbon::parse($this->selectedDate));
		}
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}