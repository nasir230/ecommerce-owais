
@extends('admin.layouts.admin')
@section('title','Edit Testimonials')

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
                <h4 class="page-title">Edit Testimonials</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.testimonals.index')}}" >Testimonials</a>
              </li>
              <li class="breadcrumb-item active">Edit Testimonials</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Edit</strong> Testimonials</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.testimonals.create')}}">Create New</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.testimonals.update',$module->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Name
                                    <span class="required"></span>
                                </label>
                            <input required value="{{$module->name}}"  type="text" name="name" class="form-control input-height" /> 
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Details
                                    <span class="required"></span>
                                </label>
                            <textarea class="form-control" name="details" >{{$module->details}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Type <span class="required"></span></label>
                                <select name="type" >
                                    <option @if($module->type == 'story') {{'selected'}} @endif value="story">Story</option>
                                    <option @if($module->type == 'featured') {{'selected'}} @endif value="featured">Featured</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                 <label for="">Thumbnail</label>    
                                 <div class="file-field input-field">
                                 <div class="btn">
                                     <span>Upload</span>
                                    <input name="upload" type="file">
                                 </div>
                                 <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                            <img  style="max-width: 252px;" src="{{asset($module->thumbnail)}}" alt="" srcset="">
                        </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                <a style="line-height: 2;" href="{{route('admin.testimonals.index')}}" class="btn btn-danger waves-effect">Cancel</a>
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
      <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

      <script>
       
    </script>
@endsection

