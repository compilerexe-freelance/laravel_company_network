<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomProduct extends Model
{
    protected $table = 'custom_product';

    protected $fillable = [
      'product_id',
      'product_name',
      'product_detail',
      'product_picture',
      'general_price',
      'special_price'
    ];
}
