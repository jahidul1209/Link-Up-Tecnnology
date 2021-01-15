<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categorys';
      protected $fillable = [
        'cat_name',

    ];

      public function products()
        {
        	return $this->hasMany('App\Models\Add_product','category_id');
        }
}
