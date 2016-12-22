<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use App\Category;

class CategoryController extends Controller
{
    public function getCategory() {
        session(['menu_active' => 'Category']);
        $categorys = Category::all();
        $main_categorys = MainCategory::all();
        return view('admin.manage_category.category')
        ->with('categorys', $categorys)
        ->with('main_categorys', $main_categorys);
    }

    public function postCategoryInsert(Request $request) {
        $category = new Category;
        $category->id_main_category = $request->select_main_category;
        $category->category_name = $request->category_name;
        $category->filter_category = $request->filter_category;
        $category->save();
        return redirect()->back();
    }

    public function getCategoryUpdate(Request $request) {
        $categorys = Category::all();
        $get_category = Category::find($request->id);
        $main_categorys = MainCategory::all();
        return view('admin.manage_category.update_category')
        ->with('categorys', $categorys)
        ->with('get_category', $get_category)
        ->with('main_categorys', $main_categorys);
    }

    public function postCategoryUpdate(Request $request) {
        $category = Category::where('id', $request->id)->first();
        if ($request->select_main_category != null) {
            $category->id_main_category = $request->select_main_category;
        }
        $category->category_name = $request->category_name;
        if ($request->filter_category != null) {
          $category->filter_category = $request->filter_category;
        }
        $category->save();
        return redirect()->route('category');
    }

    public function getCategoryDelete(Request $request) {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->back();
    }
}
