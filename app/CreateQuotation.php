<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateQuotation extends Model
{
    protected $table = 'create_quotation';

    protected $fillable = [
      'company_name',
      'address',
      'full_name',
      'email',
      'tel'
    ];
}
