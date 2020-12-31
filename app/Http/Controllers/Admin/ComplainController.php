<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role_Permission;
use Illuminate\Support\Facades\Gate;
use App\Category;
use App\PostType;
use App\Complain;
use Auth;
use App\User;
class ComplainController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('CheckAjax', ['only' => ['get_all_message']]);
    }

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function chat()
    {
        return view('admin.chat');
    }

    public function Get_user($id)
    {
        // return response()->json($id);
        $m = [];
         if($id == 'all'){
               
                $msg = User::all();
                foreach ($msg as $key => $value) {
                    if($value->role->name != 'Admin' AND $value->role->name != 'super-admin'){
                        $s = [];
                        $s['name'] = $value->name;
                        $s['img'] = asset($value->profile->photo);
                        $s['id'] = $value->id;
                        $object = (object)$s;
                        array_push($m,$object);

                    }
                }
            }else{
                $msg = User::where('name', 'LIKE', "%{$id}%")->get();
                  foreach ($msg as $key => $value) {
                    if($value->role->name != 'Admin' AND $value->role->name != 'super-admin'){
                        $s = [];
                        $s['name'] = $value->name;
                        $s['img'] = asset($value->profile->photo);
                        $s['id'] = $value->id;
                        $object = (object)$s;
                        array_push($m,$object);
                    }
                }
          }
        // dd($m);
        return response()->json($m);
    }
    
    
    public function client_get($id){
        $m = [];
        $msg = Complain::where('user_id',$id)->orderBy('created_at', 'asc')->get();
         foreach ($msg as $key => $value) {
              $m[$key]['name'] = $value->user->name;
              $m[$key]['is_admin'] = $value->is_admin;
              $m[$key]['status'] = $value->status;
              $m[$key]['message'] = $value->message;
              $m[$key]['created_at'] = $value->created_at;
         }

        //  dd(json_encode($m[0]));
        return response()->json($m);
    }

    public function client_sent(Request $request){
        
        //   if($request->ajax()){
                 $complain = Complain::create([
                'message' => $request->message,
                'user_id'=> $request->id,
                'is_admin'=>0,
                'status'=>0,
                ]);
            return 0;                
    //    }
       
    return response()->json('message','success');
        
    }

    public function admin_sent(Request $request){
        
        //   if($request->ajax()){
                 $complain = Complain::create([
                'message' => $request->message,
                'user_id'=> $request->id,
                'is_admin'=>1,
                'status'=>0,
                ]);
            return 0;                
    //    }
       
    return response()->json('message','success');
        
    }

    
    

    public function view_all(){
        
        if(Gate::denies('contact.access','none')){
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
        }
        
        $msg=Complain::all();
        
        $AllUsers= User::whereNotIn('name', ['Super Admin'])->get();
        
        $plucked = $msg->pluck('user_id')->toArray();
        $unique = array_unique($plucked);
        
        $users=User::whereIn('id',$unique)->get();
        
        return view('admin.complains.all',compact('users','AllUsers'));
    }

    
        public function view($id){
            
            $complains=Complain::where('user_id',$id)->paginate(3);
            $allcomplain=Complain::all();
            $plucked = $allcomplain->pluck('user_id')->toArray();
            $unique = array_unique($plucked);
            $users=User::whereIn('id',$unique)->get();
           
           //dd($complains);
           
            return view('admin.complains.view',compact('users','complains','id'));
       }
       
       
      public function sent($id,Request $request){
          
        $request->validate([
         'msg' => 'required'
         ]);
         
        $complain = Complain::create([
                'message' => $request->msg,
                'user_id'=>$id,
                'is_admin'=>1,
                ]);
              
            return back();
      }
      
     
     public function get_all_users(Request $request){
      
            if($request->ajax()){
                $msg=Complain::all();
                $plucked = $msg->pluck('user_id')->toArray();
                $unique = array_unique($plucked);
                $users=User::whereIn('id',$unique)->get();
                return response()->json(['users'=>$users]);
            }
        
     }
     
     public function get_all_messages($id,Request $request){
        
             if($request->ajax()){
                 
                $complains=Complain::where('user_id',$id)->orderBy('created_at')->get();
                
                  return response()->json(['data'=>$complains]);
               }
     }
     
     
    public function sent_messages($id,$message,Request $request){
         
             if($request->ajax()){

                $complain = Complain::create([
                        'message' => $message,
                        'user_id'=> $id,
                        'is_admin'=>1,
                        ]);
                       
                  return response()->json(['id'=>$id,'message'=>$message]);
               }
    }
    
   public function new_message(Request $request){
         
         $complain = Complain::create([
                        'message' => $request->message,
                        'user_id'=> $request->user_id,
                        'is_admin'=>1,
                        ]);
                        
                       
        return back();
              
    }
    
   public function delete($id){
         
        $complain = Complain::where(['user_id'=> $id])->delete();
                
        return response()->json(['message'=>'true']);
              
    }
        
    
       
       
    
    
    
    
    
    
    
    
}
