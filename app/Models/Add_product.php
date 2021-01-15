<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_product extends Model
{
    use HasFactory;
     protected $table = 'add_products';
      protected $fillable = [
        'product_name','category_id',

    ];

      public function category()
        {
        	return $this->belongsTo('App\Models\Category');
        }
             public function product()
        {
        	return $this->belongsTo('App\Models\Product','category_id');
        }
}
