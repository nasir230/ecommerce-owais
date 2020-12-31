<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
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
         $modules = Event::all();
         return view('admin.events.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module= Event::all();
        return view('admin.events.create',compact('module'));
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
            'title' => 'required|max:255|unique:events,title',
        ]);


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

        // thumbnail
        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $thumbnail = 'admin/upload/'.$new_name;

         }else{ $thumbnail = null; }

         Event::create([
            'title' => $request->title,
            'date' => date('Y-m-d', strtotime($request->date)),
            'type' => $request->type,
            'details' => $request->details,
            'slug' => str_replace(' ', '-', strtolower($request->title)),
            'thumbnail' => $thumbnail,
            'video' => $request->video,
            'gallery' => implode(",",$gimg),
            'excerpt' => $request->excerpt,
            ]);

        return redirect()->route('admin.events.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $module = Event::Find($id);
        return view('admin.events.edit',compact('module'));
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
        $module = Event::Find($id);
        $request->validate([
            'title' => 'required|unique:events,title,'.$module->id,
        ]);

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
    
        // Thumbnail
        if($request->hasFile('upload')){ 
            $image = $request->file('upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $logo = 'admin/upload/'.$new_name;
            $module->thumbnail = $logo;
         }

        $module->title = $request->title;
        $module->date = date('Y-m-d', strtotime($request->date));
        $module->type = $request->type;
        $module->video = $request->video;
        $module->slug = str_replace(' ', '-', strtolower($request->title));
        $module->save();

        return redirect()->route('admin.events.index')->with('success','Updated');
    }

    public function view($id)
    {
      $module = Event::Find($id);
      return view('admin.events.view',compact('module'));
    }

    public function delete($id)
    {
        
       $module= Event::Find($id);
      try {
            $module->delete();
            return redirect()->route('admin.events.index');
           
        } catch (\Throwable $th) {
            return redirect()->route('admin.events.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }
    }


}
