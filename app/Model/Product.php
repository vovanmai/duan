<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    public $timestamps=false;

    public function category(){ 
    	return $this->belongsTo(Category::class,'cat_id');
    }
    public function brand(){ 
    	return $this->belongsTo(Brand::class,'brand_id');
    }
    
}
