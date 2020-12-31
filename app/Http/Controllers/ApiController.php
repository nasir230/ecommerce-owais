<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;

class ApiController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function Auth()
    {
        // $userInfo= auth('api')->user();

        // if ($userInfo !== null)
        // {
        //     return "User is logged in. id:".$userInfo->id;
        // }else{
        //     return "User is not logged in.";
        // }

        // $user = Auth::user();
        // dd($user);
        // return response()->json(['User'=>$user]);
    
    }
    
}
