<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Events;
use App\Result;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use Auth;

class MailController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function resultmail(Request $request) {
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
    }catch(\Swift_TransportException $e){
        $response = $e->getMessage() ;
    }
   }
}
