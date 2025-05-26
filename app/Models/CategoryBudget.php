<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class CategoryBudget extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'category_id',
			'amount',
			'assign',
			'message',
			'status_details',
			'option_type',
			'frequency',
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
