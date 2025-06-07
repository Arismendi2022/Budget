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
			'assign',
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
			'frequency',
			'filter_by_date',
			'is_snoozed',
			'assigned',
			'activity',
			'available',
		];
		
		// Accessor para obtener el texto legible de la unidad de repetición
		/*public function getRepeatUnitTextAttribute(){
			return match ($this->repeat_unit) {
				1 => 'Month'.($this->repeat_frequency > 1 ? 's' : ''),
				2 => 'Year'.($this->repeat_frequency > 1 ? 's' : ''),
				default => null,
			};
		}*/
		
		// Accessor para obtener la descripción completa de la repetición
		/*public function getRepeatDescriptionAttribute(){
			if(!$this->is_repeat_enabled){
				return null;
			}
			
			$frequency = $this->repeat_frequency;
			$unit      = $this->repeat_unit == 1 ? 'month' : 'year';
			$plural    = $frequency > 1 ? 's' : '';
			
			return "Every {$frequency} {$unit}{$plural}";
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
		
		// Scope para obtener targets con repetición habilitada
		/*public function scopeWithRepeatEnabled($query){
			return $query->where('is_repeat_enabled',true);
		}*/
		
		// Scope para obtener targets que necesitan ser recreados
		/*public function scopeNeedingRepeat($query){
			return $query->where('is_repeat_enabled',true)
				->where('next_target_date','<=',now());
		}*/
		
		/**
		 * Relación uno a uno inversa con Category
		 */
		public function category(){
			return $this->belongsTo(Category::class);
		}
	}
