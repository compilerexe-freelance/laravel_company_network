<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\SubCategory;
use App\Product;
use App\CustomProduct;
use App\Promote;
use App\About;
use App\HowToBuy;
use App\Contact;
use App\QuotationProduct;
use App\CreateQuotation;
use App\QuotationUploads;
use App\ReportWebsiteVisitors;
use PDF;
use File;
use Input;
use Carbon\Carbon;

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
        session(['menu_active' => 'About']);
        $about = About::find(1);
        $this->website_visitors($request);
        return view('user.about')
        ->with('about', $about);
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
            $categorys = Category::where('filter_category', 0)->get();
            $sub_categorys = SubCategory::all();
            $products = Product::all();
            return view('user.product_complete')
            ->with('categorys', $categorys)
            ->with('sub_categorys', $sub_categorys)
            ->with('products', $products);
        } else {
            $categorys = Category::where('filter_category', 1)->get();
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
        session(['once_print' => 0]);

        return view('user.create_quotation');
        // ->with('product_id', $product_id)
        // ->with('sum', $sum)
        // ->with('vat', $vat)
        // ->with('inc_vat', $inc_vat)
        // ->with('extension', $extension);
    }

    public function postPrintQuotation(Request $request) {
        $once_print = session()->get('once_print');
        $once_print++;
        // expired
        $carbon = Carbon::now();
        $thai_month_arr=array(
            "1"=>"มกราคม",
            "2"=>"กุมภาพันธ์",
            "3"=>"มีนาคม",
            "4"=>"เมษายน",
            "5"=>"พฤษภาคม",
            "6"=>"มิถุนายน",
            "7"=>"กรกฎาคม",
            "8"=>"สิงหาคม",
            "9"=>"กันยายน",
            "10"=>"ตุลาคม",
            "11"=>"พฤศจิกายน",
            "12"=>"ธันวาคม"
        );
        $expired = $carbon->addDays(15)->addYears(543)->format('d').' '.$thai_month_arr[$carbon->now()->month].' '.$carbon->year;
        session(['expired' => $expired]);
        session(['once_print' => $once_print]);
        if ($once_print == 1) {
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
        } else {
            return redirect()->route('home');
        }

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

    public function postFormUploadQuotation(Request $request) {
        $quotation_uploads = new QuotationUploads;
        $filename = "";
        if ($request->file('file_upload1') != '') {
            $destinationPath = 'uploads/quotations/';
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('file_upload1')->getClientOriginalExtension();
            if (($extension != 'jpg' && $extension != 'png') && $extension != 'pdf') {
                return redirect()->back()->with('status', 'error');
            }
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('file_upload1')->move($destinationPath, $filename);
            $quotation_uploads->file = $filename;
            $quotation_uploads->save();
        }
        if ($request->file('file_upload2') != '') {
            $destinationPath = 'uploads/quotations/';
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('file_upload2')->getClientOriginalExtension();
            if (($extension != 'jpg' && $extension != 'png') && $extension != 'pdf') {
                return redirect()->back()->with('status', 'error');
            }
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('file_upload2')->move($destinationPath, $filename);
            $quotation_uploads->file = $filename;
            $quotation_uploads->save();
        }
        if ($request->file('file_upload3') != '') {
            $destinationPath = 'uploads/quotations/';
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('file_upload3')->getClientOriginalExtension();
            if (($extension != 'jpg' && $extension != 'png') && $extension != 'pdf') {
                return redirect()->back()->with('status', 'error');
            }
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('file_upload3')->move($destinationPath, $filename);
            $quotation_uploads->file = $filename;
            $quotation_uploads->save();
        }
        if ($request->file('file_upload4') != '') {
            $destinationPath = 'uploads/quotations/';
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('file_upload4')->getClientOriginalExtension();
            if (($extension != 'jpg' && $extension != 'png') && $extension != 'pdf') {
                return redirect()->back()->with('status', 'error');
            }
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('file_upload4')->move($destinationPath, $filename);
            $quotation_uploads->file = $filename;
            $quotation_uploads->save();
        }
        if ($request->file('file_upload5') != '') {
            $destinationPath = 'uploads/quotations/';
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('file_upload5')->getClientOriginalExtension();
            if (($extension != 'jpg' && $extension != 'png') && $extension != 'pdf') {
                return redirect()->back()->with('status', 'error');
            }
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('file_upload5')->move($destinationPath, $filename);
            $quotation_uploads->file = $filename;
            $quotation_uploads->save();
        }
        return redirect()->back()->with('status', 'success');
    }

    public function getSubCategoryProduct(Request $request) {
        session(['menu_active' => 'Product']);
        $this->website_visitors($request);
        $products = Product::where('sub_category_id', $request->id)->get();
        return view('user.sub_category')
        ->with('products', $products);
    }
}
