<?php
namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use User;
class VerifyController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function otpp()
    {
        return view('user.verify');
    }

    public function otp(Request $request )
    {
        $validation = Validator::make($request->all(),[
            'otp' => 'required',
            'email' => 'required',
          ]);
          $error_array = array();
          $success_output = '';
          if ($validation->fails())
          {
              foreach($validation->messages()->getMessages() as $field_name => $messages)
              {
                  $error_array[] = $messages;
              }
          }else
          {
            
            $checkuser=User::where('email',$request->email)->first();
            if (!empty($checkuser)) {
                if ($checkuser->otp == $request->otp) {
                    $update=User::where('email',$request['email'])->update(['otp'=>NULL,'is_verified'=>'1']);
                    $success_output = "Email has been verified";
                }else {
                    $error_message = "Invalid OTP Please Try Again.";
                } 
            }else {
                $error_message = "Invalid Email Address";
            }
          }
          $output = array(
              'error_message' => $error_message,
              'error'     =>  $error_array,
              'success'   =>  $success_output
          );
          echo json_encode($output);
    }
}
