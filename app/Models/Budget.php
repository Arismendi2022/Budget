<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Budget extends Model
{
    use HasFactory;
  protected $fillable = [
    'user_id',
    'name',
    'currency',
    'currency_placement',
    'number_format',
    'date_format',
    'is_active',
  ];

  /**
   * Relación con el modelo User.
   */

  public function user():BelongsTo {
    return $this->belongsTo(User::class);
  }
}
