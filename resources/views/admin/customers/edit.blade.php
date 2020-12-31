
@extends('admin.layouts.admin')
@section('title','Edit Partner')

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
                <h4 class="page-title">Edit Partner</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.partners.index')}}" >Partners</a>
              </li>
              <li class="breadcrumb-item active">Edit Partner</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Edit</strong> Partner</h2>
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
            <form enctype="multipart/form-data" method="post" action="{{route('admin.partners.update',$module->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">First Name
                                    <span class="required"></span>
                                </label>
                            <input value="{{$module->profile->fname}}" required type="text" name="fname" data-required="1" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Last Name
                                    <span class="required"></span>
                                </label>
                            <input value="{{$module->profile->lname}}" required type="text" name="lname" data-required="1" class="form-control input-height" /> 
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
                                <label class="control-label">Password
                                    <span class="required"></span>
                                </label>
                                <input type="password" name="password" data-required="1" class="form-control input-height" />
                                <p>Leave It blank For Default Password</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                          
                                    <label for="">Partner Profile Picture</label>    
                                    <div class="file-field input-field">
                                            <div class="btn">
                                                <span>Upload</span>
                                                <input   name="image" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                      </div>
                                    <img width="100px" src="{{asset($module->profile->photo)}}" alt="" srcset="">
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
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                    <a style="line-height: 2;" href="{{route('admin.partners.index')}}" class="btn btn-danger waves-effect">Cancel</a>
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
      <script src="{{asset('admin/assets/js/form.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/pages/forms/form-data.js')}}"></script>
      <script></script>
@endsection

