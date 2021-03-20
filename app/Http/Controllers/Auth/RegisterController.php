<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(poornima)\.edu\.in$/ix'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'mobile' => ['required','min:10','unique:users'],
                'gender' => ['required'],
                'college_id' => ['required']
            ],[ 'email.regex' => 'Invalid Poornima Email ID.']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $otp = mt_rand(100000, 999999);
        try{
            $title='Email Verification Code';
            $email=$data['email'];
            $dataa=['title'=>$title,'email'=>$email,'otp'=>$otp];

            Mail::send('Email.emailverification',$dataa,function($message)use($dataa){
                $message->from(env('MAIL_USERNAME'))->subject($dataa['title']);
                $message->to($dataa['email']);
            } );
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'profile_image' => 'student',
                'password' => Hash::make($data['password']),
                'mobile' => $data['mobile'],
                'gender' => $data['gender'],
                'college_id' => strtoupper($data['college_id']),
                'college' => "Poornima University",
                'is_verified' => '2',
                'otp' => $otp,
            ]);
        }catch(\Swift_TransportException $e){
            echo $response = $e->getMessage() ;
            return FALSE;
        }
            
        
    }
}
