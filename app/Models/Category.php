<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Category extends Model
  {
    use HasFactory;

    protected $fillable = ['group_id','name','ordering','assigned','activity','available'];

    public function categoryGroup(){
      return $this->belongsTo(CategoryGroup::class);
    }

  }

