<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;
use App\Department;
use App\User;
use App\Role;
use App\FileManager;
use Auth;
use Illuminate\Support\Facades\File; 


use Illuminate\Support\Facades\Gate;

class FileManagerController extends Controller
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
        
      $filemanager = FileManager::all();
      return view('admin.filemanager.index',compact('filemanager'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allfiles()
    {
        
      $filemanager = FileManager::all();
      
     return response()->json($filemanager);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        
      // fields
       $extension;
       $size;
       $name;
       $path;
       $new_name;
       
        if($request->hasFile('file')){ 
           $image = $request->file('file');
           $size = $image->getSize();
           $extension = $image->getClientOriginalExtension();
           $name = explode(".",$image->getClientOriginalName(), 2)[0];
           $new_name = $name.rand();
           $image->move(public_path('admin/upload/'),$new_name.'.'.$extension);
           $path = 'admin/upload/'.$new_name.'.'.$extension;
        }
        
        FileManager::create([
             'extension' =>  $extension,
             'user_id' => Auth::user()->id,
             'size' => $size,
             'title' => $name,
             'name' => $new_name,
             'url' => $path,
            ]);
        
        return back()->with('success','Updated');
    }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
      $filemanager = FileManager::find($id);
      
      if(File::delete(public_path().'/'.$filemanager->url)){
          $filemanager->delete();
          return back()->with('success','Deleted');
      }
      
    }


}
