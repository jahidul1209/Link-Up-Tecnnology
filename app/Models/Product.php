<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
          protected $fillable = [
        'product_code','Product_name','category_id','cutsomer_name','place','buy_date','buying_price','selling_price','photo',

    ];

      public function product()
        {
         return $this->belongsTo('App\Models\Add_product','Product_name','id');
        }
     public function categories()
        {
        return $this->belongsTo('App\Models\Category','category_id','id');
        }

}
