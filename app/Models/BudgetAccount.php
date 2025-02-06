<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Illuminate\Support\Str;
	use Ramsey\Uuid\Uuid;
	
	class BudgetAccount extends Model
	{
		use HasFactory;
		
		protected $fillable
			= [
				'uuid',
				'budget_id',
				'nickname',
				'notes',
				'account_group',
				'data_type',
				'account_type',
				'balance',
				'interest',
				'payment',
				'payoff_date',
				'ordering'
			];
		
		protected $casts = [
			'payoff_date' => 'date',
		];
		
		/**
		 * Obtiene el presupuesto al que pertenece esta cuenta
		 */
		public function budget():BelongsTo{
			return $this->belongsTo(Budget::class);
		}
		
		// Boot method para manejar eventos del modelo
		protected static function boot(){
			parent::boot();
			
			// Evento que se ejecuta antes de crear un nuevo registro
			static::creating(function($model){
				// Generar y asignar un UUID
				$model->uuid = Uuid::uuid4()->toString();
			});
		}
		
		public function setNickNameAttribute($value){
			$this->attributes['nickname'] = Str::ucfirst(strtolower($value));
		}
		
		
	}
