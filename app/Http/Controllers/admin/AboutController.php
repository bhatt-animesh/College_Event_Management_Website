<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getabout = About::where('id','1')->first();
        return view('about',compact('getabout'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $error_array = array();
            $success_output = '';
            
            $about = new About;
            $about->exists = true;
            $about->id = '1';

            if(isset($request->image)){
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image = 'about-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('public/images/about', $image);
                    $about->image=$image;
                }            
            }

            if(isset($request->footer_logo)){
                if($request->hasFile('footer_logo')){
                    $footer_logo = $request->file('footer_logo');
                    $footer_logo = 'footer-' . uniqid() . '.' . $request->footer_logo->getClientOriginalExtension();
                    $request->footer_logo->move('public/images/about', $footer_logo);
                    $about->footer_logo=$footer_logo;
                }            
            }

            if(isset($request->favicon)){
                if($request->hasFile('favicon')){
                    $favicon = $request->file('favicon');
                    $favicon = 'favicon-' . uniqid() . '.' . $request->favicon->getClientOriginalExtension();
                    $request->favicon->move('public/images/about', $favicon);
                    $about->favicon=$favicon;
                }            
            }

            if(isset($request->logo)){
                if($request->hasFile('logo')){
                    $logo = $request->file('logo');
                    $logo = 'logo-' . uniqid() . '.' . $request->logo->getClientOriginalExtension();
                    $request->logo->move('public/images/about', $logo);
                    $about->logo=$logo;
                }            
            }

            $about->about_content =trim($request->about_content);
            $about->fb =$request->fb;
            $about->twitter =$request->twitter;
            $about->insta =$request->insta;
            $about->android =$request->android;
            $about->ios =$request->ios;
            $about->copyright =$request->copyright;
            $about->mobile =$request->mobile;
            $about->email =$request->email;
            $about->address =$request->address;
            $about->save();           

            $success_output = 'Content has been updated Successfully!';

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
    public function destroy($id)
    {
        //
    }
}
