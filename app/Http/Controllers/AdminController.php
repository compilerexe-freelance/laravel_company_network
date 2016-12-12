<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
    public function getMain() {
        session(['menu_active' => 'Main']);
        return view('admin.main');
    }
}
