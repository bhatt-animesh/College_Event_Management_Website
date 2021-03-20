<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Favorite;
use App\User;
use App\Events;
use App\ItemImages;
use Illuminate\Support\Facades\DB;
use Validator;

class ItemController extends Controller
{
    public function item(Request $request)
    {
        if($request->cat_id == ""){
            return response()->json(["status"=>0,"message"=>"category is required"],400);
        }

        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>"User is required"],400);
        }        

        $itemdata = Events::where('e_category','=',$request['cat_id'])->orderBy('id', 'DESC')->paginate(30);


        if(!empty($itemdata))
        {
        	return response()->json(['status'=>1,'message'=>'Item Successful','data'=>$itemdata],200);
        }
        else
        {
            return response()->json(['status'=>0,'message'=>'No data found'],200);
        }
    }


    public function searchitem(Request $request)
    {

        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>"User is required"],400);
        }

        if($request->keyword == ""){
            return response()->json(["status"=>0,"message"=>"Keyword is required"],400);
        }


        $itemdata = Events::where('e_name','LIKE', '%' . $request['keyword'] . '%')->orderBy('id', 'DESC')->paginate(10);

        if(!$itemdata->isEmpty())
        {
            return response()->json(['status'=>1,'message'=>'Item Successful','data'=>$itemdata],200);
        }
        else
        {
            return response()->json(['status'=>0,'message'=>'No data found'],200);
        }
    }

}