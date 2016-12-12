<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationUploads extends Model
{
    protected $table = 'quotation_uploads';

    protected $fillable = [
      'file'
    ];
}
