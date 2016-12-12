<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomProduct extends Model
{
    protected $table = 'custom_product';

    protected $fillable = [
      'product_name',
      'product_detail',
      'product_picture',
      'product_price'
    ];
}
