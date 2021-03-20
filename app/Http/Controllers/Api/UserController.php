<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Result;
use App\Events;
use Validator;

class UserController extends Controller
{
    public function register(Request $request )
    {
        if($request->event_id == ""){
            return response()->json(["status"=>0,"message"=>"Event Id is required"],400);
        }
        if($request->w_name == ""){
            return response()->json(["status"=>0,"message"=>"Winner Name is required"],400);
        }
        if($request->w_reg == ""){
            return response()->json(["status"=>0,"message"=>"Winner Reg is required"],400);
        }
        if($request->r_name == ""){
            return response()->json(["status"=>0,"message"=>"Runner-Up Name is required"],400);
        }
        if($request->r_reg == ""){
            return response()->json(["status"=>0,"message"=>"Runner-Up Reg is required"],400);
        }

        $checkevent=Result::where('event_id','=',$request->event_id)->first();
        
        if(!empty($checkevent))
        {
            return response()->json(['status'=>0,'message'=>'This Event Result Already Uploaded'],400);
        }

        $data['event_id']=$request->get('event_id');
        $data['w_name']=$request->get('w_name');
        $data['w_reg']=$request->get('w_reg');
        $data['r_name']=$request->get('r_name');;
        $data['r_reg']=$request->get('r_reg');
        //dd($data);
        $result=Result::create($data);
        if($result)
        {
            $arrayName = array(
                'id' => $result->id
            );
            // $data['id']=$user->id;
            //sendmaill($request->get('email'),"User","rgs");
            try{
                $event_name = Events::where('id','=',$request->event_id)->first('e_name');
                $w_reg = strtoupper($request->w_reg);
                $r_reg = strtoupper($request->r_reg);
                $title='Congratulations From Lakshya 2021';
                $w_email= User::where('college_id','=',$w_reg)->first('email');
                $r_email= User::where('college_id','=',$r_reg)->first('email');
                if($w_email){
                    $dataa=['title'=>$title,'email'=>$w_email->email,'posi'=>'Winner','event_name'=>$event_name->e_name];
                    Mail::send('Email.resultemail',$dataa,function($message)use($dataa){
                        $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                        $message->to($dataa['email']);
                    } );
                }
                if($r_email){
                    $dataaa=['title'=>$title,'email'=>$r_email->email,'posi'=>'Runner-Up','event_name'=>$event_name->e_name];
                    Mail::send('Email.resultemail',$dataa,function($message)use($dataa){
                        $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                        $message->to($dataa['email']);
                    } );
                }
                return response()->json(['status'=>1,'message'=>'Result Uploaded !!','data'=>$arrayName],200);
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
            }
        }
        else
        {
            return response()->json(['status'=>0,'message'=>'Problem Contact To Admin !!'],400);
        }
    }


    public function getprofile(Request $request )
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>"User ID is required"],400);
        }

        $users = User::where('id',$request['user_id'])->get()->first();

        if ($users->mobile == "") {
            $mobile = "";
        } else {
            $mobile = $users->mobile;
        }

        $arrayName = array(
            'id' => $users->id,
            'name' => $users->name,
            'mobile' => $mobile,
            'email' => $users->email,
            'profile_image' => url('/public/images/profile/'.$users->profile_image)
        );


        if(!empty($arrayName))
        {
            return response()->json(['status'=>1,'message'=>'Profile data','data'=>$arrayName],200);
        } else {
            $status=0;
            $message='No User found';
            $data="";
            return response()->json(['status'=>$status,'message'=>$message],422);
        }

        return response()->json(['status'=>$status,'message'=>$message,'data'=>$data],200);
    }


    public function forgotPassword(Request $request)
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"Email id is required"],400);
        }

        $checklogin=User::where('email',$request['email'])->first();
        
        if(empty($checklogin))
        {
            return response()->json(['status'=>0,'message'=>'Email does not exist'],400);
        }
        else {
            // dd($checklogin->facebook_id);
            if ($checklogin->google_id != "" OR $checklogin->facebook_id != "") {
                return response()->json(['status'=>2,'message'=>'Your account has been registered with social media'],400);
            } else {
                $password = str_shuffle("asdfghjkl");
                $newpassword['password'] = Hash::make($password);
                $email=$checklogin->email;
                sendmaill($email,$password,"fs");
                $update = User::where('email', $request['email'])->update($newpassword);
                return response()->json(['status'=>1,'message'=>'New Password Sent to your email address'],200);
            }
        }

    }


    public function androidversion()
    {
        $versionCode    = "7";
        $versionNumber = "1.0.7";
        $versionLog     = "- Bug Fix
- Ui Improvement";
        
        return response()->json(['status'=>1,'message'=>'Android Info Sended','versionCode'=>$versionCode,'versionNumber'=>$versionNumber,'versionLog'=>$versionLog],200);
    }

    public function login(Request $request )
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>"Email id is required"],400);
        }
        if($request->password == ""){
            return response()->json(["status"=>0,"message"=>"Password is required"],400);
        }
        
        $login=User::where('email',$request['email'])->where('type','=','1')->orWhere('type','=','3')->first();

        if(!empty($login))
        {
        	if($login->is_verified == '1') 
            {
	            if($login->is_available == '1') 
	            {
	                if(Hash::check($request->get('password'),$login->password))
	                {
	                    $arrayName = array(
	                        'id' => $login->id,
	                        'name' => $login->name,
	                        'mobile' => $login->mobile,
	                        'email' => $login->email,
	                    );

	                    $data=array('user'=>$arrayName);
	                    $status=1;
	                    $message='Login Successful';

	                    $data_token['token'] = $request['token'];
	                    $update=User::where('email',$request['email'])->update($data_token);

	                    return response()->json(['status'=>$status,'message'=>$message,'data'=>$arrayName],200);
	                }
	                else
	                {
	                    $status=0;
	                    $message='Password is incorrect';
	                    return response()->json(['status'=>$status,'message'=>$message],422);
	                }
	            }
	            else
	            {
	                $status=0;
	                $message='Your account has been blocked by Admin';
	                return response()->json(['status'=>$status,'message'=>$message],422);
	            }
	        } else {
                $status=2;
                $message="Your haven't verified your email address";
                return response()->json(['status'=>$status,'message'=>$message],422);
            }
        }
        else
        {
            $status=0;
            $message='Email is incorrect';
            $data="";
            return response()->json(['status'=>$status,'message'=>$message],422);
        }
        
       
        return response()->json(['status'=>$status,'message'=>$message,'data'=>$data],200);
    }
}
