<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 8/15/17
 * Time: 12:14 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserByApiKey(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'result' => $user
        ]);
    }



}