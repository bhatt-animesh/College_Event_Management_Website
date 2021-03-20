<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;
use App\Events;
use App\Category;
use App\Ourteam;
use App\Result;
use App\User;
use App\Gallery;

class UserController extends Controller
{
    public function home()
    {
        $auth_user_d = Auth::user();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                return view('user.index');
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.index');
        }
        
    }

    public function events()
    {
        $auth_user_d = Auth::user();       
        $events_intra = Events::with('category')->where('e_type','=','intra')->get();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                return view('user.events',compact('auth_user_d','events_intra'));
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.events',compact('auth_user_d','events_intra'));
        }
        
    }

    public function gallery()
    {
        $gallery_r = Gallery::where('day','=','recent')->get();
        $gallery_1 = Gallery::where('day','=','day1')->get();
        $gallery_2 = Gallery::where('day','=','day2')->get();
        $gallery_3 = Gallery::where('day','=','day3')->get();
        $auth_user_d = Auth::user();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                return view('user.gallery',compact('auth_user_d','gallery_r','gallery_1','gallery_2','gallery_3'));
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.gallery',compact('auth_user_d','gallery_r','gallery_1','gallery_2','gallery_3'));
        }
        
    }

    public function profile()
    {
        $auth_user_d = Auth::user();
        $auth_user_d_id = Auth::user()->id;
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                
                return view('user.profile',compact('auth_user_d','myevents'));
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.profile',compact('auth_user_d'));
        }
        
    }

    public function results()
    {
        $getcategory = Events::all();
        $auth_user_d = Auth::user();
        $getitem = Result::with('events')->orderby('event_id')->get();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                return view('user.results', compact('getcategory','getitem'));
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.results', compact('getcategory','getitem'));
        }
        
    }
    public function verify()
    {
        $auth_user_d = Auth::user();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                return redirect()->to('/');
            }else{
                $error_message = "";
                return view('user.verify', compact('auth_user_d','error_message'));
            }
        }else{
            return redirect()->to('/');
        }
        
    }

    public function verified(Request $request)
    {
        $auth_user_d = Auth::user();
        $auth_user_d_email = Auth::user()->email;
                if ($auth_user_d->otp == $request->otp) {
                    $update=User::where('email',$auth_user_d_email)->update(['otp'=>NULL,'is_verified'=>'1']);
                    return redirect()->to('/profile');
                }else {
                    $error_message = "Invalid OTP Please Try Again.";
                    return view('user.verify', compact('error_message','auth_user_d'));
        }
    }

    public function resend()
    {
        $otp = mt_rand(100000, 999999);
        $auth_user_d = Auth::user();
        $auth_user_d_email = Auth::user()->email;
        try{
            $title='Email Verification Code';
            $email=$auth_user_d_email;
            $dataa=['title'=>$title,'email'=>$email,'otp'=>$otp];

            Mail::send('Email.emailverification',$dataa,function($message)use($dataa){
                $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                $message->to($dataa['email']);
            } );
                $update=User::where('email',$auth_user_d_email)->update(['otp'=>$otp]);
                $error_message = "OTP Sended Successfully !";
                return view('user.verify', compact('error_message','auth_user_d'));

        }catch(\Swift_TransportException $e){
            echo $response = $e->getMessage() ;
        }
    }

    public function ourteam()
    {
        $auth_user_d = Auth::user();
        $ourteam_core = Ourteam::where('committee_name','=','Core')->get();
        $ourteam_cal = Ourteam::where('committee_name','=','Cultural')->get();
        $ourteam_doc = Ourteam::where('committee_name','=','Documentation')->get();
        $ourteam_food = Ourteam::where('committee_name','=','Food and accomodation')->get();
        $ourteam_invi = Ourteam::where('committee_name','=','Invitation')->get();
        $ourteam_poster = Ourteam::where('committee_name','=','Poster and social')->get();
        $ourteam_photo = Ourteam::where('committee_name','=','Photography and video')->get();
        $ourteam_spon = Ourteam::where('committee_name','=','Sponsership')->get();
        $ourteam_sports = Ourteam::where('committee_name','=','Sports')->get();
        $ourteam_store = Ourteam::where('committee_name','=','Store')->get();
        $ourteam_website = Ourteam::where('committee_name','=','Website')->get();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                return view('user.ourteam',compact('ourteam_core','ourteam_cal','ourteam_doc','ourteam_food','ourteam_invi','ourteam_poster','ourteam_photo','ourteam_spon','ourteam_sports','ourteam_store','ourteam_website'));
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.ourteam',compact('ourteam_core','ourteam_cal','ourteam_doc','ourteam_food','ourteam_invi','ourteam_poster','ourteam_photo','ourteam_spon','ourteam_sports','ourteam_store','ourteam_website'));
        }
    }
}
