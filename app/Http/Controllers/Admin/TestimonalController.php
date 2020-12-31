<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonal;
use Illuminate\Support\Facades\Gate;

class TestimonalController extends Controller
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
         $modules = Testimonal::all();
         return view('admin.testimonals.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $module= Testimonal::all();
        return view('admin.testimonals.create',compact('module'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        // logo
        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
         }else{
            $logo = null;
         }

         Testimonal::create([
            'name' => $request->name,
            'type' => $request->type,
            'details' => $request->details,
            'thumbnail' => $logo,
        ]);

        return redirect()->route('admin.testimonals.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $module = Testimonal::Find($id);      
        return view('admin.testimonals.edit',compact('module'));
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
        $module = Testimonal::Find($id);
   
        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
            $module->thumbnail = $logo;
         }

        $module->name = $request->name;
        $module->type = $request->type;
        $module->details = $request->details;
        $module->save();

        return redirect()->route('admin.testimonals.index')->with('success','Updated');
    }

    public function view($id)
    {
      $module = Testimonal::Find($id);
      return view('admin.testimonals.view',compact('module'));
    }

    public function delete($id)
    {
       $module= Testimonal::Find($id);
      try {
            $module->delete();
            return redirect()->route('admin.testimonals.index');
           
        } catch (\Throwable $th) {
            return redirect()->route('admin.testimonals.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }
    }



}