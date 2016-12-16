<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use App\Category;
use App\SubCategory;

class SubCategoryController extends Controller
{
    public function getSubCategory() {
        session(['menu_active' => 'Category']);
        $main_categorys = MainCategory::all();
        $categorys = Category::all();
        $sub_categorys = SubCategory::all();
        return view('admin.manage_category.sub_category')
        ->with('main_categorys', $main_categorys)
        ->with('categorys', $categorys)
        ->with('sub_categorys', $sub_categorys);
    }

    public function postAjaxIdCategory(Request $request) {
        $categorys = Category::where('id_main_category', $request->id)->get();
        $array_ids = array();
        foreach ($categorys as $category) {
            array_push($array_ids, $category->id);
        }
        return $array_ids;
    }

    public function postAjaxCategory(Request $request) {
        $categorys = Category::where('id_main_category', $request->id)->get();
        $array_categorys = array();
        foreach ($categorys as $category) {
          array_push($array_categorys, $category->category_name);
        }
        return $array_categorys;
    }

    public function postSubCategoryInsert(Request $request) {
        $sub_category = new SubCategory;
        $category = Category::where('category_name', $request->select_category)->first();
        $sub_category->id_category = $category->id;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->save();
        return redirect()->back();
    }

    public function getSubCategoryUpdate(Request $request) {
        $main_categorys = MainCategory::all();
        $categorys = Category::all();
        // $get_category = Category::find($request->id);
        $get_sub_category = SubCategory::find($request->id);
        $get_category = Category::find($get_sub_category->id_category);
        
        $get_main_category = MainCategory::find($get_category->id_main_category);
        $sub_categorys = SubCategory::all();
        // $get_sub_category = SubCategory::find($request->id);
        return view('admin.manage_category.update_sub_category')
        ->with('main_categorys', $main_categorys)
        ->with('categorys', $categorys)
        ->with('sub_categorys', $sub_categorys)
        ->with('get_sub_category', $get_sub_category)
        ->with('get_main_category', $get_main_category)
        ->with('get_category', $get_category);
    }

    public function postSubCategoryUpdate(Request $request) {
        $sub_category = SubCategory::where('id', $request->id)->first();
        if ($request->select_category != null) {
            $sub_category->id_category = $request->select_category;
        }
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->save();
        return redirect()->back();
    }

    public function getSubCategoryDelete(Request $request) {
        $sub_category = SubCategory::find($request->id);
        $sub_category->delete();
        return redirect()->back();
    }
}
