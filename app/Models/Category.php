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
