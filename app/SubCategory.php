<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_category';

    protected $fillable = [
      'id_category',
      'sub_category_name',
      'link'
    ];
}
