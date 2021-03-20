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
use Validator;
use Auth;

class ResultController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $role = Auth::user()->profile_image;
        $type = Auth::user()->type;
        if($type == 1 || $type == 3){
            $getcategory = Events::all();
            $getitem = Result::with('events')->get();
            $auth_user_d = Auth::user();
            return view('admin.result', compact('getcategory','getitem','auth_user_d'));
        }else{
            return view('404.index');
        }
    }

    public function list()
    {
        $getcategory = Events::all();
        $getitem = Result::with('events')->get();
        $auth_user_d = Auth::user();
        return view('theme.resultstable',compact('getitem','getcategory','auth_user_d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $s
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),[
          'event_id' => 'required',
          'w_name' => 'required',
          'r_name' => 'required',
          'r_reg' => 'required',
          'w_reg' => 'required',
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
            $results = new Result;
        
            $results->event_id =htmlspecialchars($request->event_id, ENT_QUOTES, 'UTF-8');
            $results->w_name =htmlspecialchars($request->w_name, ENT_QUOTES, 'UTF-8');
            $results->w_reg =htmlspecialchars($request->w_reg, ENT_QUOTES, 'UTF-8');
            $results->r_name =htmlspecialchars($request->r_name, ENT_QUOTES, 'UTF-8');
            $results->r_reg =htmlspecialchars($request->r_reg, ENT_QUOTES, 'UTF-8');
            $results->save();

            $success_output = 'Result Uploaded Successfully!';
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
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
            echo $response = $e->getMessage() ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $category = Result::findorFail($request->id);
        return response()->json(['ResponseCode' => 1, 'ResponseText' => ' fetch successfully', 'ResponseData' => $getcategory], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'getevent_id' => 'required',
            'getw_name' => 'required',
            'getr_name' => 'required',
            'getr_reg' => 'required',
            'getw_reg' => 'required',
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
              $results = new Result;
              $results->exists = true;
              $results->id = $request->id;
              $results->event_id =htmlspecialchars($request->getevent_id, ENT_QUOTES, 'UTF-8');
              $results->w_name =htmlspecialchars($request->getw_name, ENT_QUOTES, 'UTF-8');
              $results->w_reg =htmlspecialchars($request->getw_reg, ENT_QUOTES, 'UTF-8');
              $results->r_name =htmlspecialchars($request->getr_name, ENT_QUOTES, 'UTF-8');
              $results->r_reg =htmlspecialchars($request->getr_reg, ENT_QUOTES, 'UTF-8');
              $results->save();
  
              $success_output = 'Item Added Successfully!';
          }
          $output = array(
              'error'     =>  $error_array,
              'success'   =>  $success_output
          );
          echo json_encode($output);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $UpdateDetails = Result::where('id', $request->id)->delete();
        if ($UpdateDetails) {
            return 2;
        } else {
            return 0;
        }
    }
}
