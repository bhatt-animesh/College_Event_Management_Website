<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use App\Category;
use App\Events;
use App\EventsImages;
use Validator;
use Auth;

class ParticipatelistController extends Controller
{
    public function sports() {
        $role = Auth::user()->profile_image;
        $type = Auth::user()->type;
        if($type == 1 || $type == 3){
            $getcategory = Category::where('is_available','1')->get();
            $getitem = Events::with('category')->get();
            $auth_user_d = Auth::user();
            return view('admin.parti_sports', compact('getcategory','getitem','auth_user_d'));
        }else{
            return view('404.index');
        }
    }
}
