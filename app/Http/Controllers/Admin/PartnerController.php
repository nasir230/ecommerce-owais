<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;
use App\Department;
use App\User;
use App\Role;
use Hash;
use App\Profile;
use DB;
use App\Enquiry;
use Illuminate\Support\Facades\Gate;

class PartnerController extends Controller
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

         $role = Role::where('name','Partner')->first();
         $modules = User::where('role_id',$role->id)->get();

          return view('admin.partners.index',compact('modules'));
    }

     /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function status($id,$status)
    {

        $module = User::Find($id);
        $module->status = $status;
        $module->save();

        return back()->with('success','Updated');
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

        return view('admin.partners.create');
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
        $request->validate([
            'username' => 'alpha_dash|required|string|max:255|unique:users,name',
            'email' =>'required|email|unique:users',
            'password' => 'alpha_dash|required|min:7'
        ]);

        if($request->hasFile('image')){ 
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $photo = 'admin/upload/'.$new_name;
         }else{
            $photo = '';
         }
      
        $role = Role::where('name','Partner')->get();
             if(count($role) > 0){
                $user = User::create([
                            'name' => $request->username,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'status' => 'approved',
                            'role_id' => $role->first()->id,
                        ]);
                        Profile::create([
                            'user_id' => $user->id,
                            'fname' => $request->fname,
                            'lname' => $request->lname,
                            'bio' => $request->details,
                            'photo' => $photo,
                            'mobile' => $request->phone,
                            'street_address' => $request->address,
                        ]);
                    
              return redirect()->route('admin.partners.index')->with('success','Created Successfully');
               }

    }

     /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $module = User::Find($id);
        return view('admin.partners.edit',compact('module'));
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

        dd($request);
        $module = User::Find($id);

        $request->validate([
            'username' => 'alpha_dash|required|string|max:255|unique:users,name,'.$module->id,
            'email' =>'required|email|unique:users,email,'.$module->id,
        ]);

        if(!empty($request->password)){
            $request->validate([
                'password' => 'alpha_dash|required|min:7'
            ]);
        }

        if($request->hasFile('image')){ 
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/upload/'), $new_name);
            $photo = 'admin/upload/'.$new_name;
            $module->profile->photo = $photo;
         }

        $module->name = $request->username;
        $module->email = $request->email;
        $module->password = Hash::make($request->password);
        $module->profile->fname = $request->fname;
        $module->profile->lname = $request->lname;
        $module->profile->bio = $request->details;
        $module->profile->mobile = $request->phone;
        $module->profile->street_address = $request->address;
    
         if(!empty($request->password)){
            $module->password = Hash::make($request->password);
        }

         $module->save();
         $module->profile->save();

        return back()->with('success','Updated');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $module = User::Find($id);

      return view('admin.partners.view',compact('module'));

    }


    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $profile= Profile::where('user_id',$id)->first();
        DB::beginTransaction();

        try {
                Profile::destroy($profile->id);  
                User::destroy($id);
                DB::commit();
                return redirect()->route('admin.partners.index')->with('success','Deleted');           
       
             } catch (\Exception $e) {
             // Rollback Transaction
            
             DB::rollback();
        
             return redirect()->route('admin.partners.index')->with('warning','Not Deleted');    
          }
        

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function partner_student($pid,$id)
    {

        // dd(['asdasd']);
      $user = User::find($pid);
        $module = Enquiry::find($id);

    //  dd($module);
      


      return view('admin.profiles.partner.student',compact('module','user'));
    
    }


}
