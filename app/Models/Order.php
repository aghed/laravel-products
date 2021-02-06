<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['order_date','order_number','customer_id','total_amount'];
    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer');
    }

    public function orderItems()
    {
    	return $this->hasMany('App\Models\OrderItem');
   	}

   	public function getOrderDateAttribute($value)
   	{
   		$dt=new \DateTime($value);
   		return $dt->format('Y-m-d');
   	}

}
