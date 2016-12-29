<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMembers extends Model
{
    protected $table = 'report_members';

    protected $fillable = [
      'count'
    ];
}
