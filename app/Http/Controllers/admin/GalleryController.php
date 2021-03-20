<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use Auth;
use Validator;


class GalleryController extends Controller
{
    public function index()
    {
        $type = Auth::user()->type;
        $profile_image = Auth::user()->profile_image;
        if($type == 4 && $profile_image == "sma"){
            $auth_user_d = Auth::user();
            $gallery = Gallery::all();
            return view('admin.gallery',compact('gallery','auth_user_d'));
        }elseif($type == 1){
            $auth_user_d = Auth::user();
            $gallery = Gallery::all();
            return view('admin.gallery',compact('gallery','auth_user_d'));
        }
        else{
            return view('404.index');
        }
        
    }

    public function list()
    {
        $gallery = Gallery::all();
        return view('theme.gallerytable',compact('gallery'));
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
          'image' => 'required|image|mimes:jpeg,png,jpg',
          'day' => 'required',
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
            $image = 'gallery-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('public/images/gallery', $image);

            $gallery = new Gallery;
            $gallery->day=htmlspecialchars($request->day, ENT_QUOTES, 'UTF-8');
            $gallery->profile_image =$image;
            $gallery->save();
            $success_output = 'Image Added Successfully!';
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }


    public function show(Request $request)
    {
        $banner = Gallery::findorFail($request->id);
        $getbanner = Gallery::where('id',$request->id)->first();
        if($getbanner->image){
            $getbanner->img=url('public/images/gallery/'.$getbanner->profile_image);
        }
        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Banner fetch successfully', 'ResponseData' => $getbanner], 200);
    }


    public function destroy(Request $request)
    {
        $getbanner = Gallery::where('id',$request->id)->first();

        unlink(public_path('images/gallery/'.$getbanner->profile_image));

        $banner= Gallery::where('id', $request->id)->delete();
        if ($banner) {
            return 1;
        } else {
            return 0;
        }
    }
}
