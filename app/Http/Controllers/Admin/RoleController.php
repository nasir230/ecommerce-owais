<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role_Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckUserStatus');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('roles.access','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        //
         $roles = Role::whereNotIn('name', ['super-admin'])->get();
         return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('roles.create','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('roles.create','none')) {
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        $request->validate([
            'name' => 'required|unique:permissions',
            'detail' => 'required'
        ]);
        

        Role::create([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);

        return redirect()->route('admin.roles.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        dd($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (Gate::denies('roles.edit','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }
        
    

        return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if (Gate::denies('roles.edit','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }
        //

        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'detail' => 'required',
        ]);

        $role->name = $request->name;
        $role->detail = $request->detail;
        $role->save();

        return redirect()->route('admin.roles.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (Gate::denies('roles.delete','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        try {

            $role->delete();
            return redirect()->route('admin.roles.index');
           
        } catch (\Throwable $th) {
            
            return redirect()->route('admin.roles.index')->with('error','Can Not Delete Becaouse The Data Used Some Where');
        }

    }

    /**
     * Permissions Display.
     */
    public function Permissions($id)
    {
        if (Gate::denies('roles.view_all_permissions','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

        $permissions = Permission::all();
        $rp = Role_Permission::where('role_id',$id)->pluck('permission_id');
        $rp=$rp->toArray();


        return view('admin.roles.permissions',compact('permissions','id','rp'));
    }

        /**
     * Permissions add.
     */
    public function addpermission(Request $request,$id)
    {
        if (Gate::denies('roles.manage_permissions','none')) {
            
            return redirect()->route('admin.home')->with('warning','You dont have permission');  
         }

          $rp = Role_Permission::where('role_id',$id)->delete();
          $request->request->remove('_token');
          
         // dd($request->all());
          foreach ($request->all() as $key => $value) {
        
            Role_Permission::create([
                'permission_id' => $value,
                'role_id' => $id,
            ]);
          }
            
        return back();
    }


    
}
