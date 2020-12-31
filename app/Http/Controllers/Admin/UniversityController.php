<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;
use App\Department;
use Illuminate\Support\Facades\Gate;

class UniversityController extends Controller
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

         $modules = University::all();
         return view('admin.universities.index',compact('modules'));
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

        return view('admin.universities.create',compact('department'));
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


        // logo
         
        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
         }else{
            $logo = null;
         }

         if($request->hasFile('upload1')){ 
            $image = $request->file('upload1');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $cover = 'admin/upload/'.$new_name;
         }else{
            $cover = null;
         }

        $department = implode(",",$request->department_id);

        University::create([
            'name' => $request->name,
            'details' => $request->details,
            'email' => $request->email,
            'department_id' => $department,
            'address' => $request->address,
            'phone' => $request->phone,
            'color' => $request->color,
            'logo' => $logo,
            'cover' => $cover,
        ]);

    
        return redirect()->route('admin.universities.index')->with('success','Created Successfully');
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

        $module = University::Find($id);
        $department= Department::all();
        
        return view('admin.universities.edit',compact('module','department'));
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
        // dd($request);

        
        $department = implode(",",$request->department_id);
        $module = University::Find($id);

        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
            $module->logo = $logo;
         }

         if($request->hasFile('upload1')){ 
            $image = $request->file('upload1');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $cover = 'admin/upload/'.$new_name;
            $module->cover = $cover;
         }

        $module->name = $request->name;
        $module->details = $request->details;
        $module->email = $request->email;
        $module->department_id = $department;
        $module->address = $request->address;
        $module->phone = $request->phone;
        $module->color = $request->color;
        $module->save();

        return redirect()->route('admin.universities.index')->with('success','Updated');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $module = University::Find($id);

      return view('admin.universities.view',compact('module'));

    }

     /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function department($id)
    {   
         $module = University::Find($id);
         $dep_id = explode(",",$module->department_id);
         $departmetns = Department::whereIn('id',$dep_id)->get();
         $modules = $departmetns;

       return view('admin.universities.departments',compact('modules','module'));

    }

     /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function d_view($uni,$id)
    {   
        $p = University::find($uni);
        $module = Department::find($id);        
       return view('admin.universities.viewDepartment',compact('module','p'));

    }

     /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function d_edit($uni,$id)
    {   
        $p = University::find($uni);
        $module = Department::find($id);        
       return view('admin.universities.editDepartments',compact('module','p'));

    }

       /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function d_update(Request $request,$id)
    {   

        $module = Department::Find($id);
        $module->head = $request->head;
        $module->phone = $request->phone;
        $module->email = $request->email;
        $module->date = date('Y-m-d', strtotime($request->date));
        $module->total_employ = $request->total_employ;
        $module->details = $request->details;
        $module->save();
    
        return back()->with('success','Updated');

    }



    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
       $module= University::Find($id);

        try {

            $module->delete();
            return redirect()->route('admin.universities.index');
           
        } catch (\Throwable $th) {
            
            return redirect()->route('admin.universities.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }

    }


}
