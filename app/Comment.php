<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Comment extends Model
{
    //
    protected $table = "Comment";

    // Một cmt thì sẻ thuộc duy nhất một sản phẩm
    public function product(){
        return $this->belongsTo('App\Product','id_product','id');
      }

    // Một Comment chỉ thuộc một user,và một user thì có một hoặc nhiều comment
    public function user() 
    {
    	return $this->belongsTo('App\User','idUser','id');   
    }															
}
