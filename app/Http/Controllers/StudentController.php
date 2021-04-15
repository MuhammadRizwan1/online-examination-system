<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function signup()
    {


        return view('student/signup');
    }
}
