<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\hod_dep;
use Validator;
use Auth;
class DrsController extends Controller
{
    public function index() {
        $role = Auth::user()->profile_image;
        $type = Auth::user()->type;
        if($type == 1){
            $gethod = User::where('type','=','4')->get();
            $get_hod_details = hod_dep::with('User')->get();
            $auth_user_d = Auth::user();
            return view('admin.drs', compact('get_hod_details','gethod','auth_user_d'));
        }else{
            return view('404.index');
        }
    }

    public function list()
    {
        $get_hod_details = hod_dep::with('User')->get();
        return view('theme.drstable',compact('get_hod_details'));
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
          'hod_name' => 'required',
          'dr_name_b' => 'required',
          'dr_contact_b' => 'required',
          'dr_name_g' => 'required',
          'dr_contact_g' => 'required',
          'department_name' => 'required',
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
            $hod = new hod_dep;
        
            $hod->user_id =htmlspecialchars($request->hod_name, ENT_QUOTES, 'UTF-8');
            $hod->department_name =htmlspecialchars($request->dr_name_b, ENT_QUOTES, 'UTF-8');
            $hod->dr_name =htmlspecialchars($request->dr_contact_b, ENT_QUOTES, 'UTF-8');
            $hod->dr_con =htmlspecialchars($request->dr_name_g, ENT_QUOTES, 'UTF-8');
            $hod->cr_name =htmlspecialchars($request->dr_contact_g, ENT_QUOTES, 'UTF-8');
            $hod->cr_con =htmlspecialchars($request->department_name, ENT_QUOTES, 'UTF-8');
            $hod->save();

            $success_output = 'DR Added Successfully!';
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
        $item = hod_dep::findorFail($request->id);
        $getitem = hod_dep::where('id',$request->id)->first();
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

    


    public function status(Request $request)
    { 
        $UpdateDetails = hod_dep::where('id', $request->id)->delete();
        if ($UpdateDetails) {
            return 2;
        } else {
            return 0;
        }
    }
}
