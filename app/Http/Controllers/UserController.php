<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\SubCategory;
use App\Product;
use App\CustomProduct;
use App\Promote;
use App\HowToBuy;
use App\Contact;
use App\QuotationProduct;
use App\CreateQuotation;
use App\ReportWebsiteVisitors;
use PDF;

class UserController extends Controller
{
    private function website_visitors($request) {
        $visitor = ReportWebsiteVisitors::where('ip_address', $request->ip())->first();
        if (!$visitor) {
          $visitor = new ReportWebsiteVisitors;
          $visitor->ip_address = $request->ip();
          $visitor->save();
        }
    }

    public function getHome(Request $request) {
        session(['menu_active' => 'Home']);
        $this->website_visitors($request);
        $products = Product::latest()->get();
        $promotes = Promote::all();
        return view('user.home')
        ->with('products', $products)
        ->with('promotes', $promotes);
    }

    public function getFormLogin(Request $request) {
        $this->website_visitors($request);
        return view('user.login');
    }

    public function getAbout(Request $request) {
        $this->website_visitors($request);
        return view('user.about');
    }

    public function getNews(Request $request) {
        session(['menu_active' => 'News']);
        $this->website_visitors($request);
        $promotes = Promote::all();
        return view('user.news')
        ->with('promotes', $promotes);
    }

    public function getReadNews(Request $request) {
        $this->website_visitors($request);
        $promote = Promote::find($request->id);
        return view('user.read_news')
        ->with('promote', $promote);
    }

    public function getContact(Request $request) {
        session(['menu_active' => 'Contact']);
        $this->website_visitors($request);
        $contact = Contact::find(1);
        return view('user.contact')
        ->with('contact', $contact);
    }

    public function getProductDetail(Request $request) {
        session(['menu_active' => 'Product']);
        $this->website_visitors($request);
        return view('user.product_detail');
    }

    public function getProductType(Request $request) {
        session(['menu_active' => 'Product']);
        $this->website_visitors($request);
        return view('user.product_type');
    }

    public function getProductSelect(Request $request) {
        session(['menu_active' => 'Product']);
        $this->website_visitors($request);
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

    public function getProductComplete(Request $request) {
        session(['menu_active' => 'Product']);
        $this->website_visitors($request);
        $categorys = Category::where('filter_category', 1)->get();
        $sub_categorys = SubCategory::all();
        $products = Product::all();
        return view('user.product_complete')
        ->with('categorys', $categorys)
        ->with('sub_categorys', $sub_categorys)
        ->with('products', $products);
    }

    public function anyFormQuotation(Request $request) {
        $this->website_visitors($request);
        $product = Product::find($request->id);
        $custom_products = CustomProduct::where('product_id', $product->id)->get();
        return view('user.quotation_form')
        ->with('product', $product)
        ->with('custom_products', $custom_products);
    }

    public function postGuestQuotation(Request $request) {
        // $product_id = $request->product_id;
        // $sum = $request->input_sum;
        // $vat = $request->input_vat;
        // $inc_vat = $request->input_inc_vat;
        // $extension = $request->extension;

        // $quotation = new QuotationProduct;
        // $quotation->product_id = $request->product_id;
        // $quotation->array_custom_product = $request->extension;
        // $quotation->save();
        session(['product_id' => $request->product_id]);
        session(['extension' => $request->extension]);

        return view('user.create_quotation');
        // ->with('product_id', $product_id)
        // ->with('sum', $sum)
        // ->with('vat', $vat)
        // ->with('inc_vat', $inc_vat)
        // ->with('extension', $extension);
    }

    public function postPrintQuotation(Request $request) {
        $quotation_product = new QuotationProduct;
        $quotation_product->product_id = session()->get('product_id');
        $quotation_product->array_custom_product = session()->get('extension');
        $quotation_product->save();
        $create_quotation = new CreateQuotation;
        $create_quotation->quotation_product_id = $quotation_product->id;
        $create_quotation->company_name = $request->company_name;
        $create_quotation->address = $request->address;
        $create_quotation->full_name = $request->full_name;
        $create_quotation->email = $request->email;
        $create_quotation->tel = $request->tel;
        $create_quotation->save();

        $get_quotation = CreateQuotation::find($create_quotation->id);
        session(['get_quotation_id' => $get_quotation->id]);
        $pdf = PDF::loadView('pdf.document');
        return $pdf->stream('document.pdf');
    }

    public function getMemberQuotation(Request $request) {
        $this->website_visitors($request);
        return view('user.member_create_quotation');
    }

    public function getHowToBuy(Request $request) {
        session(['menu_active' => 'HowToBuy']);
        $this->website_visitors($request);
        $how_to_buy = HowToBuy::find(1);
        return view('user.how_to_buy')
        ->with('how_to_buy', $how_to_buy);
    }

    public function getFormUploadQuotation(Request $request) {
        $this->website_visitors($request);
        return view('user.quotation_form_upload');
    }

    public function getSubCategoryProduct(Request $request) {
        session(['menu_active' => 'Product']);
        $this->website_visitors($request);
        $products = Product::where('sub_category_id', $request->id)->get();
        return view('user.sub_category')
        ->with('products', $products);
    }
}
