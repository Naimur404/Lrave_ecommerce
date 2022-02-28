<?php

namespace App\Models;

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function parent(){
      return $this->belongsTo(Category::class, 'praent_id');
  }
  public function products(){
    return $this->hasMany(Product::class);
}

}
