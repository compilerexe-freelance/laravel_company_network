<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportWebsiteVisitors extends Model
{
    protected $table = 'report_website_visitors';

    protected $fillable = [
      'ip_address'
    ];
}
