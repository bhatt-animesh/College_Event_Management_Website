<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\hod_dep;
use App\Team_details;
use App\Team_members;
use App\Team_participation;
use App\User;
use App\Solo_participation;

class HodController extends Controller
{
    public function index() {
        $new  = Auth::user();
        $role = Auth::user()->profile_image;
        $type = Auth::user()->type;
        if($type == 1 || $type == 4 && $role == 'hod'){
            $auth_user_d = Auth::user();
            $hod_details = hod_dep::Where('user_id','=',$new->id)->first();
            $getitems = Events::where('e_parti','=','hod')->get();
            return view('hodpannel.events',compact('auth_user_d','getitems','hod_details'));
        }else{
            return view('404.index');
        }
    }

    public function list()
    {
        $getitems = Events::where('e_parti','=','hod')->get();
        return view('theme.hodeventstable',compact('getitems'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
          'gethodid' => 'required',
          'getdrname' => 'required',
          'getdrcontact' => 'required',
          'getdepartment' => 'required',
          'getteamname' => 'required',
          'getleadername' => 'required',
          'getleaderemail' => 'required',
          'getmobile' => 'required',
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
            $team_id = rand(10,1000);
            $leader_id = User::where('email',$request->getleaderemail)->first();
            foreach ($request->emailp as $email){
                if(isset($email)){
                    $say = "yes";
                }else{
                    $error_array[] = "User".$email." Is Not Register On website Kindly Register";
                }
            }
            if($say == "yes"){
                $events_name = Events::with('category')->where('id','=',$request->id)->first();
                $mem_id = User::where('email',$email)->first();
                if(isset($mem_id)){
                    if(isset($leader_id)){
                        $team_details = new Team_details;
                        $team_details->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
                        $team_details->team_name =htmlspecialchars($request->getteamname, ENT_QUOTES, 'UTF-8');
                        $team_details->team_leader_id =htmlspecialchars($leader_id->id, ENT_QUOTES, 'UTF-8');
                        $team_details->team_size =htmlspecialchars($request->id, ENT_QUOTES, 'UTF-8');
                        $team_details->team_department =htmlspecialchars($request->getdepartment, ENT_QUOTES, 'UTF-8');
                        $team_details->hod_id =htmlspecialchars($request->gethodid, ENT_QUOTES, 'UTF-8');
                        $team_details->dr_name =htmlspecialchars($request->getdrname, ENT_QUOTES, 'UTF-8');
                        $team_details->dr_contact_number =htmlspecialchars($request->getdrcontact, ENT_QUOTES, 'UTF-8');
                        $team_details->save();
                        $team_detailss = new Team_participation;
                        $team_detailss->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
                        $team_detailss->event_id =htmlspecialchars($request->id, ENT_QUOTES, 'UTF-8');
                        $team_detailss->save();
                        foreach ($request->emailp as $email){
                            $mem_id = User::where('email',$email)->first();
                            $team_detailsss = new Team_members;
                            $team_detailsss->team_id =htmlspecialchars($team_id, ENT_QUOTES, 'UTF-8');
                            $team_detailsss->user_id =htmlspecialchars($mem_id ->id, ENT_QUOTES, 'UTF-8');
                            $team_detailsss->save();
                            $team_detailssss = new solo_participation;
                            $team_detailssss->event_id =htmlspecialchars($request->id, ENT_QUOTES, 'UTF-8');
                            $team_detailssss->user_id =htmlspecialchars($mem_id ->id, ENT_QUOTES, 'UTF-8');
                            $team_detailssss->save();
                            try{
                                $title='Event Confimation Mail';
                                $email=$email;
                                $dataa=['title'=>$title,'email'=>$email,'event_name'=>$events_name->e_name];
                    
                                Mail::send('Email.emailverification',$dataa,function($message)use($dataa){
                                    $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                                    $message->to($dataa['email']);
                                } );
                            }catch(\Swift_TransportException $e){
                                $response = $e->getMessage() ;
            
                            }
                            $success_output = 'You have register Successfully For The Event !';  
                        }
                    }else{
                        $error_array[] = "User".$request->getleaderemail." Is Not Register On website Kindly Register";
                    }
                }else{
                    $error_array[] = "User".$email." Is Not Register On website Kindly Register";
                }
            }
        }  
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item = Events::findorFail($request->id);
        $getitem = Events::where('id',$request->id)->first();
        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Item fetch successfully', 'ResponseData' => $getitem], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            'getcat_id' => 'required',
            'getevent_name' => 'required',
            'getvenue' => 'required',
            'getdate' => 'required',
            'gettime' => 'required',
            'gettype' => 'required',
            'getteam_size' => 'required',
            'getgender' => 'required',
            'getregister_by' => 'required',
            'getcoordinator_name' => 'required',
            'getcoordinator_no' => 'required',
            'getdescription' => 'required',
            'getrules' => 'required',
            'getguidelines' => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
            // dd($error_array);
        }
        else
        {
            $event = new Events;
            $event->exists = true;
            $event->id = $request->id;
            $event->e_category =htmlspecialchars($request->getcat_id, ENT_QUOTES, 'UTF-8');
            $event->e_name =htmlspecialchars($request->getevent_name, ENT_QUOTES, 'UTF-8');
            $event->e_venue =htmlspecialchars($request->getvenue, ENT_QUOTES, 'UTF-8');
            $event->e_date =htmlspecialchars($request->getdate, ENT_QUOTES, 'UTF-8');
            $event->e_time =htmlspecialchars(date('h:i a', strtotime($request->gettime)), ENT_QUOTES, 'UTF-8');
            $event->e_type =htmlspecialchars($request->gettype, ENT_QUOTES, 'UTF-8');
            $event->e_team_size =htmlspecialchars($request->getteam_size, ENT_QUOTES, 'UTF-8');
            $event->e_gender =htmlspecialchars($request->getgender, ENT_QUOTES, 'UTF-8');
            $event->e_parti =htmlspecialchars($request->getregister_by, ENT_QUOTES, 'UTF-8');
            $event->e_c_name =htmlspecialchars($request->getcoordinator_name, ENT_QUOTES, 'UTF-8');
            $event->e_c_contact =htmlspecialchars($request->getcoordinator_no, ENT_QUOTES, 'UTF-8');
            $event->e_description =htmlspecialchars($request->getdescription, ENT_QUOTES, 'UTF-8');
            $event->e_rules =htmlspecialchars($request->getrules, ENT_QUOTES, 'UTF-8');
            $event->e_guidlines =htmlspecialchars($request->getguidelines, ENT_QUOTES, 'UTF-8');
            if(empty($request->prize) || strtolower($request->getprize) =="intra"){
                $event->e_prize =htmlspecialchars("", ENT_QUOTES, 'UTF-8');
            }else{
                $event->e_prize =htmlspecialchars($request->getprize, ENT_QUOTES, 'UTF-8');
            }
            $event->save();

            $success_output = 'Item updated Successfully!';
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    


    public function status(Request $request)
    { 
        $UpdateDetails = Events::where('id', $request->id)->delete();
        if ($UpdateDetails) {
            return 2;
        } else {
            return 0;
        }
    }
}
