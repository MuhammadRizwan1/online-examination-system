<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.dashboard');
    }

    public function exam_category(Request $request)
    {   
        return view('admin.exam_category');
    }
    
    public function add_new_category(Request $request)
    {   
        print_r($request->all());
        //return view('admin.exam_category');
    }
    
}
