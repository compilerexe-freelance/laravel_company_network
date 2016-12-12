<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
      'id_sub_category',
      'product_name',
      'product_detail',
      'product_picture',
      'general_price',
      'product_price'
    ];
}
