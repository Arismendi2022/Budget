<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class BudgetGroup extends Model
  {
    use HasFactory;

    protected $fillable = ['name'];

    public function categories(){
      return $this->hasMany(BudgetCategory::class,'group_id');
    }

  }


