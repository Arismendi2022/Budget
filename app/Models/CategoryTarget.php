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
		
		//Metopgo para realizar resta
		public function getRemainingAssignAttribute(){
			return $this->monthly_target - $this->assigned;
		}
		
		//Metodo para mostrar balance
		/*public function getBalanceAttribute(){
			return ($this->monthly_target) - ($this->assigned);
		}*/
		
		//Metodo para mostrar available
		public function getAvailableAttribute(){
			return $this->assigned;
		}
		
		
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
		
		/**
		 * Relación uno a uno inversa con Category
		 */
		public function category(){
			return $this->belongsTo(Category::class);
		}
	}
