<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\University;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
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

        // if (Gate::denies('departments.access','none')) {
            
        //     return redirect()->route('admin.home')->with('warning','You dont have permission');  
        //  }

         $departments = Department::all();
         return view('admin.departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (Gate::denies('roles.create','none')) {
        //     return redirect()->route('admin.home')->with('warning','You dont have permission');  
        //  }

        return view('admin.departments.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Gate::denies('roles.create','none')) {
        //     return redirect()->route('admin.home')->with('warning','You dont have permission');  
        //  }

        Department::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.departments.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (Gate::denies('roles.edit','none')) {
            
        //     return redirect()->route('admin.home')->with('warning','You dont have permission');  
        //  }

        $module = Department::Find($id);
       
        
        return view('admin.departments.edit',compact('module'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // if (Gate::denies('roles.edit','none')) {
            
        //     return redirect()->route('admin.home')->with('warning','You dont have permission');  
        //  }

        $module = Department::Find($id);
            
        //  dd();
        $module->name = $request->name;

        $module->save();

        return back()->with('success','Updated');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $module = Department::Find($id);

      return view('admin.departments.view',compact('module'));

    }


    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

      $department= Department::Find($id);
      $uni = University::all();
       foreach ($uni as $key => $value) {
          $ex = explode(",",$value->department_id);
          if(in_array($id,$ex)){
           return redirect()->route('admin.departments.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
          }
          
        }
        
        $department->delete();
        return redirect()->route('admin.departments.index');

    }


}
