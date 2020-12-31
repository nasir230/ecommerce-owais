<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Enquiry;

class ProfileController extends Controller
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        // dd($user->profile);
        $user = User::find($id);
        $request->validate([
            'email' =>'required|email|unique:users,email,'.$user->id,
        ]);

        // dd($request);

        $user->profile->fname = $request->fname;
        $user->profile->lname = $request->lname;
        $user->profile->mobile = $request->phone;
        $user->profile->story = $request->story;
        $user->profile->city = $request->city;
        $user->profile->country = $request->country;
        $user->profile->street_address = $request->street_address;
        $user->email = $request->email;
        $user->profile->save();
        $user->save();

        return back()->with('success','Updated');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function image_update(Request $request)
    {
           $profile = Profile::find($request->id);
            // dd($profile);
          if($request->hasFile('image')){ 
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile/'), $new_name);
            $profile->photo = 'images/profile/'.$new_name;
         }
         
        $profile->save();
        
        return back()->with('success','Updated');
    }





    public function profileupdate(Request $request,$id)
    {
           
        $profile = Profile::where('user_id',$id)->first();
           if($profile->user->role->name == "Super Admin"){
                 
                 if(! Auth::user()->role->name == "Super Admin" ){
                     
                     return back()->with('warning','You Dont Have Permission');
                 }
             }

           if(Gate::denies('users.update_others_profile','none')) {
             if(Auth::user()->id ==  $id){
             }else{
                  return redirect()->route('admin.home')->with('warning','You dont have permission');        
                  }         
         }
         
         $profile->nick_name = $request->nick_name;
         $profile->mobile = $request->mobile;
         $profile->gender = $request->gender;
         $profile->story = $request->story;
         $profile->country = $request->country;
         $profile->state = $request->state;
         $profile->city = $request->city;
         $profile->zip = $request->zip;
         $profile->bio = $request->bio;
         $profile->profession = $request->profession;
         $profile->street_address = $request->street_address;
         $profile->street_address2 = $request->street_address2;
         $profile->others = $request->fields;
         $profile->birthday=$request->birthday;

         if($request->hasFile('photo')){ 
             $request->validate(['photo' => 'mimes:jpeg,png|max:5000']);
            $image = $request->file('photo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile/'), $new_name);
            $profile->photo = 'images/profile/'.$new_name;
         }
       
         if($profile->save()){

                $request->validate([
                    'name' => 'required|unique:users,name,'.$profile->user->id,
                    'email' =>'required|email|max:255|unique:users,email,'.$profile->user->id,            
                    ]);
                $profile->user->name = $request->name;
                $profile->user->email = $request->email;
                if($request->password != null){
                   // dd($request);
                    if (Hash::check($request->password,$profile->user->password)) {
                        $request->validate([
                        'new_password_1' => 'required'
                        ]);
                        $profile->user->password = Hash::make($request->new_password_1);
                    }else{   
                        return back()->with('warning','Wrong Password');
                    }   
                }
                $profile->user->save();
         }
         return back();
    }

    

  
   
}
