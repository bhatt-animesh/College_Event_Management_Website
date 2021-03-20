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

class EventsController extends Controller
{
    public function index() {
        $role = Auth::user()->profile_image;
        $type = Auth::user()->type;
        if($type == 1 || $type == 3){
            $getcategory = Category::where('is_available','1')->get();
            $getitem = Events::with('category')->get();
            $auth_user_d = Auth::user();
            return view('admin.events', compact('getcategory','getitem','auth_user_d'));
        }else{
            return view('404.index');
        }
    }

    public function list()
    {
        $getitem = Events::with('category')->get();
        return view('theme.eventstable',compact('getitem'));
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
          'cat_id' => 'required',
          'event_name' => 'required',
          'venue' => 'required',
          'date' => 'required',
          'time' => 'required',
          'e_time' => 'required',
          'type' => 'required',
          'team_size' => 'required',
          'gender' => 'required',
          'register_by' => 'required',
          'coordinator_name' => 'required',
          'coordinator_no' => 'required',
          'description' => 'required',
          'rules' => 'required',
          'guidelines' => 'required',
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
            $events = new Events;
        
            $events->e_category =htmlspecialchars($request->cat_id, ENT_QUOTES, 'UTF-8');
            $events->e_name =htmlspecialchars($request->event_name, ENT_QUOTES, 'UTF-8');
            $events->e_venue =htmlspecialchars($request->venue, ENT_QUOTES, 'UTF-8');
            $events->e_date =htmlspecialchars($request->date, ENT_QUOTES, 'UTF-8');
            $events->e_time =htmlspecialchars(date('h:i a', strtotime($request->time)), ENT_QUOTES, 'UTF-8');
            $events->e_time_e =htmlspecialchars(date('h:i a', strtotime($request->e_time)), ENT_QUOTES, 'UTF-8');
            $events->e_type =htmlspecialchars($request->type, ENT_QUOTES, 'UTF-8');
            $events->e_team_size =htmlspecialchars($request->team_size, ENT_QUOTES, 'UTF-8');
            $events->e_gender =htmlspecialchars($request->gender, ENT_QUOTES, 'UTF-8');
            $events->e_parti =htmlspecialchars($request->register_by, ENT_QUOTES, 'UTF-8');
            $events->e_c_name =htmlspecialchars($request->coordinator_name, ENT_QUOTES, 'UTF-8');
            $events->e_c_contact =htmlspecialchars($request->coordinator_no, ENT_QUOTES, 'UTF-8');
            $events->e_description =htmlspecialchars($request->description, ENT_QUOTES, 'UTF-8');
            $events->e_rules =htmlspecialchars($request->rules, ENT_QUOTES, 'UTF-8');
            $events->e_guidlines =htmlspecialchars($request->guidelines, ENT_QUOTES, 'UTF-8');
            if(empty($request->prize) || strtolower($request->prize) =="intra"){
                $events->e_prize =htmlspecialchars("", ENT_QUOTES, 'UTF-8');
            }else{
                $events->e_prize =htmlspecialchars($request->prize, ENT_QUOTES, 'UTF-8');
            }
            $events->save();

            if ($request->hasFile('file')) {
                $files = $request->file('file');
                foreach($files as $file){

                    $eventsimage = new EventsImages;
                    $image = 'events-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    

                    $file->move('public/images/events', $image);

                    // dd($image);
                    $eventsimage->events_id =$events->id;
                    $eventsimage->image =$image;
                    $eventsimage->save();
                }
            }

            $success_output = 'Event Added Successfully!';
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

    public function export($type) {
        if($type == '1') {
            $employees = Events::where('e_category','1')->get();
            $fileName = "Sports_Events_list.xlsx";
        }else if($type == '2') {
            $employees = Events::where('e_category','2')->get();
            $fileName = "Technical_Events_list.xlsx";
        }else if($type == '3') {
            $employees = Events::where('e_category','3')->get();
            $fileName = "Cultural_Events_list.xlsx";
        }else if($type == '4') {
            $employees = Events::all();
            $fileName = "Events_list.xlsx";
        }
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Name');
            $sheet->setCellValue('B1', 'Venue');
            $sheet->setCellValue('C1', 'Date');
            $sheet->setCellValue('D1', 'Time');
            $sheet->setCellValue('E1', 'Team Size');
            $sheet->setCellValue('F1', 'Gender');
            $sheet->setCellValue('G1', 'C Name');
            $sheet->setCellValue('H1', 'C Contact');
            $rows = 2;
        foreach($employees as $empDetails){
            $sheet->setCellValue('A' . $rows, $empDetails['e_name']);
            $sheet->setCellValue('B' . $rows, $empDetails['e_venue']);
            $sheet->setCellValue('C' . $rows, $empDetails['e_date']);
            $sheet->setCellValue('D' . $rows, $empDetails['e_time']);
            $sheet->setCellValue('E' . $rows, $empDetails['e_team_size']);
            $sheet->setCellValue('F' . $rows, $empDetails['e_gender']);
            $sheet->setCellValue('G' . $rows, $empDetails['e_c_name']);
            $sheet->setCellValue('H' . $rows, $empDetails['e_c_contact']);
            $rows++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $writer->save("public/export/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        return redirect(url('/admin/events'));
        }

}
