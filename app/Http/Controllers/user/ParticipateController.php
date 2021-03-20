<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Events;
use App\Team_details;
use App\Team_members;
use App\Team_participation;
use App\User;
use App\Solo_participation;

class ParticipateController extends Controller
{
    public function solo(Request $request)
    {
        $auth_user_d = Auth::user();       
        $events_intra = Events::with('category')->where('e_type','=','intra')->get();
        $events_name = Events::with('category')->where('id','=',$request->event_id)->first();
        if(isset($auth_user_d)){
            $verify = Auth::user()->is_verified;
            if($verify == 1){
                $team_detailssss = new solo_participation;
                $team_detailssss->event_id =htmlspecialchars($request->event_id, ENT_QUOTES, 'UTF-8');
                $team_detailssss->user_id =htmlspecialchars($auth_user_d->id, ENT_QUOTES, 'UTF-8');
                $team_detailssss->save();
                try{
                    $title='Event Confimation Mail';
                    $email=$auth_user_d->email;
                    $dataa=['title'=>$title,'email'=>$email,'event_name'=>$events_name->e_name];
        
                    Mail::send('Email.eventverification',$dataa,function($message)use($dataa){
                        $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                        $message->to($dataa['email']);
                    } );
                }catch(\Swift_TransportException $e){
                    $response = $e->getMessage() ;

                }
                $message = "You Have Successfully Registerd for Event ".$events_name->e_name;
                return view('user.events',compact('auth_user_d','events_intra','message'));
            }else{
                return redirect()->to('/verify');
            }
        }else{
            return view('user.events',compact('auth_user_d','events_intra'));
        }
    }

    
    public function team(Request $request)
    {
            $auth_user_d = Auth::user();       
            $events_intra = Events::with('category')->where('e_type','=','intra')->get();
            $events_name = Events::with('category')->where('id','=',$request->event_id)->first();
            $team_id = (rand(10,10000));
            $leader_id = User::where('email',$request->leader_email)->first();
            $team_detailsssss = new solo_participation;
            $team_detailsssss->event_id =htmlspecialchars($request->event_id, ENT_QUOTES, 'UTF-8');
            $team_detailsssss->user_id =htmlspecialchars($leader_id ->id, ENT_QUOTES, 'UTF-8');
            $team_detailsssss->save();
            $team_detailsssssss = new Team_members;
            $team_detailsssssss->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
            $team_detailsssssss->user_id =htmlspecialchars($leader_id ->id, ENT_QUOTES, 'UTF-8');
            $team_detailsssssss->save();
            foreach ($request->p_email as $email){
                if(isset($email)){
                    $say = "yes";
                }else{
                    $message = "User".$email." Is Not Register On website Kindly Register";
                }
            }
            if($say == "yes"){
                $events_name = Events::with('category')->where('id','=',$request->event_id)->first();
                $mem_id = User::where('email',$email)->first();
                if(isset($mem_id)){
                    if(isset($leader_id)){
                        $team_details = new Team_details;
                        $team_details->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
                        $team_details->team_name =htmlspecialchars($request->team_name, ENT_QUOTES, 'UTF-8');
                        $team_details->team_leader_id =htmlspecialchars($leader_id->id, ENT_QUOTES, 'UTF-8');
                        $team_details->team_size =htmlspecialchars($request->event_id, ENT_QUOTES, 'UTF-8');
                        $team_details->save();
                        $team_detailss = new Team_participation;
                        $team_detailss->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
                        $team_detailss->event_id =htmlspecialchars($request->event_id, ENT_QUOTES, 'UTF-8');
                        $team_detailss->save();
                        foreach ($request->p_email as $email){
                            $mem_id = User::where('email',$email)->first();
                            $team_detailsss = new Team_members;
                            $team_detailsss->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
                            $team_detailsss->user_id =htmlspecialchars($mem_id ->id, ENT_QUOTES, 'UTF-8');
                            $team_detailsss->save();
                            $team_detailssss = new solo_participation;
                            $team_detailssss->event_id =htmlspecialchars($request->event_id, ENT_QUOTES, 'UTF-8');
                            $team_detailssss->user_id =htmlspecialchars($mem_id ->id, ENT_QUOTES, 'UTF-8');
                            $team_detailssss->save();
                            try{
                                $title='Event Confimation Mail';
                                $email=$email;
                                $dataa=['title'=>$title,'email'=>$email,'event_name'=>$events_name->e_name];
                    
                                Mail::send('Email.eventverification',$dataa,function($message)use($dataa){
                                    $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                                    $message->to($dataa['email']);
                                } );
                            }catch(\Swift_TransportException $e){
                                $response = $e->getMessage() ;
            
                            }
                            $message = 'You have register Successfully For The Event !';
                            session()->flash('message', $message);
                            return redirect('/events');  
                            //return view('user.events',compact('auth_user_d','events_intra','message'));
                        }
                    }else{
                        $message = "User".$request->getleaderemail." Is Not Register On website Kindly Register";
                        return Redirect::back()->withErrors(['msg', $message]);
                        //return view('user.events',compact('auth_user_d','events_intra','message'));
                    }
                }else{
                    $message = "User".$email." Is Not Register On website Kindly Register";
                    return Redirect::back()->withErrors(['msg', $message]);
                    //return view('user.events',compact('auth_user_d','events_intra','message'));
                }
            }
    }
}