@extends('admin.layouts.admin')
@section('title','Permission')

@section('css')
 
{{-- <link href="{{asset('assets/css/form.min.css')}}" rel="stylesheet" /> --}}
<script src = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
<link rel = "stylesheet" href = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">

{{-- <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons"> --}}

<style>
    .breadcrumb .page-title{
        margin-top:0px; 
    }

    .profile-info h3{
        margin: 0px;
        line-height: 1.2;
        font-weight: bold;
        font-size: 15px!important;
        text-transform: capitalize;
        color: #333;
        margin-bottom: 5px;
        font-family: "Poppins",sans-serif;

    }
    .profile-info p{
        margin: 0px;
        line-height: 1.2;

    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style">
              <li class="breadcrumb-item">
                <h4 class="page-title">Roles Permission</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.roles.index')}}" >Permissions</a>
              </li>
              <li class="breadcrumb-item active">Edit Permissions</li>
            </ul>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="body">
            @if ($errors->any())
        
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
                    @endforeach
            @endif

    <form action="{{route('admin.roles.addpermission',$id)}}" method="post" > 
        @csrf
    <div class="row">
    <div class="col-md-12">
         <div class="row">
            <div class="col-md-6">
                <h4> <strong>Edit</strong>  Permission</h4>
             </div>
             <div class="col-md-6 align-self-center">
                @can('roles.manage_permissions','none')
                <div class="text-right py-2">
                    <button type="submit" class="btn btn-info text-right">Update</button>
                </div>
                @endcan
             </div>
         </div>
        <div class="row">
            <div class=" @if(Auth::user()->role->name != 'super-admin') {{'d-none'}}  @endif col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div style="background: #343D45;" class="header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="text-white" >Users Permissions</h2>
                            </div>
                            <div class="col-6 align-self-center ">
                                <div class="tools">
                                    <a style="font-size: 22px;color: white;" class="pull-right t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                     <ul class="list-group list-group-unbordered">
                        <li   class="list-group-item">
                            <span>Access Users Management</span> 
                            <a class="pull-right">
                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                for = "users.management_access">
                                <input name="21" value="21"  type="checkbox" id ="users.management_access" 
                                class = "mdl-switch__input" @if(in_array(21,$rp)){{'checked'}} @endif  >
                            </label>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span>View all</span> 
                            <a class="pull-right">
                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                for = "users.view_all">
                                <input name="4" value="4"  type="checkbox" id ="users.view_all" 
                                class = "mdl-switch__input" @if(in_array(4,$rp)){{'checked'}} @endif  >
                            </label>
                            </a>
                        </li>
                        <li   class="list-group-item">
                            <span>Create User</span> 
                            <a class="pull-right">
                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                for = "users.create">
                                <input name="194" value="194"  type="checkbox" id ="users.create" 
                                class = "mdl-switch__input" @if(in_array(194,$rp)){{'checked'}} @endif  >
                            </label>
                            </a>
                        </li>
                        <li   class="list-group-item">
                            <span>Edit User</span> 
                            <a class="pull-right">
                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                for = "users.edit">
                                <input name="5" value="5"  type="checkbox" id ="users.edit" 
                                class = "mdl-switch__input" @if(in_array(5,$rp)){{'checked'}} @endif  >
                            </label>
                            </a>
                        </li>
                        <li  class="list-group-item">
                            <span>Delete User</span> 
                            <a class="pull-right">
                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                for = "users.delete">
                                <input name="25" value="25"  type="checkbox" id ="users.delete" 
                                class = "mdl-switch__input" @if(in_array(25,$rp)){{'checked'}} @endif  >
                            </label>
                            </a>
                        </li>
                       </ul>
                    </div>
                </div>
            </div>

            <div class=" @if(Auth::user()->role->name != 'super-admin') {{'d-none'}} @endif col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card ">
                    <div style="background: #343D45;" class="header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="text-white" >Roles Permissions</h2>
                            </div>
                            <div class="col-6 align-self-center ">
                                <div class="tools">
                                    <a style="font-size: 22px;color: white;" class="pull-right t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-unbordered">
                            @foreach ($permissions as $item)
                                 @if(strtok($item->name,".") == 'roles')
                                    <li   class="list-group-item">
                                    <span>{{$item->detail}}</span> 
                                        <a class="pull-right">
                                            <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                            for = "{{$item->detail}}">
                                            <input name="{{$item->id}}" value={{$item->id}}  type="checkbox" id ="{{$item->detail}}" 
                                            class = "mdl-switch__input" @if(in_array($item->id,$rp)){{'checked'}} @endif>           
                                        </label>
                                        </a>
                                    </li>
                                 @endif
                            @endforeach 
                        </ul>          
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card card-topline-green">
                    <div style="background: #343D45;" class="header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="text-white" >Settings Permissions</h2>
                            </div>
                            <div class="col-6 align-self-center ">
                                <div class="tools">
                                    <a style="font-size: 22px;color: white;" class="pull-right t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-unbordered">
                            @foreach ($permissions as $item)
                                 @if(strtok($item->name,".") == 'settings')
                                    <li   class="list-group-item">
                                    <span>{{$item->detail}}</span> 
                                        <a class="pull-right">
                                            <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                            for = "{{$item->detail}}">
                                            <input name="{{$item->id}}" value={{$item->id}}  type="checkbox" id ="{{$item->detail}}" 
                                            class = "mdl-switch__input" @if(in_array($item->id,$rp)){{'checked'}} @endif>           
                                        </label>
                                        </a>
                                    </li>
                                 @endif

                            @endforeach 
                        </ul>  
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card card-topline-green">
                    <div style="background: #343D45;" class="header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="text-white" >Modules Permissions</h2>
                            </div>
                            <div class="col-6 align-self-center ">
                                <div class="tools">
                                    <a style="font-size: 22px;color: white;" class="pull-right t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-unbordered">
                            @foreach ($permissions as $item)
                                 @if(strtok($item->name,".") == 'modules')
                                    <li   class="list-group-item">
                                    <span>{{$item->detail}}</span> 
                                        <a class="pull-right">
                                            <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
                                            for = "{{$item->detail}}">
                                            <input name="{{$item->id}}" value={{$item->id}}  type="checkbox" id ="{{$item->detail}}" 
                                            class = "mdl-switch__input" @if(in_array($item->id,$rp)){{'checked'}} @endif>           
                                        </label>
                                        </a>
                                    </li>
                                 @endif

                            @endforeach 
                        </ul>  
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

</form>

@endsection

@section('js')
      <script> 
    
      </script>
@endsection

