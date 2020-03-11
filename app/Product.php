<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   //Table
   protected $table = 'products';

   //Primary Key
   public $primaryKey = 'id';

   protected $fillable =
   [
      'name', 'description', 'productImage_id', 'price', 'productType_id', 'swimwearType_id', 'productSize_id', 'hashtags'
   ];

   public function image()       //this is to relate the image to the selected product
   {
       return $this->belongsTo('App\Images','productImage_id'); // 'App\table', 'foreignKey to Products' \\ //this is to relate products //Eloquent relationships are defined as functions on your Eloquent model classes
   }

   //price value dollar sign
   public function getPriceAttribute($value)
   {
      //  $newForm = "$" . $value;
      return $value;
   }
}
