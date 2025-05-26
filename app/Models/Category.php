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
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function group(){
			return $this->belongsTo(CategoryGroup::class,'group_id');
		}
		
		/**
		 * Relación uno a uno con CategoryBudget
		 */
		public function categoryBudget(){
			return $this->hasOne(CategoryBudget::class);
		}
		
	}
	