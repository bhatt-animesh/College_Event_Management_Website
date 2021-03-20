<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use validate;
use Hash;
use Session;
use DB;
use App\User;
use App\Result;
use App\Category;
use App\Item;
use App\Events;
use App\Addons;
use App\Ratting;
use App\Contact;
use App\Order;
use App\Promocode;
use App\Solo_participation;
use App\hod_dep;


class AdminController extends Controller {
    public function login() {
        return view('login');
    }
    public function register() {
        return view('register');
    }

    public function home() {
        $new  = Auth::user();
        $role = Auth::user()->profile_image;
        $type = Auth::user()->type;
        $verify = Auth::user()->is_verified;
        if($type == 1 || $type == 3){
            $get_parti = Solo_participation::all();
            $get_results = Result::all();
            $getcategory = Category::all();
            $getitems = Events::all();
            $hod_dep = hod_dep::all();
            $auth_user_d = Auth::user();
            $getusers = User::Where('profile_image', '=' , 'student')->get();
            $driver = User::Where('type', '=' , '3')->get();
            $getcategoryy = Category::where('is_available','1')->get();
            $getitem = Events::with('category')->where('events.created_at','LIKE','%' .date("Y-m-d") . '%')->get();
            return view('admin.home',compact('getcategory','getitems','getitem','getcategoryy','hod_dep','getusers','driver','contact','getreview','getorders','order_total','order_tax','getpromocode','todayorders','getdriver','auth_user_d','get_results','get_parti'));
        }elseif($type == 4 && $role == "hod"){
            $auth_user_d = Auth::user();
            $getitems = Events::where('e_parti','=','hod')->get();
            $hod_details = hod_dep::Where('user_id','=',$new->id)->first();
            return view('hodpannel.home',compact('hod_details','auth_user_d','getitems'));
        }elseif($type == 4 && $role == "proctor"){
            $get_results = Result::all();
            $get_parti = Solo_participation::all();
            $getitem = Events::all();
            $events_inter = Events::with('category')->where('e_type','=','inter')->get();
            $events_intra = Events::with('category')->where('e_type','=','intra')->get();
            $auth_user_d = Auth::user();
            return view('proctorpannel.home',compact('auth_user_d','events_inter','events_intra','getitem','get_results','get_parti'));
        }elseif($type == 4 && $role == "student"){
            if($verify == 1){
                return redirect()->to('/');
            }else{
                return redirect()->to('/verify');
            }
            
        }
        return redirect('404.index');
    }

    public function getorder() {

        $todayorders = Order::with('users')
        ->where('created_at','LIKE','%' .date("Y-m-d") . '%')
        ->where('is_notification','=','1')
        ->count();
        return json_encode($todayorders);
    }

    public function clearnotification() {
        // dd('ss');
        $update = Order::query()->update(["is_notification" => "2"]);

        return json_encode($update);
    }

    public function changePassword(request $request)
    {
        $validation = \Validator::make($request->all(), [
            'oldpassword'=>'required|min:6',
            'newpassword'=>'required|min:6',
            'confirmpassword'=>'required_with:newpassword|same:newpassword|min:6',
        ],[
            'oldpassword.required'=>'Old Password is required',
            'newpassword.required'=>'New Password is required',
            'confirmpassword.required'=>'Confirm Password is required'
        ]);
         
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else if($request['oldpassword']==$request['newpassword'])
        {
            $error_array[]='Old and new password must be different';
        }
        else
        {        
            if(\Hash::check($request->oldpassword,Auth::user()->password)){
                $data['password'] = Hash::make($request->newpassword);
                User::where('id', Auth::user()->id)->update($data);
                Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Password has been changed.!! </div>');
               
            }else{
                $error_array[]="Old Password is not match.";
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        return json_encode($output);  

    }

    public function settings(request $request)
    {
        $validation = \Validator::make($request->all(), [
            'tax'=>'required',
            'delivery_charge'=>'required'
        ]);
        
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            $setting = User::where('id', Auth::user()->id)->update( array('tax'=>$request->tax, 'delivery_charge'=>$request->delivery_charge, 'max_order_qty'=>$request->max_order_qty, 'min_order_amount'=>$request->min_order_amount, 'max_order_amount'=>$request->max_order_amount, 'lat'=>$request->lat, 'lang'=>$request->lang) );

            if ($setting) {
                Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Data updated.!! </div>');
            } else {
                $error_array[]="Please try again";
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        return json_encode($output);  

    }

    public function logout(Request $request) {
        Auth::logout();
        return Redirect::to('/');
    }
}
