<?php
namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Solo_participation;
use App\Team_participation;
use App\Events;

class EventsController extends Controller
{
    public function sports()
    {
        $events_intra = Events::with('category')->where('e_category','=','1')->get();
        return view('usertheme.event_list',compact('events_intra'));
    }

    public function technical()
    {
        $events_intra = Events::with('category')->where('e_category','=','2')->get();
        return view('usertheme.event_list',compact('events_intra'));
    }

    public function myevents()
    {
        $auth_user_d_id = Auth::user()->id;
        $events_intra = Events::with('category')->where('e_category','=','2')->get();
        return view('usertheme.event_list',compact('events_intra'));
    }

    public function cultural()
    {
        $events_intra = Events::with('category')->where('e_category','=','3')->get();
        return view('usertheme.event_list',compact('events_intra'));
    }

    public function show(Request $request)
    {
        $auth_user_d = Auth::user();
         $getparti = "";
        if(isset($auth_user_d)){
            $getparti = Solo_participation::where('event_id','=',$request->id)->first();
            if(isset($getparti)){
                $a = $getparti->user_id;
                //$b = $auth_user_d->id;
                $b = strval($auth_user_d->id);
            if($a == $b){
                
                    $getpartii = "yes";
            }else{
                $getpartii = "yes";
                }
            }else{
               $getpartii = "noo";
            }
        }else{
            $getpartii = "";
        }
        $item = Events::findorFail($request->id);
        $getitem = Events::where('id',$request->id)->first();
        

        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'data fetch successfully', 'ResponseData' => $getitem,'par' => $getpartii], 200);
    }

}
