<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\SubCategory;
use App\Product;
use App\CustomProduct;
use PDF;

class UserController extends Controller
{
    public function getHome() {
        $banner = Banner::find(1);
        $products = Product::latest()->get();
        return view('user.home')
        ->with('banner', $banner)
        ->with('products', $products);
    }

    public function getFormLogin() {
        return view('user.login');
    }

    public function getAbout() {
        return view('user.about');
    }

    public function getNews() {
        return view('user.news');
    }

    public function getReadNews() {
        return view('user.read_news');
    }

    public function getContact() {
        return view('user.contact');
    }

    public function getProductDetail() {
        return view('user.product_detail');
    }

    public function getProductType() {
        return view('user.product_type');
    }

    public function getProductSelect(Request $request) {
        if ($request->product_type == 'complete') {
            $categorys = Category::where('filter_category', 1)->get();
            $sub_categorys = SubCategory::all();
            $products = Product::all();
            return view('user.product_complete')
            ->with('categorys', $categorys)
            ->with('sub_categorys', $sub_categorys)
            ->with('products', $products);
        } else {
            $categorys = Category::where('filter_category', 0)->get();
            $sub_categorys = SubCategory::all();
            $products = Product::all();
            return view('user.product_custom')
            ->with('categorys', $categorys)
            ->with('sub_categorys', $sub_categorys)
            ->with('products', $products);
        }
    }

    public function getProductComplete() {
        $categorys = Category::where('filter_category', 1)->get();
        $sub_categorys = SubCategory::all();
        $products = Product::all();
        return view('user.product_complete')
        ->with('categorys', $categorys)
        ->with('sub_categorys', $sub_categorys)
        ->with('products', $products);
    }

    public function anyFormQuotation(Request $request) {
        $product = Product::find($request->id);
        $custom_products = CustomProduct::where('id_product', $product->id)->get();
        return view('user.quotation_form')
        ->with('product', $product)
        ->with('custom_products', $custom_products);
    }

    public function postGuestQuotation(Request $request) {
        $sum = $request->input_sum;
        $vat = $request->input_vat;
        $inc_vat = $request->input_inc_vat;
        $extension = $request->extension;
        return view('user.create_quotation')
        ->with('sum', $sum)
        ->with('vat', $vat)
        ->with('inc_vat', $inc_vat)
        ->with('extension', $extension);
    }

    public function postPrintQuotation(Request $request) {
        // $html = "<img src='http://localhost:3000/images/Moon.jpg'>";
        // $pdf = PDF::loadHTML($html, 0);

        $pdf = PDF::loadView('pdf.document');
        // $pdf = PDF::loadView('pdf.document');
        return $pdf->stream('document.pdf');
    }

    public function getMemberQuotation() {
        return view('user.member_create_quotation');
    }

    public function getFormUploadQuotation() {
        return view('user.quotation_form_upload');
    }

    public function getSubCategoryProduct(Request $request) {
        $products = Product::where('id_sub_category', $request->id)->get();
        return view('user.sub_category')
        ->with('products', $products);
    }
}
