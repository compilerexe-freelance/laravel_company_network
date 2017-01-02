<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\About;
use App\HowToBuy;
use App\Contact;
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

    public function getAbout() {
        $about = About::find(1);
        return view('admin.change_ui.about')
        ->with('about', $about);
    }

    public function postEditAbout(Request $request) {
        $about = About::find(1);
        if ($about) {
            $about->about_detail = $request->about_detail;
            $about->save();
        } else {
            $create_about = new About;
            $create_about->about_detail = $request->about_detail;
            $create_about->save();
        }
        return redirect()->back();
    }

    public function getHowToBuy() {
        $how_to_buy = HowToBuy::find(1);
        return view('admin.change_ui.how_to_buy')
        ->with('how_to_buy', $how_to_buy);
    }

    public function postEditHowToBuy(Request $request) {
        $how_to_buy = HowToBuy::find(1);
        if ($how_to_buy) {
            $how_to_buy->how_to_buy_detail = $request->how_to_buy_detail;
            $how_to_buy->save();
        } else {
            $create_how_to_buy = new HowToBuy;
            $create_how_to_buy->how_to_buy_detail = $request->how_to_buy_detail;
            $create_how_to_buy->save();
        }
        return redirect()->back();
    }

    public function getContact() {
        $contact = Contact::find(1);
        return view('admin.change_ui.contact')
        ->with('contact', $contact);
    }

    public function postEditContact(Request $request) {
        $contact = Contact::find(1);
        if ($contact) {
            $contact->contact_detail = $request->contact_detail;
            $contact->contact_map = $request->contact_map;
            $contact->save();
        } else {
            $create_contact = new Contact;
            $create_contact->contact_detail = $request->contact_detail;
            $create_contact->contact_map = $request->contact_map;
            $create_contact->save();
        }
        return redirect()->back();
    }
}
