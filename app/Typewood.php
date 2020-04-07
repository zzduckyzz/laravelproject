<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typewood extends Model
{
    public $timestamps = false;
    protected $table = "type_of_wood";

    public function product()
    {
      return $this->hasMany('App\Product', 'category_id', 'id');
    }
}
