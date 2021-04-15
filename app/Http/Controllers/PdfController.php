<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class PdfController extends Controller
{

    public function index()
    {
        return view('pdf.index');
    }

    public function create()
    {
       
        $pdf = PDF::loadView('pdf.pdf');
        
        return $pdf->download('disney.pdf');
    }
}