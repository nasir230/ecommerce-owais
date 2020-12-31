<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;
use App\Department;
use App\Enquiry;
use Illuminate\Support\Facades\Gate;

class EnquiryController extends Controller
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
       
         $modules = Enquiry::all();
         return view('admin.enquiries.index',compact('modules'));
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

        $department= Department::all();
        $university= University::all();

        return view('admin.enquiries.create',compact('department','university'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request);
       
        if($request->hasFile('passport')){ 
            // $request->validate(['passport' => 'mimes:pdf,jpeg,png']);
           $image = $request->file('passport');
           $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('admin/upload/'), $new_name);
           $passport = 'admin/upload/'.$new_name;
        }else{
           $passport ='';
        }

        if($request->hasFile('education_document')){ 
        //    $request->validate(['education_document' => 'mimes:pdf,jpeg,png']);
           $image = $request->file('education_document');
           $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('admin/upload/'), $new_name);
           $education_document = 'admin/upload/'.$new_name;
        }else{
           $education_document ='';
        }

        if($request->hasFile('cv')){ 
            // $request->validate(['cv' => 'mimes:pdf,jpeg,png']);
           $image = $request->file('cv');
           $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('admin/upload/'), $new_name);
           $cv = 'admin/upload/'.$new_name;
        }else{
           $cv ='';
        }

        $university = implode(",",$request->university);
        $course_id = implode(",",$request->course_id);

         $enquiry = Enquiry::create([
            "title" => $request->title,
            "fname" => $request->fname,
            "lname" => $request->lname,
            "gender" => $request->gender,
            "birthday" => $request->birthday,
            "mobile" => $request->mobile,
            "email" =>  $request->email,
            "street_address" => $request->street_address,
            "nationality" => $request->nationality,
            "resident" => $request->resident,
            "uk_durations" => $request->uk_durations,
            "hear_about" => $request->hear_about,
            "refernal_name" => $request->refernal_name,
            "qualification" => $request->qualification,
            "english" => $request->english,
            "study" => $request->study,
            "course_id" => $course_id,
            "year_of_study" => $request->year_of_study,
            "university" => $university,
            "question" => $request->question,
            "passport" => $passport,
            "education_document" => $education_document,
            "agent_id" => $request->agent_id,
            "cv" => $cv
         ]);
           
        //  dd($request);
        return back()->with('success','Created Successfully');
    }

     /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (Gate::denies('roles.edit','none')) {
            
        //     return redirect()->route('admin.home')->with('warning','You dont have permission');  
        //  }

        $module = Enquiry::Find($id);
        $department= Department::all();
        $university= University::all();
        
        return view('admin.enquiries.edit',compact('module','department','university'));
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
         
        $enquiry =  Enquiry::find($id);
  
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


             $university = implode(",",$request->university);
             $course_id = implode(",",$request->course_id);

             $enquiry->course_id = $course_id;
             $enquiry->university = $university;

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
           
            $enquiry->year_of_study = $request->year_of_study;
           
            $enquiry->question = $request->question;
            $enquiry->save();

            // dd($request);

        return back()->with('success','Updated');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $module = Enquiry::Find($id);

      return view('admin.enquiries.view',compact('module'));

    }


    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
       $module= Enquiry::Find($id);

        try {

            $module->delete();
            return redirect()->route('admin.enquiries.index');
           
        } catch (\Throwable $th) {
            
            return redirect()->route('admin.enquiries.index')->with('warning','Can Not Delete Becaouse The Data Used Some Where');
        }

    }

      /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function status($id,$status)
    {

        $module = Enquiry::Find($id);
        $module->status = $status;
        $module->save();

        return back()->with('success','Updated');
    }


}
