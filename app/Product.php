<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";

    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function typewood()
    {
    	return $this->belongsTo('App\Typewood', 'type_of_wood_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'id_product', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Image', 'id_product', 'id');
    }
    public function orderdetail()
    {
        return $this->hasMany('App\OrderDetail', 'product_id', 'id');
    }

}
