<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Str;
	
	class CategoryGroup extends Model
	{
		use HasFactory;
		
		protected $fillable = ['budget_id','name','hidden','ordering'];
		
		// Accessors para los totales
		public function getTotalAssignedAttribute(){
			return $this->categories->sum(function($category){
				return $category->categoryTarget?->assigned ?? 0;
			});
		}
		
		public function getTotalActivityAttribute(){
			return $this->categories->sum(function($category){
				return $category->categoryTarget?->activity ?? 0;
			});
		}
		
		public function getTotalAvailableAttribute(){
			return $this->categories->sum(function($category){
				return $category->categoryTarget?->assigned ?? 0;
			});
		}
		
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function categories(){
			return $this->hasMany(Category::class,'group_id');
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function budget(){
			return $this->belongsTo(Budget::class);
		}
		
		public function setNameAttribute($value){
			$this->attributes['name'] = Str::ucfirst(strtolower($value));
		}
		
	}
	


