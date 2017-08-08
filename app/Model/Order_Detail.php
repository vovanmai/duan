<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table='order_details';
    protected $primaryKey='id';
    public $timestamps=false;
    public function product(){
    	return $this->belongsTo(Product::class,'product_id');
    }
    public function order(){
    	return $this->belongsTo(Order::class,'order_id');
    }

}
