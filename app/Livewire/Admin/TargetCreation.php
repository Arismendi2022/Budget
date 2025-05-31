<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use App\Models\CategoryTarget;
	use Carbon\Carbon;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	/**
	 *
	 */
	class TargetCreation extends Component
	{
		// Constantes
		/**
		 *
		 */
		private const VALID_FREQUENCIES   = ['weekly','monthly','yearly','custom'];
		private const DEFAULT_FREQUENCY   = 'monthly';
		private const DEFAULT_DAY_OF_WEEK = 6;
		
		// Constantes para unidades
		private const UNIT_MONTH = 1;
		private const UNIT_YEAR  = 2;
		
		// Estados unificados con valores por defecto
		/**
		 * @var array
		 */
		public array $state = [
			// Estados de visibilidad de componentes UI
			'isCollapsed'            => false,
			'isAutoAssign'           => true,
			'isCreateTarget'         => false,
			'isSaveSuccessful'       => false,
			
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
		public string $targetFinishDate;
		public array  $daysInMonth    = [];
		public        $dayOfMonth     = null;
		public        $dayOfMonthText = "Last Day of Month"; // Valor inicial por defecto
		
		public $formattedMonthYear,$formattedEndDate;
		
		public $selectedMonth,$selectedYear;
		
		// Propiedades relacionadas con día de la semana
		public int    $dayOfWeek       = self::DEFAULT_DAY_OF_WEEK;
		public string $selectedDayText = 'Saturday';
		public        $assignValue,$targetId;
		
		// Propiedades relacionadas con montos
		public string $targetAmount         = '';
		public        $currencyAmount       = 0.0;
		public float  $currencyAmountWeekly = 0.0;
		public float  $monthlySavingsAmount = 0.0;
		
		// Propiedades relacionadas con la frecuencia y opciones
		public string  $selectedFrequency  = self::DEFAULT_FREQUENCY;
		public string  $selectedText       = 'Set aside another';
		public string  $selectedTextCustom = 'Set aside';
		public ?string $selectedOptionType = null;
		
		// Añadir estas propiedades
		public int   $cadenceFrequency = 1;
		public int   $cadenceUnit      = self::UNIT_MONTH;
		public array $frequencyOptions = [];
		
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
			$num                  = preg_replace('/[^0-9.]/','',$this->targetAmount);
			$this->currencyAmount = is_numeric($num) ? (float)$num : 0.0;
			$this->targetAmount   = $this->currencyAmount ? format_number($this->currencyAmount) : '';
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
		public function updateddayOfWeek():void{
			$this->dayOfWeek       = is_numeric($this->dayOfWeek) ? (int)$this->dayOfWeek : self::DEFAULT_DAY_OF_WEEK;
			$this->selectedDayText = Carbon::create()->dayOfWeek($this->dayOfWeek)->format('l');
		}
		
		private function getFormattedLastDay(){
			// Obtener el último día del mes actual
			$lastDay = Carbon::now()->endOfMonth()->day;
			
			// Asignar sufijo solo para el último día
			$suffix = $lastDay == 31 ? 'st' : 'th';
			
			// Retornar el día con el sufijo
			return $lastDay.$suffix;
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
			// Verifica si existe un registro en CategoryTarget con ese ID
			if(!empty($this->targetId) && CategoryTarget::find($this->targetId)){
				$this->setState('isCreateTarget',false);
				$this->setState('isSaveSuccessful',true);
				$this->resetForm();
			}else{
				$this->setState('isCreateTarget',false);
				$this->setState('isOpenAsideModal',false);
				$this->resetForm();
			}
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
			$this->initializeDate(Carbon::parse($this->targetFinishDate));
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
			$this->targetFinishDate = Carbon::create($this->currentYear,$this->currentMonth,$day)->format('Y-m-d');
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
		 * Métodos para manejo crear target categorías
		 */
		#[On('showCategoryTarget')]
		public function showCategoryTarget(int $categoryId):void{
			$this->category = Category::findOrFail($categoryId);
			$this->state    = array_merge($this->state,[
				'isAutoAssign'     => false,
				'isCreateTarget'   => false,
				'isOpenAsideModal' => false,
				'isSaveSuccessful' => false,
			]);
		}
		
		/**
		 * Metodo para salir de crear target
		 */
		#[On('hideCategoryTarget')]
		public function hideCategoryTarget():void{
			$this->setState('isAutoAssign',true);
			$this->category = null;
		}
		
		/**
		 * Métodos para editar los target debcategorías
		 */
		#[On('showEditForm')]
		public function showEditForm(int $categoryId):void{
			$this->category = Category::findOrFail($categoryId);
			$this->state    = array_merge($this->state,[
				'isAutoAssign'     => false,
				'isCreateTarget'   => false,
				'isOpenAsideModal' => false,
				'isSaveSuccessful' => true,
			]);
		}
		
		/**
		 * Metodo para editar el target de una categoria
		 */
		public function showEditTargetForm(int $targetId):void{
			
			$this->targetId = $targetId; // Guardas el ID que vas a editar
			
			$this->state = array_merge($this->state,[
				'isCreateTarget'   => true,
				'isSaveSuccessful' => false,
			]);
			try{
				// Obtener el CategoryTarget con su categoría relacionada
				$categoryTarget = CategoryTarget::with('category')->findOrFail($targetId);
				
				// Asignar datos al formulario
				$this->targetAmount   = $categoryTarget->amount;
				$this->currencyAmount = $categoryTarget->amount;
				
				// Asignar datos específicos según la frecuencia
				switch($categoryTarget->frequency){
					case 'weekly':
						$this->selectedFrequency = $categoryTarget->frequency;
						$this->dayOfWeek         = $categoryTarget->day_of_week;
						break;
					case 'monthly':
						$this->selectedFrequency = $categoryTarget->frequency;
						$this->dayOfMonth        = $categoryTarget->day_of_month;
						break;
					case 'yearly':
						$this->selectedFrequency = $categoryTarget->frequency;
						$this->targetFinishDate  = $categoryTarget->target_date;
						break;
					case 'custom':
						$this->selectedFrequency            = $categoryTarget->frequency;
						$this->state['isDateFilterEnabled'] = false;
						
						break;
				}
				$this->setFocused();
				
			} catch(\Exception $e){
				\Log::error("Error al cargar objetivo $targetId para edición: {$e->getMessage()}");
				throw new \Exception('No se pudo cargar el objetivo para edición: '.$e->getMessage());
			}
		}
		
		/**
		 * Valida los datos de entrada para los objetivos
		 */
		private
		function validateTargetData():void{
			$this->validate([
				'currencyAmount' => ['required','numeric','min:0.01'],
			],[
				'currencyAmount.required' => 'El objetivo requiere una cantidad positiva.',
				'currencyAmount.min'      => 'El objetivo requiere una cantidad positiva.',
			]);
		}
		
		/**
		 * Metodo para guardar el objetivo
		 */
		public function createTarget(int $categoryId
		):void{
			// Validar el monto
			$this->validateTargetData();
			
			try{
				// Ajustar el día del mes si es "último día"
				$dayOfMonthText = $this->dayOfMonthText === 'Last Day of Month'
					? $this->getFormattedLastDay()
					: $this->dayOfMonthText;
				
				// Verificar que la categoría existe
				Category::findOrFail($categoryId);
				
				// Preparar datos básicos
				$data = [
					'category_id' => $categoryId,
					'amount'      => $this->currencyAmount,
					'option_type' => $this->selectedOptionType,
					'frequency'   => $this->selectedFrequency,
					'message'     => $this->selectedOptionType === 'set-aside' ? 'more needed' : 'needed',
				];
				
				// Agregar datos según la frecuencia seleccionada
				switch($this->selectedFrequency){
					case 'weekly':
						$data['assign']         = $this->currencyAmount * $this->getDayOccurrencesInMonth($this->dayOfWeek);
						$data['status_details'] = 'this month';
						$data['day_of_week']    = $this->dayOfWeek;
						break;
					
					case 'monthly':
						$data['assign']         = $this->currencyAmount;
						$data['status_details'] = 'by the '.$dayOfMonthText;
						$data['day_of_month']   = $this->dayOfMonth;
						break;
					
					case 'yearly':
						$data['assign']         = $this->calculateMonthlySavings();
						$data['status_details'] = 'this month';
						$data['target_date']    = $this->targetFinishDate;
						break;
					
					case 'custom':
						if($this->state['isDateFilterEnabled']){
							$data['assign']         = $this->calculateMonthlyGoal();
							$data['status_details'] = 'this month';
							$data['target_date']    = $this->endDateTarget;
						}else{
							$data['assign']         = $this->selectedOptionType === 'have'
								? $this->currencyAmount
								: $this->calculateMonthlySavings();
							$data['status_details'] = $this->selectedOptionType === 'have' ? 'eventually' : 'this month';
							if($this->selectedOptionType !== 'have'){
								$data['target_date'] = $this->targetFinishDate;
							}
						}
						break;
				}
				
				// Guardar el objetivo
				CategoryTarget::create($data);
				
				// Actualizar interfaz
				$this->dispatch('Target.freshCategories');
				$this->setState('isCreateTarget',false);
				$this->setState('isSaveSuccessful',true);
				$this->resetForm();
				
			} catch(\Exception $e){
				\Log::error("Error al crear objetivo para categoría $categoryId: {$e->getMessage()}");
				throw new \Exception('No se pudo crear el objetivo: '.$e->getMessage());
			}
		}
		
		/**
		 * Metodo para actualizar el objetivo
		 */
		public function updateTarget(int $Id
		){
		
		}
		
		/**
		 * Metodo para eliminar el objetivo
		 */
		public function deleteTarget(int $targetId
		){
			
			try{
				$categoryTarget = CategoryTarget::findOrFail($targetId);
				// Eliminar el objetivo
				$categoryTarget->delete();
				
				// Actualizar interfaz
				$this->dispatch('Target.freshCategories');
				$this->setState('isCreateTarget',false);
				$this->setState('isSaveSuccessful',true);
			} catch(\Exception $e){
				\Log::error("Error al eliminar objetivo $targetId: {$e->getMessage()}");
				throw new \Exception('No se pudo eliminar el objetivo: '.$e->getMessage());
			}
			
		}
		
		/**
		 * Inicializa las propiedades de fecha
		 */
		private function initializeDate(Carbon $date
		):void{
			$this->currentMonth     = $date->month;
			$this->currentYear      = $date->year;
			$this->targetFinishDate = $date->startOfMonth()->format('Y-m-d');
			$this->firstDayOfMonth  = $date->dayOfWeek;
			$this->daysInMonth      = range(1,$date->daysInMonth);
			$this->selectedMonth    = $date->month - 1;
		}
		
		/**
		 * Calcula el número de ocurrencias de un día de la semana en el mes actual
		 */
		private function getDayOccurrencesInMonth(int $dayOfWeek
		):int{
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
			$endDateTarget    = Carbon::parse($this->targetFinishDate)->endOfMonth();
			$monthsDifference = max(1,$currentDate->diffInMonths($endDateTarget));
			
			// Formatea la fecha final
			$this->formattedEndDate = Carbon::parse($this->targetFinishDate)->format('M j Y');
			
			return $this->currencyAmount / $monthsDifference;
		}
		
		/**
		 * Calcula el objetivo mensual para fechas personalizadas
		 */
		private function calculateMonthlyGoal():float{
			$currentDate         = Carbon::now()->startOfMonth();
			$this->endDateTarget = Carbon::create($this->selectedYear,$this->selectedMonth + 1,1)->endOfMonth();
			
			if($this->endDateTarget->lt($currentDate)){
				return 0;
			}
			
			$monthsDifference = max(1,$currentDate->diffInMonths($this->endDateTarget)); // ✅ Agregué $this->
			// Formatea la fecha como "Jun 2026"
			$this->formattedMonthYear = Carbon::create($this->selectedYear,$this->selectedMonth + 1,1)->format('M Y');
			
			return $this->currencyAmount / $monthsDifference;
		}
		
		/**
		 * Actualiza las opciones de frecuencia cuando cambia la unidad de tiempo
		 */
		public function updatedCadenceUnit(){
			// Actualizar opciones de frecuencia
			$this->updateFrequencyOptions();
			
			// Resetear frecuencia si excede el máximo permitido para Year
			$maxFrequency = $this->cadenceUnit === self::UNIT_YEAR ? 2 : 11;
			if($this->cadenceFrequency > $maxFrequency){
				$this->cadenceFrequency = 1;
			}
		}
		
		/**
		 * Actualiza las opciones de frecuencia según la unidad seleccionada
		 */
		private function updateFrequencyOptions(){
			// Mapa de opciones por unidad
			$optionsMap = [
				self::UNIT_MONTH => range(1,11),
				self::UNIT_YEAR  => range(1,2),
			];
			
			$this->frequencyOptions = $optionsMap[$this->cadenceUnit] ?? range(1,11);
		}
		
		/**
		 * Reinicia el formulario
		 */
		private function resetForm():void{
			$this->initializeDate(Carbon::now()->addMonth());
			$this->reset([
				'targetAmount',
				'currencyAmount',
				'currencyAmountWeekly',
				'monthlySavingsAmount',
				'selectedText',
				'selectedTextCustom',
				'dayOfMonth',
				'selectedYear',
				'dayOfWeek',
				'selectedDayText',
				'dayOfMonthText',
				'formattedMonthYear',
				'formattedEndDate',
				'cadenceFrequency',
				'cadenceUnit',
				'targetId',
			]);
			
			$this->setState('isRepeatEnabled',false);
			$this->setState('isDateFilterEnabled',false);
			
			$this->updateFrequencyOptions();
			$this->resetErrorBag();
		}
		
		/**
		 * Propiedad calculada para mostrar la fecha formateada
		 */
		public function getFormattedDateProperty():string{
			return format_date(Carbon::parse($this->targetFinishDate));
		}
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}