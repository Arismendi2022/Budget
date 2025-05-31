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
			'option_type',
			'frequency',
			'filter_by_date',
			'assigned',
			'activity',
			'available',
		];
		
		/**
		 * Relación uno a uno inversa con Category
		 */
		public function category(){
			return $this->belongsTo(Category::class);
		}
	}
