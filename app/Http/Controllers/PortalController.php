<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Oex_portal;
use Session;

class PortalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function portal_signup(Request $request)
    {
        if (Session::get('portal_session')) {
            return redirect('portal/dashboard');
        }
        return view('portal.signup');
    }
    

    public function login_sub(Request $request)   
    {
        $portals=Oex_portal::where('email', $request->email)->where('password',$request->password)->get()->toArray();
        if ($portals) {
            if ($portals[0]['status']==1)
            {
                $request->session()->put('portal_session', $portals[0]['id']);
                $arr=array('status'=>'true','message'=>'success','reload'=>url('portal/dashboard'));
            }
    
            else
            {
                $arr=array('status'=>'false','message'=>'Your account is deactivated');
            }
        }else{
            $arr=array('status'=>'false','message'=>'Email and password not correct');
        }
        echo json_encode($arr);
       
    }


    public function signup_sub(Request $request)   
    {   
        //print_r($request->all());
        //die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'password' => 'required',
        ]);

        $isExists=Oex_portal::where('email', $request->email)->get()->toArray();

        if ($isExists)
        {
            $arr=array('status'=>'false','message'=>'E-mail already Exist');
        }

        else
        {
            $portal = new Oex_portal();
            $portal->name = $request->name;
            $portal->email = $request->email;
            $portal->mobile_no = $request->mobile_no;
            $portal->password = $request->password;
            $portal->save();
            $arr=array('status'=>'true','message'=>'success','reload'=>url('portal/login'));
        }
        echo json_encode($arr);
       
    }

    public function login(Request $request)
    {
        if (Session::get('portal_session')) {
            return redirect('portal/dashboard');
        }
        return view('portal.login');
    }
}
