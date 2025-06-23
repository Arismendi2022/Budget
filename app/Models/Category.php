<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class Category extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'group_id',
			'name',
			'hidden',
			'ordering'
		];
		
		/**
		 * Evalúa el progreso hacia un objetivo y retorna la clase CSS correspondiente:
		 */
		public function getStatusClassAttribute(){
			$assigned = $this->categoryTarget?->assigned ?? 0;
			$assign   = $this->categoryTarget?->monthly_target ?? 0;
			
			if($assign == 0) return 'zero';
			if($assigned >= $assign) return 'positive';
			if($assign > 0 && $assigned < $assign) return 'cautious goal';
			// Valor por defecto
			return 'zero';
		}
		
		/**
		 * Obtiene el estado de visualización de la categoría según su progreso de financiamiento.
		 */
		public function getStatusDisplayAttribute(){
			// Si no hay categoryTarget, retornar datos vacíos
			if(!$this->categoryTarget){
				return [
					'message'          => '',
					'status_details'   => '',
					'remaining_assign' => ''
				];
			}
			
			$target = $this->categoryTarget;
			
			// Si está completamente financiado
			if(($target->assigned ?? 0) >= ($target->monthly_target ?? 0) && ($target->monthly_target ?? 0) > 0){
				return [
					'message'          => '',
					'status_details'   => 'Funded',
					'remaining_assign' => ''
				];
			}
			
			// Datos normales
			return [
				'message'          => $target->message ?? '',
				'status_details'   => $target->status_details ?? '',
				'remaining_assign' => ($target->remaining_assign ?? 0) != 0.00
					? format_currency($target->remaining_assign)
					: ''
			];
		}
		
		/**
		 * Calcula el porcentaje de progreso y clase CSS de la categoría.
		 *
		 * @return array ['percentage' => float, 'css_class' => string]
		 */
		public function getProgressDataAttribute(){
			// Si no hay categoryTarget, devolver valores por defecto
			if(!$this->relationLoaded('categoryTarget') || !$this->categoryTarget){
				return ['percentage' => 0,'css_class' => 'is-partially-funded'];
			}
			
			$target   = $this->categoryTarget;
			$assigned = floatval($target->assigned ?? 0);
			
			// Determinar el valor objetivo basado en period_type
			if($target->period_type === 'weekly'){
				$targetAmount = floatval($target->monthly_target ?? 0);
			}else{
				$targetAmount = floatval($target->amount ?? 0);
			}
			
			$percentage = $targetAmount > 0 ? min(100,($assigned / $targetAmount) * 100) : 0;
			$cssClass   = $percentage < 100 ? 'is-partially-funded' : 'is-fully-funded';
			
			return ['percentage' => $percentage,'css_class' => $cssClass];
		}
		
		/**
		 * genera progreso de grafico circular
		 */
		public function getCircleProgressDataAttribute() {
			if (!$this->categoryTarget) {
				return null;
			}
			
			// Determinar qué campo usar para el cálculo según period_type
			$targetAmount = in_array($this->categoryTarget->period_type, ['yearly', 'custom'])
				? $this->categoryTarget->amount
				: $this->categoryTarget->monthly_target;
			
			$progress = min(($this->categoryTarget->assigned / $targetAmount) * 100, 100);
			
			// Determinar clase
			$class = '';
			$isComplete = false; // Nueva variable para identificar si está completo
			
			if ($this->categoryTarget->assigned == 0) {
				$class = 'zero';
			} elseif ($progress >= 100) {
				$class = 'complete';
				$isComplete = true; // Marcamos como completo
			}
			
			// Determinar path - DESDE LAS 12 EN PUNTO
			if ($this->categoryTarget->assigned == 0) {
				$path = "M 1 0 A 1 1 0 0 1 0.9048270524660195 0.4257792915650727 L 0 0";
			} else {
				// El path muestra el progreso COMPLETADO
				$progressAngle = ($progress / 100) * 360;
				// Convertir a radianes
				$radians = deg2rad($progressAngle);
				// Calcular coordenadas finales
				$x = round(cos($radians), 8);
				$y = round(sin($radians), 8);
				
				// Determinar si necesitamos el arco largo
				$largeArc = $progressAngle > 180 ? 1 : 0;
				$path = "M 1 0 A 1 1 0 {$largeArc} 1 {$x} {$y} L 0 0";
			}
			
			return [
				'path' => $path,
				'class' => $class,
				'is_complete' => $isComplete,
				'progress' => $progress
			];
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function group(){
			return $this->belongsTo(CategoryGroup::class,'group_id');
		}
		
		/**
		 * Relación uno a uno con CategoryBudget
		 */
		public function categoryTarget(){
			return $this->hasOne(CategoryTarget::class);
		}
		
		// Relacion con BudgetAccount
		public function budgetAccounts(){
			return $this->hasOne(BudgetAccount::class);
		}
		
	}
