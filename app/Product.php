<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $table = "products";

      public function product_type(){
      	 return $this->belongsto('App\ProductType','id_type','id');  
      }

      public function bill_detail(){
      	return $this->hasMany('App\BillDetail','id_product','id');
      }

      public function Comment()
    {
    	return $this->hasMany('App\Comment','id_product','id');
    }
}
