
@extends('admin.layouts.admin')
@section('title','Create Event')

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
                <h4 class="page-title">Create Event</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.events.index')}}" >Events</a>
              </li>
              <li class="breadcrumb-item active">Create Event</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Create</strong> Events</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.events.create')}}">Create Event</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.events.store')}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Title
                                    <span class="required"></span>
                                </label>
                                <input required type="text" name="title" class="form-control input-height" /> 
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Date
                                    <span class="required"></span>
                                </label>
                                <input name="date" type="text" class="datepicker2 form-control" placeholder="Starting Date" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Type
                                    <span class="required"></span>
                                </label>
                                <select name="type"  >
                                    <option value="gallery">Gallery</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                 <label for="">Gallery</label>    
                                 <div class="file-field input-field">
                                 <div class="btn"><span>Upload</span>
                                    <input multiple name="gallery[]" type="file">
                                 </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Youtube Video Link</label>    
                                <input type="text" name="video" class="form-control input-height" /> 
                           </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                 <label for="">Thumbnail</label>    
                                 <div class="file-field input-field">
                                 <div class="btn"><span>Upload</span>
                                    <input name="upload" type="file">
                                 </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                    <a style="line-height: 2;" href="{{route('admin.events.index')}}" class="btn btn-danger waves-effect">Cancel</a>
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
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection

