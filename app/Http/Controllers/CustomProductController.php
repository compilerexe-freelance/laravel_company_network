<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomProductController extends Controller
{
    public function getCustomProductInsert() {
      return view('admin.manage_custom_product.insert_custom_product');
    }
}
