<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportMembers;
use App\ReportWebsiteVisitors;

class ReportController extends Controller
{
    public function getWebsiteVisitors() {
        session(['menu_active', 'report']);
        $website_visitors = ReportWebsiteVisitors::all();
        return view('admin.reports.website_visitors')
        ->with('count', count($website_visitors));
    }

    public function getMembers() {
        return view('admin.reports.members');
    }
}
