<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use Hash;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller

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
       if (Gate::denies('users.view_all','none')) {     
          return redirect()->route('admin.home')->with('warning','You Dont Have Permissions');
        }

        $users= User::all();
                
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('users.create','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        //
        $roles = Role::whereNotIn('name', ['super-admin'])->get();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('users.create','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permissions');  
         }

            $request->validate([
                'name' => 'required|string|max:255|unique:users',
                'email' =>'required|email|max:255|unique:users',
                'password' => 'required',
                
            ]);
        
            $user= User::create([
                
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'status' => 'approved'
            ]);
            
            $profile= Profile::create([
                  'user_id' => $user->id,
                  'nick_name' => $user->name
                ]);
                    
              return redirect()->route('admin.users.index')->with('success','Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {


       // return view('admin.users.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

       if (Gate::denies('users.edit','none')) {
            
           return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        $roles = Role::whereNotIn('name', ['super-admin'])->get();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if (Gate::denies('users.edit','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        $request->validate([
            'name' => 'required|min:3|unique:users,name,'.$user->id,
            'email' =>'required|email|max:255|unique:users,email,'.$user->id,
          
        ]);
        
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
     
        if($request->password != null){
          $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success','Updated');
        
    }

    // User Status
     public function block($id){
          if (Gate::denies('users.can_block','none')) {  
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }
          $users= User::find($id);
          $users->status = 'blocked';
          $users->save();
        return redirect()->route('admin.users.index')->with('success','Blocked');
     }

     public function approve($id){
         if (Gate::denies('users.can_approve','none')) {
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }
          $users= User::find($id);
          $users->status = 'approved';
          $users->save();
          return redirect()->route('admin.users.index')->with('success','Approved');
    }
    
    public function pending($id){
         if (Gate::denies('users.can_pending','none')) {
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }
          $users= User::find($id);
          $users->status = 'pending';
          $users->save();
          return redirect()->route('admin.users.index')->with('success','Pending');
    }

     public function disable($id){
          if (Gate::denies('users.can_disable','none')) {
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }
          $users= User::find($id);
          $users->status = 'disabled';
          $users->save();
          return redirect()->route('admin.users.index')->with('success','disabled');
     }
     
     


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Gate::denies('users.delete','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

           $profile= Profile::where('user_id',$id)->first();

                DB::beginTransaction();
          try {
                     Profile::destroy($profile->id);  
                     User::destroy($id);
                    
                    DB::commit();
                    
                    return redirect()->route('admin.users.index')->with('success','Deleted');           
            } catch (\Exception $e) {
                // Rollback Transaction
                
                  DB::rollback();
            
                 return redirect()->route('admin.users.index')->with('warning','Not Deleted');    
            }
    }


    public function profile($id)
    {

        $profile = Profile::where('user_id',$id)->first();
        if($profile->user->role->name == "super-admin"){
             if(! Auth::user()->role->name == "super-admin" ){
                     return back()->with('warning','You Dont Have Permission');
             }
          }
     

        //  if(Gate::denies('users.view_others_profile','none')) {
        //      if(Auth::user()->id ==  $id){
        //          }else{
        //         return redirect()->route('admin.home')->with('warning','You dont have permission');        
        //              }         
        //       }
         
     
         $user = User::Find($id);
         return view('admin.profiles.admin.index',compact('user'));   
    }


    
  
      public function create_field(Request $request,$id)
    {
         $user = User::find($id);
         $fields=  $user->profile->others;
         $fields[$request->key] = $request->value;
        $user->profile->others = $fields;
        $user->profile->save();
        return back();
    }

  


}