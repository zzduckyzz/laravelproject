<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public $timestamps = false;
     protected $table = "order";

     public function user()
     {
     	return $this->belongsTo('App\User', 'id_user', 'id');
     }
     public function orderdetail()
     {
     	return $this->hasMany('App\OrderDetail', 'order_id', 'id');
     }
}
