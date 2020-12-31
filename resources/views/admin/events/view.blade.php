
@extends('admin.layouts.admin')
@section('title','View Event')

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
                <h4 class="page-title">View Event</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.events.index')}}" >Events</a>
              </li>
              <li class="breadcrumb-item active">View Event</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>View</strong> Event</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.events.create')}}">Create New</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.events.update',$module->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Title
                                    <span class="required"></span>
                                </label>
                            <input required value="{{$module->title}}"  type="text" name="title" class="form-control input-height" /> 
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Date
                                    <span class="required"></span>
                                </label>
                                <input required name="date" type="text" value="{{date('m-d-Y', strtotime($module->date))}}" class="datepicker2 form-control" placeholder="Starting Date" value=""/>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Type
                                    <span class="required"></span>
                                </label>
                                <select name="type"  >
                                    <option @if($module->type == 'gallery') {{'selected'}} @endif value="gallery">Gallery</option>
                                    <option @if($module->type == 'video') {{'selected'}} @endif value="video">Video</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Youtube Video Link</label>    
                            <input required type="text" value="{{$module->video}}" name="video" class="form-control input-height" /> 
                           </div>

                           <div class="col-md-12">
                            <label for="">Gallery</label>    
                           <div class="col-md-12">
                               @php $gallery=  explode(",",$module->gallery); @endphp
                               @foreach ($gallery as $item)
                                <img width="100px" class="px-2" src="{{asset($item)}}" >
                               @endforeach
                           </div>
                       </div>

                   </div>                     
                        <div class="form-group row">
                            <div class="col-md-12">
                                 <label for="">Thumbnail</label>    
                            </div>
                            <div class="col-12">
                            <img  style="max-width: 252px;" src="{{asset($module->thumbnail)}}" >
                        </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12 p-t-20 text-center">
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

