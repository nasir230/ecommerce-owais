<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
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
         $modules = News::all();
         return view('admin.news.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module= News::all();
        return view('admin.news.create',compact('module'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:news,title',
        ]);

        // logo
        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
         }else{
            $logo = null;
         }

         News::create([
            'title' => $request->title,
            'details' => $request->details,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'slug' => str_replace(' ', '-', strtolower($request->title)),
            'thumbnail' => $logo,
        ]);

        return redirect()->route('admin.news.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = News::Find($id);
        return view('admin.news.edit',compact('module'));
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
        $module = News::Find($id);
        $request->validate([
            'title' => 'required|unique:news,title,'.$module->id,
        ]);

        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
            $module->thumbnail = $logo;
         }

        $module->title = $request->title;
        $module->details = $request->details;
        $module->excerpt = $request->excerpt;
        $module->status = $request->status;
        $module->slug = str_replace(' ', '-', strtolower($request->title));
        $module->save();

        return redirect()->route('admin.news.index')->with('success','Updated');
    }

    public function view($id)
    {
      $module = News::Find($id);
      return view('admin.news.view',compact('module'));
    }

    public function delete($id)
    {
       $module= News::Find($id);
      try {
            $module->delete();
            return redirect()->route('admin.news.index');
           
        } catch (\Throwable $th) {
            return redirect()->route('admin.news.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }
    }



}