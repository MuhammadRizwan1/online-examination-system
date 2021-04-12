<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;

class PortalOOperation extends Controller
{
    public function dashboard(){
        if (!Session::get('portal_session')) {
            return redirect('portal/login');
        }
        return view('portal/dashboard');
    }
}
