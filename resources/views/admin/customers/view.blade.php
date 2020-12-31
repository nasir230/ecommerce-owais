
@extends('admin.layouts.admin')
@section('title','View Partner')

@section('css')


<link href="{{asset('admin/assets/css/form.min.css')}}" rel="stylesheet" />
       
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style">
              <li class="breadcrumb-item">
                <h4 class="page-title">View Partner</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.partners.index')}}" >Partners</a>
              </li>
              <li class="breadcrumb-item active">View Partner</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>View</strong> Partner</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                  <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                      <li>
                          <a href="{{route('admin.partners.create')}}">Create New</a>
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
            <form id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">First Name
                                    <span class="required"></span>
                                </label>
                            <input value="{{$module->profile->fname}}" required type="text" name="name" data-required="1" class="form-control input-height" /> 
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Last Name
                                    <span class="required"></span>
                                </label>
                            <input value="{{$module->profile->lname}}" required type="text" name="name" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Address
                                    <span class="required"></span>
                                </label>
                                <input value="{{$module->profile->street_address}}" type="text" name="address" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Phone
                                    <span class="required"></span>
                                </label>
                                <input value="{{$module->profile->mobile}}" type="text" name="phone" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Email
                                    <span class="required"></span>
                                </label>
                                <input value="{{$module->email}}" required type="email" name="email" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Username
                                    <span class="required"></span>
                                </label>
                                <input value="{{$module->name}}" required type="text" name="username" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Partner Profile Picture
                                    <span class="required"></span>
                                </label>
                            <img class="d-block" width="100px" src="{{asset($module->profile->photo)}}" alt="" srcset="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Description
                                    <span class="required"></span>
                                </label>
                            <textarea class="form-control" name="details" >{{$module->profile->bio}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label">Created
                                    <span class="required"></span>
                                </label>
                            <input value="{{date('d M y', strtotime($module->created_at))}}" type="text" name="logo" data-required="1" class="form-control input-height" /> 
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Updated
                                    <span class="required"></span>
                                </label>
                            <input value="{{date('d M y', strtotime($module->updated_at))}}" type="text" name="logo" data-required="1" class="form-control input-height" /> 
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
      <script src="{{asset('admin/assets/js/form.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/pages/forms/form-data.js')}}"></script>
      <script></script>
@endsection

