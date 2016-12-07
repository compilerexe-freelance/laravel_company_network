<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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

    public function getProductCustom() {
        return view('user.product_custom');
    }

    public function getFormQuotation() {
        return view('user.quotation_form');
    }

    public function getGuestQuotation() {
        return view('user.create_quotation');
    }

    public function getMemberQuotation() {
        return view('user.member_create_quotation');
    }

    public function getFormUploadQuotation() {
        return view('user.quotation_form_upload');
    }
}