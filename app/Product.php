<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable =
     [
        'name', 'description', 'productImage_id', 'price', 'productType_id', 'swimwearType_id', 'productSize_id', 'hashtags'
     ];

     public function getPriceAttribute($value)
     {
        //  $newForm = "$" . $value;
         return $value;
     }
}
