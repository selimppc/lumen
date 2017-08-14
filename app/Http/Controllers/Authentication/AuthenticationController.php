<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class AuthenticationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         #$this->middleware('auth');
    }


    /**
     * Login method.
     * @param $request
     * @return void
     */
    public function authenticate(Request $request)
    {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required'
            ]);

            $user = User::where(function($query) use ($request){
                          $query->where('username', $request->input('username'));
                          $query->orWhere('email', $request->input('username'));
                      })->first();

            if(Hash::check($request->input('password'), $user->password))
            {
                $apikey = base64_encode(str_random(40));

                User::where(function($query) use ($request){
                          $query->where('username', $request->input('username'));
                          $query->orWhere('email', $request->input('username'));
                      })->update(['api_key' => "$apikey"]);

                return response()->json(['status' => 'success','api_key' => $apikey]);

            }else{
                return response()->json(['status' => 'fail'],401);
            }

    }











}
