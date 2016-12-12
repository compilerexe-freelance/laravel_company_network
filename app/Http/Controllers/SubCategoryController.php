<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function getSubCategory() {
        session(['menu_active' => 'Category']);
        return view('admin.manage_category.sub_category');
    }
}
