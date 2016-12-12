<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;

class MainCategoryController extends Controller
{
    public function getMainCategory() {
        session(['menu_active' => 'Category']);
        $main_categorys = MainCategory::all();
        return view('admin.manage_category.main_category')->with('main_categorys', $main_categorys);
    }

    public function postMainCategoryInsert(Request $request) {
        $main_category = new MainCategory;
        $main_category->main_category_name = $request->main_category_name;
        $main_category->save();
        return redirect()->back();
    }

    public function getMainCategoryUpdate(Request $request) {
        $main_categorys = MainCategory::all();
        $get_main_category = MainCategory::where('id', $request->id)->first();
        return view('admin.manage_category.update_main_category')
        ->with('main_categorys', $main_categorys)
        ->with('get_main_category', $get_main_category);
    }

    public function postMainCategoryUpdate(Request $request) {
        $main_category = MainCategory::where('id', $request->id)->first();
        $main_category->main_category_name = $request->main_category_name;
        $main_category->save();
        return redirect()->route('main_category');
    }

    public function getMainCategoryDelete(Request $request) {
        $main_category = MainCategory::find($request->id);
        $main_category->delete();
        return redirect()->back();
    }
}
