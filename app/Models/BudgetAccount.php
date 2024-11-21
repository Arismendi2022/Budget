<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class BudgetAccount extends Model
  {
    use HasFactory;

    protected $fillable
      = [
        'budget_id',
        'nickname',
        'notes',
        'account_group',
        'account_type',
        'balance',
        'interest',
        'payment',
        'ordering'
      ];

    /**
     * Obtiene el presupuesto al que pertenece esta cuenta
     */
    public function budget():BelongsTo{
      return $this->belongsTo(Budget::class);
    }

  }
