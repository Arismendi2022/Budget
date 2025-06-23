<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class CategoryTarget extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'category_id',
			'amount',
			'monthly_target',
			'message',
			'status_details',
			'day_of_week',
			'day_of_month',
			'target_date',
			'is_repeat_enabled',
			'repeat_frequency',
			'repeat_unit',
			'next_target_date',
			'option_type',
			'period_type',
			'filter_by_date',
			'is_snoozed',
			'assigned',
			'activity',
		];
		
		//Metodo para la suma total del monthy_target
		public static function getTotalMonthlyTarget(){
			return static::sum('monthly_target') ?? 0;
		}
		
		//Metodo para realizar resta
		public function getRemainingAssignAttribute(){
			return $this->monthly_target - $this->assigned;
		}
		
		//Metodo para mostrar available
		public function getAvailableAttribute(){
			return $this->assigned;
		}
		
		//Metodo para mostrar balance
		/*public function getBalanceAttribute(){
			return ($this->monthly_target) - ($this->assigned);
		}*/
		
		// Metodo para calcular la próxima fecha de repetición
		public function calculateNextRepeatDate(){
			if(!$this->is_repeat_enabled || !$this->target_date){
				return null;
			}
			
			$date = Carbon::parse($this->target_date);
			
			if($this->repeat_unit == 1){ // Months
				return $date->addMonths($this->repeat_frequency);
			}else{ // Years
				return $date->addYears($this->repeat_frequency);
			}
		}
		
		// Accessor para obtener la suma total de assigned
		public function getTotalAssignedAttribute(){
			return static::sum('assigned');
		}
		
		// Accessor para obtener la suma total de monthly_target
		public function getProgressDataAttribute(){
			// Determinar qué campo usar para el cálculo según period_type
			$periodType   = $this->period_type;
			$targetAmount = in_array($periodType,['yearly','custom'])
				? ($this->amount ?? 0)
				: ($this->monthly_target ?? 0);
			
			if(!$targetAmount || $targetAmount == 0){
				return null;
			}
			
			$assigned = $this->assigned ?? 0;
			$progress = min(($assigned / $targetAmount) * 100,100);
			
			// Determinar clase
			$class = '';
			if($assigned == 0){
				$class = 'zero';
			}else if($progress >= 100){
				$class = 'complete';
			}
			
			// Determinar path - DESDE LAS 12 EN PUNTO
			if($assigned == 0){
				$path = "M 1 0 A 1 1 0 0 1 0.9048270524660195 0.4257792915650727 L 0 0";
			}else{
				// El path muestra el progreso COMPLETADO
				$progressAngle = ($progress / 100) * 360;
				// Convertir a radianes
				$radians = deg2rad($progressAngle);
				// Calcular coordenadas finales
				$x = round(cos($radians),8);
				$y = round(sin($radians),8);
				// Determinar si necesitamos el arco largo
				$largeArc = $progressAngle > 180 ? 1 : 0;
				$path     = "M 1 0 A 1 1 0 {$largeArc} 1 {$x} {$y} L 0 0";
			}
			
			return [
				'path'  => $path,
				'class' => $class
			];
		}
		
		/**
		 * Relación uno a uno inversa con Category
		 */
		public function category(){
			return $this->belongsTo(Category::class);
		}
	}
