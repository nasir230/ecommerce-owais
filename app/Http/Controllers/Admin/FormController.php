<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Form;
use Auth;

class FormController extends Controller
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
      
         $modules = Form::all();
         
         return view('admin.forms.index',compact('modules'));
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Gallery
        $gimg = [];
        if($request->hasFile('gallery')){ 
           foreach ($request->gallery as $key => $value) {
               $gallery = $request->file('gallery')[$key];
               $gallery_name = rand() . '.' . $gallery->getClientOriginalExtension();
               $gallery->move(public_path('admin/upload/'), $gallery_name);
               $g = 'admin/upload/'.$gallery_name;
               array_push($gimg,$g);
           }
         }

          $ticket = Form::create([
              'title' => $request->title,
              'age' => $request->age,
              'excerpt' => $request->excerpt,
              'user_id' =>  $request->user_id,
              'quantity' => $request->quantity,
              'price' => $request->price,
              'gallery' => implode(",",$gimg),
              'status' => 'Approved',
              'pr_condition' => $request->pr_condition,
              'token' => rand(),
          ]);

        return redirect()->route('admin.forms.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Form::find($id); 
        return view('admin.forms.edit',compact('modules'));
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
       
        $module = Form::Find($id);
      
        // Gallery
        $gimg = [];
        if($request->hasFile('gallery')){ 
             foreach ($request->gallery as $key => $value) {
                 $gallery = $request->file('gallery')[$key];
                 $gallery_name = rand() . '.' . $gallery->getClientOriginalExtension();
                 $gallery->move(public_path('admin/upload/'), $gallery_name);
                 $g = 'admin/upload/'.$gallery_name;
                 array_push($gimg,$g);
             }
              $module->gallery = implode(",",$gimg);
        }

        $module->title = $request->title;
        $module->age = $request->age;
        $module->excerpt = $request->excerpt;
        $module->quantity = $request->quantity;
        $module->price = $request->price;
        $module->status = $request->status;
        $module->pr_condition = $request->pr_condition;
       
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
        $module= Form::Find($id);
        try {

            $module->delete();
            return redirect()->route('admin.forms.index');

        } catch (\Throwable $th) {
            
            return redirect()->route('admin.forms.index')->with('warning','Can Not Delete Data is Used Some Where');
        }
    }

}
