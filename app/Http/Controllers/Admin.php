<?php

namespace App\Http\Controllers;

use App\Models\Oex_category; 
use App\Models\Oex_exam_master;
use App\Models\Oex_students;
use App\Models\Oex_portal;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;


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
        $data['category']=Oex_category::orderBy('id', 'DESC')->get()->toArray();
        //dd($data);
        return view('admin.exam_category',$data);
    }
    
    public function add_new_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if ($validator->passes())
        {
            $cat = new Oex_category();
            $cat->name = $request->name;
            $cat->status = 1;
            $cat->save();
            $arr=array('status'=>'true','message'=>'success','reload'=>url('admin/exam_category'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    
    public function delete_category($id)
    {   
        $cat=Oex_category::where('id', $id)->get()->first();
        $cat->delete();
        return redirect(url('admin/exam_category'));
        
    }
    public function edit_category($id)
    {   
        $category=Oex_category::where('id', $id)->get()->first();
        return view('admin.edit_category',['category'=>$category]);
    }
    
    public function edit_new_category(Request $request)
    {   
        $cat=Oex_category::where('id', $request->id)->get()->first();
        $cat->name = $request->name;
        $cat->update();
        echo json_encode(array('status'=>'true','message'=>'Category Updated successfully','reload'=>url('admin/exam_category')));
    }  
    
    public function category_status($id)
    {   
        $cat=Oex_category::where('id', $id)->get()->first();  
        if ($cat->status==1) {
            $status=0;
        } else {
            $status=1;
        }

        $cat1=Oex_category::where('id', $id)->get()->first();
        $cat1->status=$status;
        $cat1->update();
    }
    
    public function manage_exam()
    {   
        $data['category']=Oex_category::orderBy('id', 'DESC')->where('status',1)->get()->toArray();
        //$data['exam']=Oex_exam_master::orderBy('id', 'DESC')->get()->toArray();

        $data['exam']=DB::table('oex_exam_masters')
                        ->join('oex_categories', 'oex_exam_masters.category', '=', 'oex_categories.id')
                        ->orderBy('id', 'desc')
                        ->select('oex_exam_masters.*', 'oex_categories.name')
                        ->get();
        //dd($data['exam']);
        return view('admin.manage_exam',$data);
    }

    public function add_new_exam(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'exam_date' => 'required',
            'category' => 'required',
        ]);
    
        if ($validator->passes())
        {
            $exam = new Oex_exam_master();
            $exam->title = $request->title;
            $exam->exam_date = $request->exam_date;
            $exam->category = $request->category;
            $exam->status = 1;
            $exam->save();
            $arr=array('status'=>'true','message'=>'success','reload'=>url('admin/manage_exam'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function add_new_portal(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->passes())
        {
            $portal = new Oex_portal();
            $portal->name = $request->name;
            $portal->email = $request->email;
            $portal->mobile_no = $request->mobile_no;
            $portal->password = $request->password;
            $portal->status = 1;
            $portal->save();
            $arr=array('status'=>'true','message'=>'success','reload'=>url('admin/manage_portal'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function exam_status($id)
    {   
        $cat=Oex_exam_master::where('id', $id)->get()->first();  
        if ($cat->status==1) {
            $status=0;
        } else {
            $status=1;
        }

        $cat1=Oex_exam_master::where('id', $id)->get()->first();
        $cat1->status=$status;
        $cat1->update();
    }


    public function portal_status($id)
    {   
        $cat=Oex_portal::where('id', $id)->get()->first();  
        if ($cat->status==1) {
            $status=0;
        } else {
            $status=1;
        }

        $cat1=Oex_portal::where('id', $id)->get()->first();
        $cat1->status=$status;
        $cat1->update();
    }

    public function delete_exam($id)
    {   
        $cat=Oex_exam_master::where('id', $id)->get()->first();
        $cat->delete();
        return redirect(url('admin/manage_exam'));
        
    }

    public function delete_portal($id)
    {   
        $cat=Oex_portal::where('id', $id)->get()->first();
        $cat->delete();
        return redirect(url('admin/manage_portal'));
        
    }

    public function edit_exam($id)
    {   
        $exam=Oex_exam_master::where('id', $id)->get()->first();
        $category=Oex_category::orderBy('id', 'DESC')->where('status',1)->get()->toArray();
        return view('admin.edit_exam',['exam'=>$exam,'category'=>$category]);
    }

    public function edit_new_exam(Request $request)
    {   
        
        $exam=Oex_exam_master::where('id', $request->id)->get()->first();
        $exam->title = $request->title;
        $exam->exam_date = $request->exam_date;
        $exam->category = $request->category;
        $exam->update();
        echo json_encode(array('status'=>'true','message'=>'Exam Updated successfully','reload'=>url('admin/manage_exam')));
    }  

    public function edit_new_portal(Request $request)
    {   
        
        $exam=Oex_portal::where('id', $request->id)->get()->first();
        $exam->name = $request->name;
        $exam->email = $request->email;
        $exam->mobile_no = $request->mobile_no;
        $exam->password = $request->password;
        $exam->update();
        echo json_encode(array('status'=>'true','message'=>'Portal Updated successfully','reload'=>url('admin/manage_portal')));
    } 



    public function manage_students(Request $request)
    {   
        $data['exams']=Oex_exam_master::orderBy('id', 'DESC')->where('status',1)->get()->toArray();

        $data['students']=DB::table('oex_students')
                        ->join('oex_exam_masters', 'oex_exam_masters.id', '=', 'oex_students.exam')
                        ->orderBy('id', 'desc')
                        ->select('oex_students.*', 'oex_exam_masters.title')
                        ->get();

        //dd($data['students']);

        return view('admin.manage_students',$data);  
    
    }  


    public function add_new_student(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'dob' => 'required',
            'exam' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->passes())
        {
            $student = new Oex_students();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->mobile_no = $request->mobile_no;
            $student->dob = $request->dob;
            $student->exam = $request->exam;
            $student->password = $request->password;
            $student->status = 1;
            $student->save();
            $arr=array('status'=>'true','message'=>'success','reload'=>url('admin/manage_students'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }


    public function student_status($id)
    {   
        $cat=Oex_students::where('id', $id)->get()->first();  
        if ($cat->status==1) {
            $status=0;
        } else {
            $status=1;
        }

        $cat1=Oex_students::where('id', $id)->get()->first();
        $cat1->status=$status;
        $cat1->update();
    }


    public function delete_student($id)
    {   
        $cat=Oex_students::where('id', $id)->get()->first();
        $cat->delete();
        return redirect(url('admin/manage_students'));
        
    }

    public function edit_student($id)   
    {   
        $student=Oex_students::where('id', $id)->get()->first();
        $category=Oex_exam_master::orderBy('id', 'DESC')->where('status',1)->get()->toArray();
        return view('admin.edit_student',['exam'=>$student,'category'=>$category]);
    }

    public function edit_portal($id)   
    {   
        $portal=Oex_portal::where('id', $id)->get()->first();
        return view('admin.edit_portal',['portal'=>$portal]);
    }

    
    public function edit_new_student(Request $request)
    {   
        
        $student=Oex_students::where('id', $request->id)->get()->first();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile_no = $request->mobile_no;
        $student->dob = $request->dob;
        $student->exam = $request->exam;
        $student->password = $request->password;
       
        $student->save();
        echo json_encode(array('status'=>'true','message'=>'Student Updated successfully','reload'=>url('admin/manage_students')));
    }  

    
    public function manage_portal()   
    {   
        $data['portal']=Oex_portal::orderBy('id', 'DESC')->get()->toArray();
        return view('admin.manage_portal',$data);
    }


}
