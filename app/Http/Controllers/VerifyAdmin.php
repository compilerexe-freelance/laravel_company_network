<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class VerifyAdmin extends Controller
{
    public function getVerify() {
        return view('verify_login');
    }

    public function postVerfiry(Request $request) {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('control_panel');
        } else {
            return redirect()->route('verify');
        }
    }
}
