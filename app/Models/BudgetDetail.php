<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class BudgetDetail extends Model
  {
    use HasFactory;

    protected $fillable = [
      'user_id',
      'name',
      'currency',
      'currency_placement',
      'number_format',
      'date_format',
    ];

    /**
     * Relación con el modelo User.
     */

    public function user():BelongsTo{
      return $this->belongsTo(User::class);
    }

  }
