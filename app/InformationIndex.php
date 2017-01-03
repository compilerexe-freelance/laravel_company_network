<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationIndex extends Model
{
    protected $table = 'information_index';

    protected $fillable = [
      'information_detail'
    ];
}
