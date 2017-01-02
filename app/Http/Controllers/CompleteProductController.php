<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SubCategory;
use App\Product;
use App\CustomProduct;
use Input;
use File;

class CompleteProductController extends Controller
{

    public function getManageCompleteProduct() {
        session(['menu_active' => 'Product']);
        $products = Product::all();
        $custom_products = CustomProduct::all();
        $sub_categorys = SubCategory::all();
        return view('admin.manage_complete_product.product')
        ->with('products', $products)
        ->with('sub_categorys', $sub_categorys)
        ->with('custom_products', $custom_products);
    }

    public function getCompleteProductInsert() {
        session(['menu_active' => 'Product']);
        $sub_categorys = SubCategory::all();
        return view('admin.manage_complete_product.insert_product')
        ->with('sub_categorys', $sub_categorys);
    }

    public function postCompleteProductInsert(Request $request) {
        $product = new Product;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_name = $request->product_name;
        $product->product_detail = $request->product_detail;
        $filename = "";
        if ($request->file('product_picture') != '') {
            $destinationPath = 'uploads/products';
            if (!file_exists($destinationPath)) {
              File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('product_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('product_picture')->move($destinationPath, $filename);
            $product->product_picture = $filename;
        }
        $product->general_price = $request->general_price;
        $product->product_price = $request->product_price;
        $product->save();
        return redirect()->route('manage_complete_product');
    }

    public function getCompleteProductUpdate(Request $request) {
        $products = Product::all();
        $sub_categorys = SubCategory::all();
        $get_complete_product = Product::where('id', $request->id)->first();
        return view('admin.manage_complete_product.update_complete_product')
        ->with('products', $products)
        ->with('sub_categorys', $sub_categorys)
        ->with('get_complete_product', $get_complete_product);
    }

    public function postCompleteProductUpdate(Request $request) {
        $product = Product::find($request->id);
        if ($request->sub_category_id != null) {
            $product->sub_category_id = $request->sub_category_id;
        }
        $product->product_name = $request->product_name;
        $product->product_detail = $request->product_detail;
        $filename = "";
        if ($request->file('product_picture') != '') {
            File::delete('uploads/products/'.$product->product_picture);
            $destinationPath = 'uploads/products';
            if (!file_exists($destinationPath)) {
              File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('product_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('product_picture')->move($destinationPath, $filename);
            $product->product_picture = $filename;
        }
        $product->general_price = $request->general_price;
        $product->product_price = $request->product_price;
        $product->save();
        return redirect()->route('manage_complete_product');
    }

    public function getCompleteProductDelete(Request $request) {
        $product = Product::find($request->id);
        File::delete('uploads/products/'. $product->product_picture);
        $product->delete();
        return redirect()->back();
    }

    public function getCustomProductInsert() {
      session(['menu_active' => 'Product']);
      return view('admin.manage_complete_product.insert_custom_product');
    }

    public function postCustomProductInsert(Request $request) {
        $custom_product = new CustomProduct;
        $get_product_id = Product::where('product_name', $request->link_product)->first();
        $custom_product->product_id = $get_product_id->id;
        $custom_product->product_name = $request->product_name;
        $custom_product->product_detail = $request->product_detail;
        $filename = "";
        if ($request->file('product_picture') != '') {
            $destinationPath = 'uploads/products';
            if (!file_exists($destinationPath)) {
              File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('product_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('product_picture')->move($destinationPath, $filename);
            $custom_product->product_picture = $filename;
        }
        $custom_product->general_price = $request->general_price;
        $custom_product->product_price = $request->product_price;
        $custom_product->save();
        return redirect()->route('manage_complete_product');
    }

    public function getCustomProductUpdate(Request $request) {
        $custom_products = CustomProduct::all();
        $get_custom_product = CustomProduct::find($request->id);
        return view('admin.manage_complete_product.update_custom_product')
        ->with('custom_products', $custom_products)
        ->with('get_custom_product', $get_custom_product);
    }

    public function postCustomProductUpdate(Request $request) {
        $custom_product = CustomProduct::find($request->id);
        if ($request->link_product != null) {
          $product = Product::where('product_name', $request->link_product)->first();
          $custom_product->product_id = $product->id;
        }
        $custom_product->product_name = $request->product_name;
        $custom_product->product_detail = $request->product_detail;
        $filename = "";
        if ($request->file('product_picture') != '') {
            File::delete('uploads/products/'.$custom_product->product_picture);
            $destinationPath = 'uploads/products';
            if (!file_exists($destinationPath)) {
              File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('product_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('product_picture')->move($destinationPath, $filename);
            $custom_product->product_picture = $filename;
        }
        $custom_product->general_price = $request->general_price;
        $custom_product->product_price = $request->product_price;
        $custom_product->save();
        return redirect()->route('manage_complete_product');
    }

    public function getCustomProductDelete(Request $request) {
        $custom_product = CustomProduct::find($request->id);
        File::delete('uploads/products/'. $custom_product->product_picture);
        $custom_product->delete();
        return redirect()->back();
    }
}
