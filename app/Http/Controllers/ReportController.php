<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportMembers;
use App\ReportWebsiteVisitors;
use App\CreateQuotation;
use App\QuotationProduct;

class ReportController extends Controller
{
    public function getWebsiteVisitors() {
        session(['menu_active' => 'Report']);
        $website_visitors = ReportWebsiteVisitors::all();
        return view('admin.reports.website_visitors')
        ->with('count', count($website_visitors));
    }

    public function getMembers() {
        session(['menu_active' => 'Report']);
        return view('admin.reports.members');
    }

    public function getQuotations() {
        session(['menu_active' => 'Report']);
        $quotations = CreateQuotation::all();
        return view('admin.reports.quotations')
        ->with('quotations', $quotations);
    }

    public function getViewQuotations(Request $request) {
        session(['menu_active' => 'Report']);
        $quotation = CreateQuotation::find($request->id);
        $quotation_product = QuotationProduct::find($quotation->quotation_product_id);
        return view('admin.reports.view_quotation')
        ->with('quotation', $quotation)
        ->with('quotation_product', $quotation_product);
    }
}
