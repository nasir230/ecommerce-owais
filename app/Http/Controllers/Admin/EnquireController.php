<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;
use App\Department;
use App\Enquire;
use Illuminate\Support\Facades\Gate;

class EnquireController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
         $modules = Enquire::all();
         return view('admin.enquires.index',compact('modules'));
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
      $module = Enquire::Find($id);
      return view('admin.enquires.view',compact('module'));
    }


    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $module= Enquire::Find($id);
        try {
            $module->delete();
            return redirect()->route('admin.enquires.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.enquires.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }
    }

  

}
