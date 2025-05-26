<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Str;
	
	class CategoryGroup extends Model
	{
		use HasFactory;
		
		protected $fillable = ['budget_id','name','hidden','ordering'];
		
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
	


