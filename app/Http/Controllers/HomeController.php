<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivacyPolicy;
use App\Category;
use App\User;
use App\Events;
use App\Addons;
use App\Ratting;
use App\Contact;
use App\Order;
use Auth;
use App\Solo_participation;
use App\Promocode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function policy() {
        $getprivacypolicy = PrivacyPolicy::where('id', '1')->first();
        return view('privacy-policy', compact('getprivacypolicy'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getcategory = Category::all();
        $getitems = Events::all();
        $get_parti = Solo_participation::all();
        $getusers = User::Where('type', '=' , '2')->get();
        $driver = User::Where('type', '=' , '3')->get();
        $getcategoryy = Category::where('is_available','1')->get();
        $getitem = Events::with('category')->where('events.created_at','LIKE','%' .date("Y-m-d") . '%')->get();
        return view('home',compact('getcategory','getitems','getitem','getcategoryy','addons','getusers','driver','contact','getreview','getorders','order_total','order_tax','getpromocode','todayorders','getdriver','get_parti'));
    }


    public function verify()
    {
        $auth_user_d = Auth::user();
        return view('auth.verify',compact('$auth_user_d'));
    }
}
