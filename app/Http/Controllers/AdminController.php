<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Administrator;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function getMain() {
        session(['menu_active' => 'Main']);
        return view('admin.main');
    }

    public function getChangePassword() {
        session(['menu_active' => 'Change_Password']);
        return view('admin.change_password');
    }

    public function postChangePassword(Request $request) {
        $admin = Administrator::find(1);
        if (Hash::check($request->old_password, $admin->password)) {
            if ($request->new_password == $request->confirm_password) {
                $admin->password = Hash::make($request->confirm_password);
                $admin->save();
                return redirect()->back()->with('success', 'Change password success.');
            } else {
                return redirect()->back()->with('error', 2);
            }
        } else {
            return redirect()->back()->with('error', 1);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
