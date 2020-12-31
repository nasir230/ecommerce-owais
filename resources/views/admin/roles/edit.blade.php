
@extends('admin.layouts.admin')
@section('title','Edit Role')

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
                <h4 class="page-title">Edit Role</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.roles.index')}}" >Roles</a>
              </li>
              <li class="breadcrumb-item active">Edit Roles</li>
            </ul>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Edit</strong> Role</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                  <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                      <li>
                          <a href="{{route('admin.roles.create')}}"> Create New</a>
                      </li>
                  </ul>
              </li>
          </ul>
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

            <form method="post" action="{{route('admin.roles.update',$role->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                @method('PUT')
                    <div class="form-body">
                       <div class="form-group row">
                            <div class="col-md-12">
                            <label class="control-label">Name
                                    <span class="required"> * </span>
                             </label>
                            <input type="text" value="{{$role->name}}" name="name" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12"> 
                            <label class="control-label ">Detail <span class="required"> * </span> 
                            </label>
                            <textarea name="detail" class="form-control"  cols="30" rows="5">{{$role->detail}}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
      <script> 
    
      </script>
@endsection

