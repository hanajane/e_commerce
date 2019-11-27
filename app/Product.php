<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable =
     [
        'name', 'description', 'image', 'price', 'type', 'swimwearType_id', 'hashtags'
     ];

     public function getPriceAttribute($value)
     {
        //  $newForm = "$" . $value;
         return $value;
     }
}
