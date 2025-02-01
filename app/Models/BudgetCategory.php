<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class BudgetCategory extends Model
  {
    use HasFactory;

    protected $fillable = ['group_id','name'];

    public function group(){
      return $this->belongsTo(BudgetGroup::class);
    }

  }




