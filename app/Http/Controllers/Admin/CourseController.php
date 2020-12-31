<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;
use App\Department;
use App\Course;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
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

         $modules = Course::all();
         return view('admin.courses.index',compact('modules'));
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

        $department= Department::all();
        $university= University::all();

        return view('admin.courses.create',compact('department','university'));
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

        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;

         }else{
            $logo = null;
         }

        Course::create([
            'name' => $request->name,
            'url' => $request->url,
            'university_id' => $request->university_id,
            'type' => $request->type,
            'details' => $request->details,
            'logo' => $logo,
        ]);

        return redirect()->route('admin.courses.index')->with('success','Created Successfully');
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

        $module = Course::Find($id);
        $department= Department::all();
        $university= University::all();
        
        return view('admin.courses.edit',compact('module','department','university'));
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
      
         $module = Course::Find($id);
         if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
            $module->logo = $logo;
         }

         $module->name = $request->name;
         $module->url = $request->url;
         $module->university_id = $request->university_id;
         $module->details = $request->details;
         $module->type = $request->type;
         $module->save();

        return redirect()->route('admin.courses.index')->with('success','Updated');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $module = Course::Find($id);

      return view('admin.courses.view',compact('module'));

    }


    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
       $module= Course::Find($id);
        try {

            $module->delete();
            return redirect()->route('admin.courses.index');
           
        } catch (\Throwable $th) {
            
            return redirect()->route('admin.courses.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }
    }


}
