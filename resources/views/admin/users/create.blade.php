
@extends('admin.layouts.admin')
@section('title','Create User')

@section('css')

<link href="{{asset('assets/css/form.min.css')}}" rel="stylesheet" />
       
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style">
              <li class="breadcrumb-item">
                <h4 class="page-title">Create User</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.users.index')}}" >Users</a>
              </li>
              <li class="breadcrumb-item active">Create User</li>
            </ul>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Create</strong> User</h2>
          </div>
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

            <form method="post" action="{{route('admin.users.store')}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                    <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Name
                                    <span class="required"> * </span>
                                </label>
                                <input type="text" maxlength="20" name="name" data-required="1"  class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label ">Email
                                    <span class="required"> * </span>
                                </label>
                                <input type="text" class="form-control input-height" name="email" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label ">Password
                                    <span class="required"> * </span>
                                </label>
                                <input type="password" name="password" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label py-3">Roles
                                    <span class="required"> * </span>
                                </label>
                                <select class="form-control" name="role_id">
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')


   <script src="{{asset('admin/assets/js/table.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/pages/tables/jquery-datatable.js')}}"></script>
      <script> 
    
      </script>
@endsection

