<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;
use App\Profile;
use Hash;
use App\Role;
use Storage;
use App\News;
use App\Product;
use App\Form;
use App\Category;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('wel');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_view($slug)
    {
       $product = Product::where('slug',$slug)->get();
       if(count($product) > 0 ){
         $product = $product->first();
        return view('product',compact('product'));
       }
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {
        // dd([]);
       $products = Product::paginate(2);

        return view('products',compact('products'));
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productsByCat($slug)
    {
       
       $cat = Category::where('slug',$slug)->get();
       if(count($cat) > 0 ){

         $cat = $cat->first();
    
         $products = Product::where('category_id',$cat->id)->paginate(2);
         return view('products',compact('products'));

        }

       return redirect()->route('home');
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productsSearch(Request $request)
    {
        if($request->cat == 'all' ){
            return redirect()->route('products');
        }
       
       $cat = Category::where('slug',$request->cat)->get();
       if(count($cat) > 0 ){

            $cat = $cat->first();
            $products = Product::where('category_id',$cat->id)->orderBy('id',$request->orderby)->paginate(2);
            
            $category = $request->cat;
            $orderby = $request->orderby;

            return view('products',compact('products','category','orderby'));       
        }


       return redirect()->route('home');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sell()
    { 
        if(Auth::check()){
            return view('sell_us');
         }else{
            return redirect()->route('home')->with('warning',' Please Login');
         }
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sell_Update(Request $request)
    {

     
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

            $ticket = Form::create([
                'title' => $request->title,
                'age' => $request->age,
                'excerpt' => $request->excerpt,
                'user_id' =>  Auth::user()->id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'gallery' => implode(",",$gimg),
                'status' => 'Pending',
                'pr_condition' => $request->pr_condition,
                'token' => rand(),
            ]);
            
            return redirect()->route('sell')->with('ticket',$ticket);

        }
    public function dashboard(){
        
        return view('dashboard');
    }

    public function ticket_view($id){
        $ticket = Form::find($id);

        return view('ticket',compact('ticket'));
    }

    public function ticket_update(Request $request){
       
       $form =  Form::find($request->id);
       $form->ticket_token = $request->token;
       $form->ticket_s_location = $request->sdate;
       $form->ticket_e_location = $request->edate;
       $form->ticket_type = $request->type;
       $form->save();

        if($form->ticket_type == 'delivery'){
        
            return redirect()->route('ticket',['id' => $request->id])->with('success','Thank you! Your pickup has been scheduled. ');
        
        }else{
            return redirect()->route('ticket',['id' => $request->id])->with('success','The parcel reference number has been sent to admin. Please also include it in your shipment');
        }
      
    }


    public function searchbar(Request $request)
    {
        $s = $request->s;
        // $s ='uni';
        $data =[];

       $news = News::where('title', 'LIKE', "%{$s}%")->get();
       if(count($news) > 0){
            foreach ($news as $key => $value) {
                    $arr = [];
                    $arr['type'] = 'news';
                    $arr['id'] = $value->id;
                    $arr['title'] = $value->title;
                    $arr['excerpt'] = $value->excerpt;
                    $arr['thumbnail'] = asset($value->logo);
                    $arr['url'] = route('news.view',$value->id);
                    $object = (object)$arr;
                    array_push($data,$object);
                # code...
            }
        }

        $events = Event::where('title', 'LIKE', "%{$s}%")->get();
        if(count($events) > 0){
             foreach ($events as $key => $value) {
                     $arr = [];
                     $arr['type'] = 'events';
                     $arr['id'] = $value->id;
                     $arr['title'] = $value->title;
                     $arr['excerpt'] = null;
                     $arr['thumbnail'] = asset($value->thumbnail);
                     $arr['url'] = route('event');
                     $object = (object)$arr;
                     array_push($data,$object);
                 # code...
             }
         }

         $universities = University::where('name', 'LIKE', "%{$s}%")->get();
         if(count($universities) > 0){
              foreach ($universities as $key => $value) {
                      $arr = [];
                      $arr['type'] = 'universities';
                      $arr['id'] = $value->id;
                      $arr['title'] = $value->name;
                      $arr['excerpt'] = null;
                      $arr['thumbnail'] = asset($value->logo);
                      $arr['url'] = route('course',$value->id);
                      $object = (object)$arr;
                      array_push($data,$object);
                  # code...
              }
          }
   
      
       return view('search',compact('data','s'));
    }


    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function course($id)
    {

         $uni = University::Find($id);
        return view('course',compact('uni'));
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {   
        
    
        //  dd($request);
        $text = $request->text;
        $type = $request->type;
        $courses = $request->courses;
       
        $data = null;
         
        if($text == null && $type == 'all' && $courses == 'all'){
            return redirect()->route('universities');

        }elseif($text != null && $type == 'all' && $courses == 'all'){
              
            $data = University::where('name', 'LIKE', "%{$text}%")->get();
            
        }else{

                      //  Text
                    if($text != null ){ 
                    
                        $uni = University::where('name', 'LIKE', "%{$text}%")->pluck('id')->toArray();

                    }else{ $uni = University::all()->pluck('id')->toArray(); }

                    // dd($uni);

                    if($type != 'all' && $courses == 'all'){

                        $c =  Course::whereIn('university_id', $uni)->where('type',$type)->pluck('university_id')->toArray();
                        
                      
                    }elseif($type == 'all' && $courses != 'all'){

                        $c =  Course::whereIn('university_id', $uni)->where('id',$courses)->pluck('university_id')->toArray();

                    }elseif($type == 'all' && $courses == 'all'){

                        $c =  Course::all()->pluck('university_id')->toArray();
                    
                    }else{

                        $c =  Course::whereIn('university_id', $uni)->where(['id'=>$courses,'type' => $type])->pluck('university_id')->toArray(); 
                    }

                    $data = University::whereIn('id', $c)->get();
        }
       
        $old_course = $request->courses; 
        $old_type = $request->type; 

        // dd($data);
        return view('uni_search',compact('data','old_course','old_type','text'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }

   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function university()
    {
        $university = University::all();
        return view('university',compact('university'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function courses($id)
    {

       $courses = Course::where('id',$id)->get();
       $uni_id = $courses->pluck('university_id')->toArray();
       $university = University::whereIn('id', $uni_id)->get();

        return view('university',compact('university'));
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function by_type($id)
    {

       $courses = Course::where('type',$id)->get();
       $uni_id = $courses->pluck('university_id')->toArray();
       $university = University::whereIn('id', $uni_id)->get();

        return view('university',compact('university'));
    }

    
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function finance()
    {
        return view('finance');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function event()
    {
        return view('event');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employability()
    {
        return view('employability');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function enquire()
    {
        return view('enquire');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function enquire_update(Request $request)
    {
      
      Enquire::create([
             'fname' => $request->fname,
             'lname' => $request->lname,
             'mobile' => $request->mobile,
             'email' => $request->email,
             'nationality' => $request->nationality,
             'courses' =>  $request->courses,
             'type_of_study' =>  $request->type_of_study,
             'year_of_study' => $request->year_of_study
       ]);
    
        return back()->with('success','Form Submited');
    }

    
    public function news()
    {

        return view('news');
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_view($id)
    {  

        $module = News::Find($id);
        return view('news_view',compact('module'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openday()
    {
        return view('openday');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }

    
    public function signin(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }


    public function signup(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        
        return view('register');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }


        return back()->with('warning','Wrong Email Or Password Please Try Again');
    }

    public function register(Request $request)
    {

        if(Auth::check()){
            return redirect()->route('home');
        }
        
        if($request->p1 != $request->p2){
            return back()->with('warning','Password and Confirm Password Doest Not Match');   
        }

       $user = User::where('email',$request->email)->get();
       if(count($user) > 0){
        return back()->with('warning','Email already Exist');    
        }else{
                 
            $user = User::create([
                        'name' => $request->fname.' '.$request->lname,
                        'email' => $request->email,
                        'password' => Hash::make($request->p1),
                        'status' => 'pending',
                        'role_id' => 27,
            ]);
            Profile::create([ 
                      'user_id' => $user->id,
                      'gender' => $request->gender,
                      'country' => $request->country,
                      'mobile' => $request->phone,
                      'fname' => $request->fname,
                      'lname' => $request->lname,
                      ]);

            return back()->with('success','You Are Now Registered');
           }


    }

    public function language($l){

        Session::put('locale',$l);
        return  redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return( redirect()->route('home')); 
    }


    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'alpha_dash|required',
            'new_password' => 'alpha_dash|required|min:7',
            'old_password' => 'alpha_dash|required|min:7',
        ]);
    
       $user= User::where('name',$request->username)->get();
       if(count($user) > 0){
       $user = $user->first();
                if(!Hash::check($request->old_password,$user->password)){
                    return back()->with('warning','Current Password Wrong');
                }else{
                        $user->password = Hash::make($request->new_password);
                        $user->save();
                     }
                return back()->with('success','Password Changed');
        }else{
            return back()->with('warning','Invalid Username');
        }
    }

    
}
