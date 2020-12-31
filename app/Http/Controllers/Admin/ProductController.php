<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Product;
use App\Category;
use Auth;

class ProductController extends Controller
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
         $cat = Category::where('parent','!=',0)->get();
         $modules = Product::all();
         
         return view('admin.products.index',compact('modules','cat'));
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        $modules = Product::all();
        return view('admin.products.create',compact('modules','cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->has('keys')){
            foreach($request->keys as $k => $i){
                $data[$request->keys[$k]] = $request->vals[$k];
            }
        }else{
            $data = [];
        }

        $request->validate([
            'title' => 'required|max:255|unique:products,title',
        ]);

        if($request->hasFile('thumbnail')){ 
            $image = $request->file('thumbnail');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $thumbnail = 'admin/upload/'.$new_name;
         }else{ $thumbnail = null; }


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


       // dd($data);



        Product::create([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', strtolower($request->title)),
            'category_id' =>  $request->cat,
            'user_id' =>  Auth::user()->id,
            'excerpt' => $request->excerpt,
            'price' => $request->price,
            'thumbnail' => $thumbnail,
            'des' => $request->des,
            'old' => $request->old,
            'gallery' => implode(",",$gimg),
            'attributes' => serialize($data),
        ]);

        return redirect()->route('admin.products.index')->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::all();
        $modules = Product::find($id); 
        return view('admin.products.edit',compact('modules','cat'));
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
       
        $module = Product::Find($id);
        $request->validate([
            'title' => 'required|unique:products,title,'.$module->id,
        ]);

     
         if($request->hasFile('thumbnail')){ 
            $image = $request->file('thumbnail');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $thumbnail = 'admin/upload/'.$new_name;
            $module->thumbnail = $thumbnail;
         }

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

        if($request->has('keys')){
            foreach($request->keys as $k => $i){
                $data[$request->keys[$k]] = $request->vals[$k];
            }

            $module->attributes = serialize($data);
        }

         $module->title = $request->title;
         $module->slug = str_replace(' ', '-', strtolower($request->title));
         $module->category_id = $request->category_id;
         $module->excerpt = $request->excerpt;
         $module->price = $request->price;
         $module->des = $request->des;
         $module->old = $request->old;
        
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
        $module= Product::Find($id);
        try {

            $module->delete();
            return redirect()->route('admin.products.index');

        } catch (\Throwable $th) {
            
            return redirect()->route('admin.products.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }
    }



}
