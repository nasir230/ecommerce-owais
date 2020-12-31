<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Category;
class CategoryController extends Controller
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
         $modules = Category::where('parent',0)->get();
         return view('admin.categories.index',compact('modules'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sub()
    {
        $modules = Category::where('parent','!=',0)->get();
        return view('admin.categories.sub',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Category::where('parent',0)->get();
        return view('admin.categories.create',compact('modules'));
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
            'title' => 'required|max:255|unique:categories,title',
        ]);

        if($request->hasFile('thumbnail')){ 
            $image = $request->file('thumbnail');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $thumbnail = 'admin/upload/'.$new_name;
         }else{ $thumbnail = null; }

        Category::create([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', strtolower($request->title)),
            'parent' =>  $request->parent,
            'excerpt' => $request->excerpt,
            'thumbnail' => $thumbnail,
        ]);
        return redirect()->route('admin.categories.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Category::Find($id);
        $modules = Category::where('parent',0)->get(); 
        return view('admin.categories.edit',compact('module','modules'));
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

        $module = Category::Find($id);
        $request->validate([
            'title' => 'required|unique:categories,title,'.$module->id,
        ]);

         if($request->hasFile('thumbnail')){ 
            $image = $request->file('thumbnail');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $thumbnail = 'admin/upload/'.$new_name;
            $module->thumbnail = $thumbnail;
         }

         $module->title = $request->title;
         $module->slug = str_replace(' ', '-', strtolower($request->title));
         $module->parent = $request->parent;
         $module->excerpt = $request->excerpt;
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
        
       $module = Category::Find($id);
       $parent = Category::where('parent',$id)->get();
       if(count($parent) > 0 ){

           return back()->with('warning','Can Not Delete Data is Used Some Where');
       
        }else{

            try {
                $module->delete();
                return back()->with('success','Deleted');
               
            } catch (\Throwable $th) {
                return back()->with('warning','Can Not Delete Data is Used Some Where');
            }
            
        }
    
    }
}
