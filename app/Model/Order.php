<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    public $timestamps=false;
    public function order_detail(){
    	return $this->hasMany(Order_Detail::class);
    }
}
