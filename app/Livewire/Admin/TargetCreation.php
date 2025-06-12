<?php
	
	namespace App\Livewire\Admin;
	
	use App\Models\Category;
	use App\Models\CategoryTarget;
	use Carbon\Carbon;
	use Livewire\Attributes\On;
	use Livewire\Component;
	
	class TargetCreation extends Component
	{
		// === CONSTANTS ===
		private const VALID_FREQUENCIES   = ['weekly','monthly','yearly','custom'];
		private const DEFAULT_FREQUENCY   = 'monthly';
		private const DEFAULT_DAY_OF_WEEK = 6; // Saturday
		private const UNIT_MONTH          = 1;
		private const UNIT_YEAR           = 2;
		
		// === EXISTING GROUPED STATE (mantener para evitar errores) ===
		public array $state = [
			// UI visibility states
			'isCollapsed'            => false,
			'isAutoAssign'           => true,
			'isCreateTarget'         => false,
			'isSaveSuccessful'       => false,
			'isAutoAssignEnabled'    => false,
			'isSummaryEnabled'       => false,
			'isAssignedMonthEnabled' => false,
			
			// Modal states
			'isOpenModalAssign'      => false,
			'isOpenAsideModal'       => false,
			'isOpenAsideCustomModal' => false,
			'isOpenCalendarModal'    => false,
			'isCalendarVisible'      => false,
			
			// Functionality states
			'isRepeatEnabled'        => false,
			'isDateFilterEnabled'    => false,
			'isFocusedInput'         => false,
			'isUpdateTargetMode'     => false,
			'isSnoozeEnabled'        => false,
		];
		
		// === CALENDAR & DATE PROPERTIES ===
		public int     $currentYear;
		public int     $currentMonth;
		public int     $firstDayOfMonth;
		public ?string $targetFinishDate = null;
		public array   $daysInMonth      = [];
		public ?int    $dayOfMonth       = null;
		public string  $dayOfMonthText   = "Last Day of Month";
		
		// === DISPLAY FORMATTING ===
		public ?string $formattedMonthYear = null;
		public ?string $formattedEndDate   = null;
		public ?int    $selectedMonth      = null;
		public ?int    $selectedYear       = null;
		
		// === DAY OF WEEK CONFIGURATION ===
		public int    $dayOfWeek       = self::DEFAULT_DAY_OF_WEEK;
		public string $selectedDayText = 'Saturday';
		
		// === TARGET CONFIGURATION ===
		public ?int      $targetId    = null;
		public           $assignValue = null;
		public ?Category $category    = null;
		
		// === FINANCIAL AMOUNTS ===
		public string $targetAmount         = '';
		public float  $currencyAmount       = 0.0;
		public float  $currencyAmountWeekly = 0.0;
		public float  $monthlySavingsAmount = 0.0;
		
		// === FREQUENCY CONFIGURATION ===
		public string $selectedFrequency = self::DEFAULT_FREQUENCY;
		public array  $frequencyOptions  = [];
		public int    $cadenceFrequency  = 1;
		public int    $cadenceUnit       = self::UNIT_MONTH;
		
		// === TEXT CONFIGURATION ===
		public string $selectedText       = 'Set aside another';
		public string $selectedTextCustom = 'Set aside';
		public string $selectedOptionType = 'set-aside';
		
		// === DEPRECATED INDIVIDUAL PROPERTIES (mantener para compatibilidad) ===
		public bool $isUpdateTargetMode = false; // Duplicado en $state pero m
		
		// Listeners
		protected $listeners = [
			'Table.freshTarget' => 'mount',
		];
		
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
			$num                  = filter_var($this->targetAmount,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
			$this->currencyAmount = is_numeric($num) ? (float)$num : 0.0;
			$this->targetAmount   = $this->currencyAmount > 0 ? format_number($this->currencyAmount) : '';
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
			
			// Retorna un array con ambos valores
			return [
				'day_number'      => $lastDay,        // Solo el número (28, 29, 30, 31)
				'day_with_suffix' => $lastDay.$suffix  // Número con sufijo (28th, 29th, 30th, 31st)
			];
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
		public function toggleGoalTarget():void{
			$this->toggleState('isCollapsed');
		}
		
		public function toggleRepeat():void{
			$this->toggleState('isRepeatEnabled');
		}
		
		public function toggleDateFilter():void{
			$this->toggleState('isDateFilterEnabled');
		}
		
		public function toogleSnooze(){
			$this->toggleState('isSnoozeEnabled');
		}
		
		public function toogleAutoAssign(){
			$this->toggleState('isAutoAssignEnabled');
		}
		
		public function toggleMonthSummary():void{
			$this->toggleState('isSummaryEnabled');
		}
		
		public function toogleAssignedMonth():void{
			$this->toggleState('isAssignedMonthEnabled');
		}
		
		/**
		 * Métodos relacionados con modales
		 */
		public function showAutoAssignModal():void{
			$this->setState('isOpenModalAssign',true);
		}
		
		public function openCreateTarget():void{
			$this->setState('isCreateTarget',true);
			$this->selectedFrequency = self::DEFAULT_FREQUENCY;
			$this->resetForm();
			$this->setFocused();
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
		 * Metodo para editar el target de una categoría
		 */
		public function openEditTargetForm(int $targetId):void{
			$this->resetForm();
			$this->targetId = $targetId;
			
			$this->state = array_merge($this->state,[
				'isCreateTarget'   => true,
				'isSaveSuccessful' => false,
			]);
			
			try{
				$categoryTarget = CategoryTarget::with('category')->findOrFail($targetId);
				
				// Mapas de texto centralizados
				$textMaps = [
					'default' => [
						'set-aside' => __('Set aside another'),
						'refill'    => __('Refill up to'),
						'have'      => __('Have a balance of'),
					],
					'custom'  => [
						'set-aside' => __('Set aside'),
						'refill'    => __('Fill up to'),
						'have'      => __('Have a balance of'),
					]
				];
				
				// Datos básicos del formulario
				$this->targetAmount      = $categoryTarget->amount;
				$this->currencyAmount    = $categoryTarget->amount;
				$this->selectedText      = $textMaps['default'][$categoryTarget->option_type];
				$this->selectedFrequency = $categoryTarget->frequency;
				
				// Configuración específica por frecuencia usando array asociativo
				$frequencyConfig = [
					'weekly'  => function() use ($categoryTarget){
						$this->dayOfWeek = $categoryTarget->day_of_week;
					},
					'monthly' => function() use ($categoryTarget){
						$this->dayOfMonth = $categoryTarget->day_of_month;
					},
					'yearly'  => function() use ($categoryTarget){
						$this->targetFinishDate = $categoryTarget->target_date;
					},
					'custom'  => function() use ($categoryTarget,$textMaps){
						$this->selectedTextCustom = $textMaps['custom'][$categoryTarget->option_type];
						$this->targetFinishDate   = $categoryTarget->target_date;
						
						// Verificar si el target tiene repetición habilitada
						if($categoryTarget->is_repeat_enabled === 1){
							// Habilitar el botón de repetición usando state
							$this->state['isRepeatEnabled'] = true;
							
							$this->cadenceFrequency = $categoryTarget->repeat_frequency ?? 1; // Valor del 1-11
							$this->cadenceUnit      = $categoryTarget->repeat_unit ?? 1; // 1 = Month, 2 = Year
							
							// Si tienes una fecha de próximo target, puedes mostrarla o usarla
							if($categoryTarget->next_target_date){
								$this->nextTargetDate = $categoryTarget->next_target_date;
							}
						}
						
						if($categoryTarget->option_type === 'have'){
							$this->selectedOptionType = 'have';
							
							if($categoryTarget->filter_by_date === 1){
								$this->toggleState('isDateFilterEnabled');
								
								// Extraer mes y año de target_date
								$targetDate = Carbon::parse($categoryTarget->target_date);
								
								$this->selectedMonth = $targetDate->month - 1; // Restamos 1 porque tus options van de 0-11
								$this->selectedYear  = $targetDate->year;
							}
						}
					}
				];
				
				// Ejecutar configuración específica si existe
				if(isset($frequencyConfig[$categoryTarget->frequency])){
					$frequencyConfig[$categoryTarget->frequency]();
				}
				
				$this->setFocused();
				$this->isUpdateTargetMode = true;
				
			} catch(\Exception $e){
				\Log::error("Error al cargar objetivo {$targetId} para edición: {$e->getMessage()}");
				throw new \Exception('No se pudo cargar el objetivo para edición: '.$e->getMessage());
			}
		}
		
		/**
		 * Valida los datos de entrada para los objetivos
		 */
		protected $rules = [
			'currencyAmount' => ['required','numeric','min:0.01'],
		];
		
		// Custom error messages
		protected $messages = [
			'currencyAmount.required' => 'Targets require a positive amount.',
			'currencyAmount.min'      => 'Targets require a positive amount.',
		];
		
		/**
		 * Metodo para guardar el objetivo
		 */
		public function saveTarget(int $categoryId):void{
			$this->validate();
			
			try{
				Category::findOrFail($categoryId);
				
				// Preparar datos básicos
				$data = [
					'category_id' => $categoryId,
					'amount'      => $this->currencyAmount,
					'option_type' => $this->selectedOptionType,
					'frequency'   => $this->selectedFrequency,
					'message'     => $this->selectedOptionType === 'set-aside' ? 'more needed' : 'needed',
				];
				
				// Configurar datos específicos por frecuencia
				$frequencyHandlers = [
					'weekly' => function() use (&$data){
						$data['assign']         = $this->currencyAmount * $this->getDayOccurrencesInMonth($this->dayOfWeek);
						$data['status_details'] = 'this month';
						$data['day_of_week']    = $this->dayOfWeek;
					},
					
					'monthly' => function() use (&$data){
						// Inicializar con valores por defecto del select
						$dayOfMonthText = $this->dayOfMonthText;
						$dayOfMonth     = $this->dayOfMonth;
						// Solo cambiar si es "Last Day of Month"
						if($this->dayOfMonthText === 'Last Day of Month'){
							$lastDayData    = $this->getFormattedLastDay();
							$dayOfMonthText = $lastDayData['day_with_suffix'];
							// Asigna el número del día para guardar en base de datos (ej: 31, 30)
							$dayOfMonth = $lastDayData['day_number'];
						}
						
						$data['assign']         = $this->currencyAmount;
						$data['status_details'] = 'by the '.$dayOfMonthText;
						$data['day_of_month']   = $dayOfMonth;
					},
					
					'yearly' => function() use (&$data){
						$data['assign']         = $this->calculateMonthlySavings();
						$data['status_details'] = 'this month';
						$data['target_date']    = $this->targetFinishDate;
					},
					
					'custom' => function() use (&$data){
						if($this->state['isDateFilterEnabled']){
							$data['assign']         = $this->calculateMonthlyGoal();
							$data['status_details'] = 'this month';
							$data['target_date']    = $this->endDateTarget;
							$data['filter_by_date'] = $this->state['isDateFilterEnabled'];
						}else{
							$isHaveType     = $this->selectedOptionType === 'have';
							$data['assign'] = $isHaveType
								? $this->currencyAmount
								: $this->calculateMonthlySavings();
							
							$data['status_details'] = $isHaveType ? 'eventually' : 'this month';
							if(!$isHaveType){
								$data['target_date'] = $this->targetFinishDate;
							}
							
							// Manejar la repetición del target
							if($this->state['isRepeatEnabled']){
								$data['is_repeat_enabled'] = true;
								$data['repeat_frequency']  = $this->cadenceFrequency; // Valor del 1-11
								$data['repeat_unit']       = $this->cadenceUnit; // 1 = Month, 2 = Year
								
								// Calcular la siguiente fecha basada en la repetición
								$nextDate = Carbon::parse($this->targetFinishDate);
								if($this->cadenceUnit == 1){ // Months
									$nextDate->addMonths($this->cadenceFrequency);
								}else{ // Years
									$nextDate->addYears($this->cadenceFrequency);
								}
								$data['next_target_date'] = $nextDate->format('Y-m-d');
							}
						}
					}
				];
				
				// Ejecutar configuración específica si existe
				if(isset($frequencyHandlers[$this->selectedFrequency])){
					$frequencyHandlers[$this->selectedFrequency]();
				}
				
				// Guardar el objetivo
				CategoryTarget::create($data);
				
				// Actualizar interfaz
				$this->dispatch('Target.freshCategories');
				$this->setState('isCreateTarget',false);
				$this->setState('isSaveSuccessful',true);
				
			} catch(\Exception $e){
				\Log::error("Error al crear objetivo para categoría {$categoryId}: {$e->getMessage()}");
				throw new \Exception('No se pudo crear el objetivo: '.$e->getMessage());
			}
		}
		
		/**
		 * Metodo para actualizar el objetivo
		 */
		public function updateTarget(int $targetId):void{
			$this->validate();
			
			try{
				// Buscar el objetivo existente
				$target = CategoryTarget::findOrFail($targetId);
				
				// Preparar datos básicos (sin category_id)
				$data = [
					'amount'         => $this->currencyAmount,
					'option_type'    => $this->selectedOptionType,
					'frequency'      => $this->selectedFrequency,
					'message'        => $this->selectedOptionType === 'set-aside' ? 'more needed' : 'needed',
					'filter_by_date' => $this->state['isDateFilterEnabled'],
				];
				
				// Configurar datos específicos por frecuencia
				$frequencyHandlers = [
					'weekly' => function() use (&$data){
						$data['assign']         = $this->currencyAmount * $this->getDayOccurrencesInMonth($this->dayOfWeek);
						$data['status_details'] = 'this month';
						$data['day_of_week']    = $this->dayOfWeek;
						$data['filter_by_date'] = false;
						// Limpiar campos que no aplican para weekly
						$data['day_of_month'] = null;
						$data['target_date']  = null;
					},
					
					'monthly' => function() use (&$data){
						// En update, usar valores actuales del formulario o mantener los de BD
						$dayOfMonthText = $this->dayOfMonthText ? : $this->getOriginal('dayOfMonthText');
						$dayOfMonth     = $this->dayOfMonth ? : $this->getOriginal('dayOfMonth');
						
						$data['assign']         = $this->currencyAmount;
						$data['status_details'] = 'by the '.$dayOfMonthText;
						$data['day_of_month']   = $dayOfMonth;
						$data['filter_by_date'] = false;
						// Limpiar campos que no aplican para monthly
						$data['day_of_week'] = null;
						$data['target_date'] = null;
					},
					
					'yearly' => function() use (&$data){
						$data['assign']         = $this->calculateMonthlySavings();
						$data['status_details'] = 'this month';
						$data['target_date']    = $this->targetFinishDate;
						$data['filter_by_date'] = false;
						// Limpiar campos que no aplican para yearly
						$data['day_of_week']  = null;
						$data['day_of_month'] = null;
					},
					
					'custom' => function() use (&$data){
						if($this->state['isDateFilterEnabled']){
							$data['assign']         = $this->calculateMonthlyGoal();
							$data['status_details'] = 'this month';
							$data['target_date']    = $this->endDateTarget;
							$data['filter_by_date'] = true; // Habilitado cuando se usa filtro de fecha
							// Limpiar campos que no aplican para custom con fecha
							$data['day_of_week']  = null;
							$data['day_of_month'] = null;
						}else{
							$isHaveType = $this->selectedOptionType === 'have';
							
							$data['assign'] = $isHaveType
								? $this->currencyAmount
								: $this->calculateMonthlySavings();
							
							$data['status_details'] = $isHaveType ? 'eventually' : 'this month';
							$data['filter_by_date'] = false;
							
							if(!$isHaveType){
								$data['target_date'] = $this->targetFinishDate;
							}else{
								$data['target_date'] = null;
							}
							
							// Limpiar campos que no aplican para custom sin fecha
							$data['day_of_week']  = null;
							$data['day_of_month'] = null;
							
							// Manejar la repetición del target
							if($this->state['isRepeatEnabled']){
								$data['is_repeat_enabled'] = true;
								$data['repeat_frequency']  = $this->cadenceFrequency; // Valor del 1-11
								$data['repeat_unit']       = $this->cadenceUnit; // 1 = Month, 2 = Year
								
								// Calcular la siguiente fecha basada en la repetición
								$nextDate = Carbon::parse($this->targetFinishDate);
								if($this->cadenceUnit == 1){ // Months
									$nextDate->addMonths($this->cadenceFrequency);
								}else{ // Years
									$nextDate->addYears($this->cadenceFrequency);
								}
								$data['next_target_date'] = $nextDate->format('Y-m-d');
							}else{
								$data['is_repeat_enabled'] = false;
								$data['repeat_frequency']  = null;
								$data['repeat_unit']       = null;
								$data['next_target_date']  = null;
							}
						}
					}
				];
				
				// Ejecutar configuración específica si existe
				if(isset($frequencyHandlers[$this->selectedFrequency])){
					$frequencyHandlers[$this->selectedFrequency]();
				}
				
				// Actualizar el objetivo
				$target->update($data);
				
				// Actualizar interfaz
				$this->dispatch('Target.freshCategories');
				$this->setState('isCreateTarget',false);
				$this->setState('isSaveSuccessful',true);
				
			} catch(\Exception $e){
				\Log::error("Error al actualizar objetivo {$targetId}: {$e->getMessage()}");
				throw new \Exception('No se pudo actualizar el objetivo: '.$e->getMessage());
			}
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
				$this->setState('isSaveSuccessful',false);
				
			} catch(\Exception $e){
				\Log::error("Error al eliminar objetivo $targetId: {$e->getMessage()}");
				throw new \Exception('No se pudo eliminar el objetivo: '.$e->getMessage());
			}
			
		}
		
		/**
		 * Inicializa las propiedades de fecha
		 */
		private function initializeDate(Carbon $date):void{
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
			// Mapa de opciones por unidad (solo números)
			$optionsMap = [
				self::UNIT_MONTH => range(1,11),
				self::UNIT_YEAR  => range(1,2),
			];
			
			$this->frequencyOptions = $optionsMap[$this->cadenceUnit] ?? range(1,11);
		}
		
		/**
		 * Obtiene las opciones de unidad con pluralización correcta
		 */
		public function getUnitOptions(){
			return [
				'1' => $this->cadenceFrequency >= 2 ? 'Months' : 'Month',
				'2' => $this->cadenceFrequency >= 2 ? 'Years' : 'Year'
			];
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
				'selectedOptionType',
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
		
		/**
		 * Handles different frequency types (custom, weekly, monthly, yearly) and date formatting
		 */
		public function getCategoryTargetData($targetId){
			$categoryTarget = CategoryTarget::find($targetId);
			
			$amount = $categoryTarget->amount ?? 0;
			
			// Determine frequency text
			if($categoryTarget->frequency === 'custom'){
				$frequency = 'Each Year'; // Default for custom
				if($categoryTarget->repeat_frequency && $categoryTarget->repeat_unit){
					if($categoryTarget->repeat_frequency == 1){
						$frequency = match ($categoryTarget->repeat_unit) {
							'1',1,'monthly' => 'Each Month',
							'2',2,'yearly' => 'Each Year',
							'weekly' => 'Each Week',
							default => 'Each Year',
						};
					}else{
						$unit      = match ($categoryTarget->repeat_unit) {
							'1',1,'monthly' => $categoryTarget->repeat_frequency > 1 ? 'Months' : 'Month',
							'2',2,'yearly' => $categoryTarget->repeat_frequency > 1 ? 'Years' : 'Year',
							'weekly' => $categoryTarget->repeat_frequency > 1 ? 'Weeks' : 'Week',
							default => 'Years',
						};
						$frequency = "Every {$categoryTarget->repeat_frequency} {$unit}";
					}
				}
			}else{
				$frequency = match ($categoryTarget->frequency) {
					'monthly' => 'Each Month',
					'weekly' => 'Each Week',
					'yearly' => 'Each Year',
					default => 'Each Year',
				};
			}
			
			// Determine target date
			$targetDate = 'Eventually';
			if($categoryTarget->frequency === 'custom' && $categoryTarget->target_date){
				$isFilterByDate = $categoryTarget->filter_by_date == 1 || $categoryTarget->filter_by_date === true;
				$targetDate     = "By ".date($isFilterByDate ? 'M Y' : 'M j Y',strtotime($categoryTarget->target_date));
			}else if($categoryTarget->frequency === 'weekly' && $categoryTarget->day_of_week){
				$days       = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
				$targetDate = "By ".$days[(int)$categoryTarget->day_of_week];
			}else if($categoryTarget->day_of_month){
				$day        = $categoryTarget->day_of_month;
				$suffix     = match ($day % 10) {
					1 => ($day >= 11 && $day <= 13) ? 'th' : 'st',
					2 => ($day >= 11 && $day <= 13) ? 'th' : 'nd',
					3 => ($day >= 11 && $day <= 13) ? 'th' : 'rd',
					default => 'th'
				};
				$targetDate = "By the {$day}{$suffix} of the Month";
			}else if($categoryTarget->target_date){
				$targetDate = "By ".date('M j, Y',strtotime($categoryTarget->target_date));
			}
			
			// Generate behavior text
			$formattedAmount = $amount > 0 ? format_currency($amount) : format_currency(1000);
			$behaviorText    = match ($categoryTarget->option_type) {
				'refill' => "Refill Up to ".format_currency($amount)." ".$frequency,
				'set-aside','custom' => "Set Aside Another ".$formattedAmount." ".$frequency,
				'have' => "Have a Balance of ".format_currency($amount)." ".$frequency,
				default => "Set Aside Another ".$formattedAmount." ".$frequency,
			};
			
			// Calculate progress percentage
			$assign     = $categoryTarget->assign ?? 0;
			$assigned   = $categoryTarget->assigned ?? 0;
			$percentage = $amount > 0 ? round(($assigned / $amount) * 100) : 0;
			
			// LIMITAR EL PORCENTAJE A UN MÁXIMO DE 100%
			$percentage = min($percentage,100);
			
			// Calculate rotation angles for donut chart
			$totalAngle = ($percentage / 100) * 360;
			
			// Determine CSS class based on percentage
			if($percentage == 0){
				$cssClass = 'passive';
			}else if($percentage == 100){
				$cssClass = 'positive';
			}else{
				$cssClass = 'warning';
			}
			
			// Determine visibility of label and icon
			$showLabel = $percentage < 100;
			$showIcon  = $percentage == 100;
			
			if($percentage == 0){
				// Caso especial: 0% - mostrar mínimo visual
				$rightRotation = 7; // Rotación mínima visible
				$leftRotation  = 0;
				$clipStyle     = "clip: rect(0px, 1em, 1em, 0.5em);";
			}else if($percentage <= 50){
				// Solo se llena la mitad derecha
				$rightRotation = $totalAngle;
				$leftRotation  = 0;
				$clipStyle     = "clip: rect(0px, 1em, 1em, 0.5em);";
			}else{
				// Se llena la mitad derecha completa y parte de la izquierda
				$rightRotation = 180; // Mitad derecha completa
				$leftRotation  = $totalAngle; // El ángulo TOTAL
				$clipStyle     = "clip: rect(auto, auto, auto, auto);";
			}
			
			// Calculate amount to go
			$toGo     = max(0,$assign - $assigned);  // Usa $assign para toGo
			$assigned = max(0,$assign - $assigned);  // Usa $assign para toGo
			$soFar    = max(0,$categoryTarget->assigned ?? 0);  // Usa $assign para toGo
			
			// Determine target message based on frequency
			$targetMessage = in_array($categoryTarget->frequency,['monthly','weekly'])
				? 'to meet your target'
				: 'this month to stay on track';
			
			return [
				'target_behavior' => $behaviorText,
				'target_by_date'  => $targetDate,
				'to_assing'       => $assigned,
				'to_amount'       => $amount,
				'so_far'          => $soFar,
				'to_go'           => $toGo,
				'target_message'  => $targetMessage,
				'percentage'      => $percentage,
				'left_rotation'   => $leftRotation,
				'right_rotation'  => $rightRotation,
				'clip_style'      => $clipStyle,
				'css_class'       => $cssClass,
				'show_label'      => $showLabel,
				'show_icon'       => $showIcon,
			];
		}
		
		/**
		 * Get CSS class based on budget assignment status.
		 */
		public function getStatusClassProperty(){
			$assigned = $this->category->categoryTarget?->assigned ?? 0;
			$assign   = $this->category->categoryTarget?->assign ?? 0;
			
			if($assigned == 0) return 'zero';
			if($assigned >= $assign) return 'positive';
			return 'cautious goal';
		}
		
		/**
		 * Propiedad para mostrar uel modal para editar categoriasx
		 */
		public function openCategoryEditModal($categoryId):void{
			dd('En construcción...'." Id: ".$categoryId);
		}
		
		
		public function render(){
			return view('livewire.admin.target-creation',[
				'monthName'     => Carbon::create($this->currentYear,$this->currentMonth,1)->format('M Y'),
				'formattedDate' => $this->formattedDate,
			]);
		}
	}