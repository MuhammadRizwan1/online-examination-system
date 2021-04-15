<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Oex_exam_master;
use App\Models\Oex_students;
use Illuminate\Support\Facades\DB;
use DateTime;
use Validator;
use PDF;

use Illuminate\Http\Request;

class PortalOOperation extends Controller
{
    public function dashboard()
    {
        if (!Session::get('portal_session')) {
            return redirect('portal/login');
        }

        // $data['portal_exams']=Oex_exam_master::orderBy('id', 'DESC')->where('status',1)->get()->toArray();

        $data['portal_exams'] = DB::table('oex_exam_masters')
            ->join('oex_categories', 'oex_exam_masters.category', '=', 'oex_categories.id')
            ->where('oex_exam_masters.status', 1)
            ->select('oex_exam_masters.*', 'oex_categories.name as cat_name')
            ->orderBy('id', 'DESC')
            ->get();


        $d = new DateTime();
        $data['current_date'] = $d->format("Y-m-d");
        return view('portal/dashboard', $data);
    }

    public function exam_from($id)
    {
        $data['id'] = $id;
        $exam = Oex_exam_master::where('id', $id)->get()->first();

        $data['title'] = $exam->title;
        $data['exam_date'] = $exam->exam_date;

        return view('portal/exam_from', $data);
    }

    public function exam_form_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $std = new Oex_students();
            $std->name = $request->name;
            $std->email = $request->email;
            $std->dob = $request->dob;
            $std->mobile_no = $request->mobile_no;
            $std->password = $request->password;
            $std->exam = $request->exam;
            $std->save();
            $arr = array('status' => 'true', 'message' => 'success', 'reload' => url('portal/print/' . $std->id));
        } else {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }
        echo json_encode($arr);
    }


    public function update_form()
    {

        $std_info = Oex_exam_master::where('status', 1)->get();
        //echo $std_info;
        //die; 
        return view('portal/update_form', ['std_info' => $std_info]);
    }



    public function print($id)
    {
        $std_info = Oex_students::where('id', $id)->get()->first();
        return view('portal/print', ['std_info' => $std_info]);
    }


    public function create($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($id));
        return $pdf->stream();
    }


    function get_customer_data($id)
    {
        $customer_data = DB::table('oex_students')
            ->where('id', $id)
            ->get()
            ->first();
        return $customer_data;
    }


    function convert_customer_data_to_html($id)
    {
        $customer_data = $this->get_customer_data($id);
        // print_r($customer_data);
        //die;
        $output = '
     <html>
     <head>
         <style>
             /** 
                 Set the margins of the page to 0, so the footer and the header
                 can be of the full height and width !
              **/
             @page {
                 margin: 0cm 0cm;
             }
 
             /** Define now the real margins of every page in the PDF **/
             body {
                 margin-top: 2cm;
                 margin-left: 2cm;
                 margin-right: 2cm;
                 margin-bottom: 2cm;
             }
 
             /** Define the header rules **/
             header {
                 position: fixed;
                 top: 0cm;
                 left: 0cm;
                 right: 0cm;
                 height: 2cm;
 
                 /** Extra personal styles **/
                 background-color: #03a9f4;
                 color: white;
                 text-align: center;
                 line-height: 1.5cm;
             }
 
             /** Define the footer rules **/
             footer {
                 position: fixed; 
                 bottom: 0cm; 
                 left: 0cm; 
                 right: 0cm;
                 height: 2cm;
 
                 /** Extra personal styles **/
                 background-color: #03a9f4;
                 color: white;
                 text-align: center;
                 line-height: 1.5cm;
             }
         </style>
     </head>
     <body>
         <!-- Define header and footer blocks before your content -->
         <header>
             Employee Card
         </header>
 
         <footer>
             Copyright &copy; 2021 
         </footer>
 
         <!-- Wrap the content of your PDF inside a main tag -->
         <main>';

        $output .= '

             <h3 align="center">Devpel Solutions</h3>
             <img src="https://media.istockphoto.com/photos/portrait-of-smiling-handsome-man-in-blue-tshirt-standing-with-crossed-picture-id1045886560?k=6&m=1045886560&s=612x612&w=0&h=hXrxai1QKrfdqWdORI4TZ-M0ceCVakt4o6532vHaS3I=" alt="Girl in a jacket" width="100" height="100">
             <table width="100%" style="border-collapse: collapse; border: 0px;">
              <tr>
            <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
            <th style="border: 1px solid; padding:12px;" width="30%">DOB</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Mobile No</th>
           </tr>
             ';

        $output .= '
              <tr>
               <td style="border: 1px solid; padding:12px;">' . $customer_data->name . '</td>
               <td style="border: 1px solid; padding:12px;">' . $customer_data->dob . '</td>
               <td style="border: 1px solid; padding:12px;">' . $customer_data->mobile_no . '</td>
              </tr>
             
              ';

        $output .= '</table>';



        $output .= '</main></body>';
        $output .= '</html>';
        return $output;
    }




    public function student_exam_info()
    {

        $mobile = $_GET['mobile_no'];
        $dob = $_GET['dob'];
        $exam = $_GET['exam'];

        $data['exam_info'] = Oex_exam_master::where('id', $exam)->get()->first();

        //die;
        $data['std_info'] = Oex_students::where('mobile_no', $mobile)->where('dob', $dob)->where('exam', $exam)->get()->toArray();
        //print_r($data['std_info']);
        return view('portal/student_exam_info', $data);
    }

    public function student_exam_info_edit(Request $request)
    {
        $std_info = Oex_students::where('id', $request->id)->get()->first();
        $std_info->name = $request->name;
        $std_info->email = $request->email;
        $std_info->mobile_no = $request->mobile_no;
        $std_info->dob = $request->dob;
        $std_info->password = $request->password;
        $std_info->save();
        //$arr = array('status' => 'true', 'message' => 'Updated successfully', 'reload' => url('portal/update_form'));
        //echo json_encode($arr);

        echo json_encode(array('status' => 'true', 'message' => 'Updated successfully', 'reload' => url('portal/update_form')));
    }


    public function logout(Request $request)
    {
        $request->session()->forget('portal_session');
        return redirect(url('/portal/login'));
    }
}
