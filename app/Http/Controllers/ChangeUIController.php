<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use File;
use Input;

class ChangeUIController extends Controller
{
    public function getBanner() {
        session(['menu_active' => 'Change_UI']);
        return view('admin.change_ui.banner');
    }

    public function postBanner(Request $request) {
      $banner = Banner::find(1);
      if ($banner) {
        $filename = "";
        if ($request->file('fileupload') != '') {
            File::delete('uploads/banner/'.$banner->file);
            $destinationPath = 'uploads/banner';
            if (!file_exists($destinationPath)) {
              File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('fileupload')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('fileupload')->move($destinationPath, $filename);
            $banner->file = $filename;
        }
        $banner->save();
      } else {
        $get_banner = new Banner;
        $filename = "";
        if ($request->file('fileupload') != '') {
            $destinationPath = 'uploads/banner';
            if (!file_exists($destinationPath)) {
              File::makeDirectory($destinationPath, 0775);
            }
            $extension = Input::file('fileupload')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('fileupload')->move($destinationPath, $filename);
            $get_banner->file = $filename;
        }
        $get_banner->save();
      }
      return redirect()->back();
    }
}
