<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use Auth;

class DashboardController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckUserStatus');
            
    }

    public function index()
    {
        if (Gate::denies('modules.dashboard','none')) {
 
            return redirect()->route('admin.users.profile',Auth::user()->id)->with('warning','You dont have permission');  
         }

       return view('admin.Home');
    }

    public function test()
    {

       return view('admin.test');
    }
}
