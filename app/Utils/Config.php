<?php
namespace App\Utils;

use App\User;
use App\Setting;
use App\PostType;
use App\University;
use App\Course;
use App\Enquiry;
use App\News;
use App\Event;
use App\Testimonal;
use App\Role;
use App\FileManager;
use App\Category;
use App\Product;
use App\Form;

class Config {

    
   public function files(){
    
    return FileManager::all();

  }
  
  public function settings(){
    
    $setting = Setting::all();
    $setting = $setting->pluck('value','name');
    $setting= $setting->toArray();
    $setting = (object)$setting;
    return $setting;
    
  }
  
  
   public function ChildCat($id){
  
    return Category::find($id);    
  }

  public function allCat(){
  
    return Category::all();    
  }

  public function allProduct(){
  
    return Product::all();    
  }
  
  public function myTicket($id){
     
    return Form::where('user_id',$id)->get();    
  }
  

   public function popularCourses($course){
    $PostType = Course::whereIn('id',$course)->get();
    return $PostType;
  }
  
  public function popularNews($data){
    $PostType = News::whereIn('id',$data)->get();
    return $PostType;
  }
  
   public function popularTestimonials($data){
    $PostType = Testimonials::whereIn('id',$data)->get();
    return $PostType;
  }
  
   public function All_PostType(){
    $PostType = PostType::all();
    return $PostType;
  }

  public function Universities(){
    $University = University::all();
    return $University;
  }

  public function courses(){
    $University = Course::all();
    return $University;
  }

  public function Enquiries($id){
     $Enquiry = Enquiry::where('agent_id',$id)->get();
     return $Enquiry; 
  }

  public function allEnquiries(){
    $Enquiry = Enquiry::all();
    return $Enquiry; 
 }

  public function Testimonals(){
    $Enquiry = Testimonal::all();
    return $Enquiry; 
  }

  public function News(){
    $Enquiry = News::all();
    return $Enquiry;
 }

 public function Events(){

  $Enquiry = Event::all();
  return $Enquiry;
}

  public function user($id){
    
     $Enquiry = User::find($id);
      if ($Enquiry === null) {
        return false;
        
      }else{
        return  $Enquiry;
      }

   
 }


   public function getUsersByRoleName($name){
    $Enquiry = Role::where('name',$name)->get();
    return $Enquiry->first()->users; 
  }


}

?>

