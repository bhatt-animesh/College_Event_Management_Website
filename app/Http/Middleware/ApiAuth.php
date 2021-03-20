<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\BaseFunction;
use App\ApiSession;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token=$request->header('Authorization');
        $request['token']=$token;
        if(empty($token))
        {
            return response()->json(['status'=>'8','message'=>'Token is required'],400);
        }
        $check=ApiSession::where('session_id',$token)->first();
        if(empty($check))
        {
            return response()->json(['status'=>'9','message'=>'Invalid user'],400);
        }
        $user_data=BaseFunction::checkApiSession($token);
        if(empty($user_data))
        {
            return response()->json(['status'=>'9','message'=>'Invalid user'],400);
        }
        $request['user']=$user_data;

        return $next($request);
    }
}
