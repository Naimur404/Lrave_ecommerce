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

//praent or not Category
//check is the category is child category of that praent category
public static function praentorNot($praent_id,$child_id){
$categories = Category::where('id',$child_id)->where('praent_id', $praent_id)->get();
if(!is_null($categories)){
    return true;
}else{
    return false;
}
}
}
