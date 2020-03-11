<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
   //  protected $fillable =
   //   [
   //      'imageName',
   //   ];

   protected $table = 'Images';

   public $primaryKey = 'id';
   public $column = 'imageName';
   public $column = 'image';

   public function programme()
   {
       return $this->belongsTo('App\Programme');
   }

   public function products()       //this is to relate products //Eloquent relationships are defined as functions on your Eloquent model classes
   {
        return $this->hasMany('App\Products');
   }
}
