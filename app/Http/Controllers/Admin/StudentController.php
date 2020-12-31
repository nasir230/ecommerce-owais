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

class StudentController extends Controller
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

         $role = Role::where('name','Student')->first();
        $modules = User::where('role_id',$role->id)->get();

        return view('admin.students.index',compact('modules'));
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

        return view('admin.students.create');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
      
        $role = Role::where('name','Student')->get();
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

                        Enquiry::create([
                            'agent_id' => $user->id,
                        ]);
                    
              return redirect()->route('admin.students.index')->with('success','Created Successfully');
               }

    }

     /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $module = User::Find($id);
        return view('admin.students.edit',compact('module'));
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
        return view('admin.students.view',compact('module'));

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
                return redirect()->route('admin.students.index')->with('success','Deleted');           
       
             } catch (\Exception $e) {
             // Rollback Transaction
            
             DB::rollback();
        
             return redirect()->route('admin.students.index')->with('warning','Not Deleted');    
          }
    }

    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function application(Request $request)
    {   
        $university = implode(",",$request->university);
        $course_id = implode(",",$request->course_id);
        $enquiry = Enquiry::where('agent_id',$request->agent_id)->get();
        if(count($enquiry) > 0){

            $enquiry = $enquiry->first();

            if($request->hasFile('passport')){ 
                $image = $request->file('passport');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/upload/'), $new_name);
                $passport = 'admin/upload/'.$new_name;
                $enquiry->passport = $passport;
             }
     
             if($request->hasFile('education_document')){ 
                $image = $request->file('education_document');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/upload/'), $new_name);
                $education_document = 'admin/upload/'.$new_name;
                $enquiry->education_document = $education_document;
             }
     
             if($request->hasFile('cv')){ 
                $image = $request->file('cv');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/upload/'), $new_name);
                $cv = 'admin/upload/'.$new_name;
                $enquiry->cv = $cv;
             }

            $enquiry->title =$request->title;
            $enquiry->fname = $request->fname;
            $enquiry->lname = $request->lname;
            $enquiry->gender = $request->gender;
            $enquiry->birthday = $request->birthday;
            $enquiry->mobile = $request->mobile;
            $enquiry->email =  $request->email;
            $enquiry->street_address = $request->street_address;
            $enquiry->nationality = $request->nationality;
            $enquiry->resident = $request->resident;
            $enquiry->uk_durations = $request->uk_durations;
            $enquiry->hear_about = $request->hear_about;
            $enquiry->refernal_name = $request->refernal_name;
            $enquiry->qualification = $request->qualification;
            $enquiry->english = $request->english;
            $enquiry->study = $request->study;
            $enquiry->course_id = $course_id;
            $enquiry->year_of_study = $request->year_of_study;
            $enquiry->university = $university;
            $enquiry->question = $request->question;
            $enquiry->agent_id = $request->agent_id;

            $enquiry->save();

            return back()->with('success','Created Successfully'); 
        }

        return back()->with('warning','Found Error');  
    }


    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request,$id)
    {

     //
     $user = User::find($id);
        

     // dd($user->profile);
     $request->validate([
         'email' =>'required|email|unique:users,email,'.$user->id,
     ]);

     // dd($request);

     $user->profile->fname = $request->fname;
     $user->profile->lname = $request->lname;
     $user->profile->mobile = $request->phone;
     $user->profile->city = $request->city;
     $user->profile->country = $request->country;
     $user->profile->street_address = $request->street_address;
     $user->email = $request->email;
     $user->profile->save();
     $user->save();
      
     return back()->with('success','Updated');
    }


}
