<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationProduct extends Model
{
    protected $table = 'quotation_product';

    protected $fillable = [
      'product_id',
      'array_custom_product'
    ];
}
