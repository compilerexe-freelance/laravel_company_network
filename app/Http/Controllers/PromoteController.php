<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promote;

class PromoteController extends Controller
{
    public function getManagePromote() {
        session(['menu_active' => 'Content']);
        $promotes = Promote::all();
        return view('admin.content.manage_promote')
        ->with('promotes', $promotes);
    }

    public function getViewPromote(Request $request) {
        $promote = Promote::find($request->id);
        return view('admin.content.view_promote')
        ->with('promote', $promote);
    }

    public function getCreatePromote() {
        session(['menu_active' => 'Content']);
        return view('admin.content.create_promote');
    }

    public function postCreatePromote(Request $request) {
        $promote = new Promote;
        $promote->promote_title = $request->promote_title;
        $promote->promote_detail = $request->promote_detail;
        $promote->save();
        return redirect()->route('manage_promote');
    }

    public function getEditPromote(Request $request) {
        $promote = Promote::find($request->id);
        return view('admin.content.edit_promote')
        ->with('promote', $promote);
    }

    public function postEditPromote(Request $request) {
        $promote = Promote::find($request->id);
        $promote->promote_title = $request->promote_title;
        $promote->promote_detail = $request->promote_detail;
        $promote->save();
        return redirect()->route('manage_promote');
    }

    public function getDeletePromote(Request $request) {
        $promote = Promote::find($request->id);
        $promote->delete();
        return redirect()->back();
    }
}
