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
			'amount',
			'assign',
			'message',
			'status_details',
			'option_type',
			'frequency',
			'assigned',
			'activity',
			'available',
			'ordering'
		];
		
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function group(){
			return $this->belongsTo(CategoryGroup::class,'group_id');
		}
		
	}
	