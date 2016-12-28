<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
      'sub_category_id',
      'product_name',
      'product_detail',
      'product_picture',
      'general_price',
      'product_price'
    ];
}
