
@extends('admin.layouts.admin')
@section('title','General Settings')

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
                <h4 class="page-title">General</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.home')}}" >Settings</a>
              </li>
              <li class="breadcrumb-item active">General</li>
            </ul>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>General</strong> Settings</h2>
            <ul class="d-none header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.permissions.create')}}"> Create New</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.settings.update')}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">App Name
                            </label>
                            <div class="col-md-9">
                                <input type="text"  name="app_name" data-required="1" 
                            value="{{Con::settings()->app_name}}" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Meta Description
                            </label>
                            <div class="col-md-9">
                                <input type="text"  name="app_meta" data-required="1"  value="{{Con::settings()->app_meta}}" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Copyright Details
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="app_copyright" data-required="1"  value="{{Con::settings()->app_copyright}}" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Keywords
                            </label>
                            <div class="col-md-9">
                                <textarea  name="app_keywords" class="form-control" cols="5" rows="2">{{Con::settings()->app_keywords}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3" >Fav Icon</label>
                            <div class="col-md-9">
                                <div class="filemanager" >
                                <input id="file-img1" class=" form-control f" type="text" value="{{Con::settings()->app_fav_icon}}" name="app_fav_icon">
                                 <img id="img1" class="py-2" style="display:block" width="100px" src="{{asset(Con::settings()->app_fav_icon)}}" alt="asd">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3" >Logo</label>
                            <div class="col-md-9">
                                <div class="filemanager"  >
                                  <input id="file-img2" class="form-control f" type="text" value="{{Con::settings()->app_logo}}" name="app_logo">
                                   <img src="{{asset(Con::settings()->app_logo)}}" class="py-2" style="display:block" width="100px" src="" alt="logo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3" >Front Logo</label>
                            <div class="col-md-9">
                                  <div class="filemanager" >
                                        <input id="file-img3" class="form-control f" type="text" value="{{Con::settings()->app_big_logo}}" name="app_big_logo">
                                        <img src="{{asset(Con::settings()->app_big_logo)}}" class="py-2" style="display:block" width="100px" >      
                                  </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-right ">
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
        
    $(document).ready(function() {
        
       
          
  });
        
    
      </script>
@endsection

