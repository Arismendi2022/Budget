<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Str;
	
	class Category extends Model
	{
		use HasFactory;
		
		protected $fillable = ['group_id','category','amount','message','day_month','target_date','assigned','activity','available','ordering'];
		
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function group(){
			return $this->belongsTo(CategoryGroup::class,'group_id');
		}
		
		public function setCategoryAttribute($value){
			$this->attributes['category'] = Str::ucfirst(strtolower($value));
		}
	}
	