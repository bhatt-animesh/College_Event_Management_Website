<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ourteam;
use Auth;
use Validator;

class OurteamController extends Controller
{
    public function index()
    {
        $type = Auth::user()->type;
        if($type == 1){
            $auth_user_d = Auth::user();
            $ourteam = Ourteam::all();
            return view('admin.ourteam',compact('ourteam','auth_user_d'));
        }else{
            return view('404.index');
        }
        
    }

    public function list()
    {
        $ourteam = Ourteam::all();
        return view('theme.ourteamtable',compact('ourteam'));
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
          'image' => 'required|image|mimes:jpeg,png,jpg',
          'name' => 'required',
          'c_name' => 'required',
          'mobile' => 'required',
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
            $image = 'ourteam-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('public/images/ourteam', $image);

            $ourteam = new Ourteam;
            $ourteam->name =htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8');
            $ourteam->committee_name =htmlspecialchars($request->c_name, ENT_QUOTES, 'UTF-8');
            $ourteam->mobile =htmlspecialchars($request->mobile, ENT_QUOTES, 'UTF-8');
            $ourteam->image =$image;
            $ourteam->save();
            $success_output = 'Team Member Added Successfully!';
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
        $banner = Ourteam::findorFail($request->id);
        $getbanner = Ourteam::where('id',$request->id)->first();
        if($getbanner->image){
            $getbanner->img=url('public/images/ourteam/'.$getbanner->image);
        }
        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Banner fetch successfully', 'ResponseData' => $getbanner], 200);
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
          'image' => 'required|image|mimes:jpeg,png,jpg',
          'name' => 'required',
          'c_name' => 'required',
          'mobile' => 'required',
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
            $ourteam = new Ourteam;
            $ourteam->exists = true;
            $ourteam->id = $request->id;

            if(isset($request->image)){
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image = 'ourteam-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('public/images/ourteam', $image);
                    $ourteam->image=$image;
                    $ourteam->name =htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8');
                    $ourteam->committee_name =htmlspecialchars($request->c_name, ENT_QUOTES, 'UTF-8');
                    $ourteam->mobile =htmlspecialchars($request->mobile, ENT_QUOTES, 'UTF-8');
                    unlink(public_path('images/ourteam/'.$request->old_img));
                }            
            }
            $banner->save();           

            $success_output = 'Team Member Info updated Successfully!';
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
    public function destroy(Request $request)
    {
        $getbanner = Ourteam::where('id',$request->id)->first();

        unlink(public_path('images/ourteam/'.$getbanner->image));

        $banner= Ourteam::where('id', $request->id)->delete();
        if ($banner) {
            return 1;
        } else {
            return 0;
        }
    }
}
