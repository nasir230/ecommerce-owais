
@extends('admin.layouts.admin')
@section('title','Home Settings')

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
                <h4 class="page-title">Home Page</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.home')}}" >Settings</a>
              </li>
              <li class="breadcrumb-item active">Home Page</li>
            </ul>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Home</strong> Settings</h2>
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
                            <label class="control-label col-md-3">Home Banner Description
                            </label>
                            <div class="col-md-9">
                                <input type="text"  name="home_banner_description" value="{{Con::settings()->home_banner_description}}" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                 @php $course_id = explode(",",Con::settings()->course_id);  @endphp
                                <label class="control-label">Popular Courses <span class="required"></span> </label>
                                <select name="course_id[]" class="selectpicker" multiple  class="col-12 m-t-20 p-l-0">
                                     @foreach (Con::courses() as $item)
                                        <option @if(in_array($item->id,$course_id)) {{'selected'}} @endif  value="{{$item->id}}"> {{$item->name}}</option>    
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-12">
                                     @php $news_id = explode(",",Con::settings()->news_id);  @endphp
                                    <label class="control-label">News <span class="required"></span> </label>
                                    <select name="news_id[]" class="selectpicker" multiple  class="col-12 m-t-20 p-l-0">
                                         @foreach (Con::News() as $item)
                                            <option @if(in_array($item->id,$news_id)) {{'selected'}} @endif  value="{{$item->id}}"> {{$item->title}}</option>    
                                         @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-12">
                                     @php $event_id = explode(",",Con::settings()->event_id);  @endphp
                                    <label class="control-label">Events <span class="required"></span> </label>
                                    <select name="event_id[]" class="selectpicker" multiple  class="col-12 m-t-20 p-l-0">
                                         @foreach (Con::Events() as $item)
                                            <option @if(in_array($item->id,$event_id)) {{'selected'}} @endif  value="{{$item->id}}"> {{$item->title}}</option>    
                                         @endforeach
                                    </select>
                                </div>
                        </div>
                        
                           @php
                              $testimonals =  Con::Testimonals();
                              $old_story = explode(",",Con::settings()->testimonials_id);
                              $story = $testimonals->where('type','story');
                              $old_featured = explode(",",Con::settings()->featured_id);
                              $featured = $testimonals->where('type','featured');
                          @endphp
                          
                          <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Stories <span class="required"></span> </label>
                                <select name="testimonials_id[]" class="selectpicker" multiple  class="col-12 m-t-20 p-l-0">
                                     @foreach ($story as $item)
                                        <option @if(in_array($item->id,$old_story)) {{'selected'}} @endif  value="{{$item->id}}"> {{$item->name}}</option>    
                                     @endforeach
                                </select>
                             </div>
                          </div>
                        
                         <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Featured<span class="required"></span> </label>
                                <select name="featured_id[]" class="selectpicker" multiple  class="col-12 m-t-20 p-l-0">
                                     @foreach ($featured as $item)
                                        <option @if(in_array($item->id,$old_featured)) {{'selected'}} @endif  value="{{$item->id}}"> {{$item->name}}</option>    
                                     @endforeach
                                </select>
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
    <script src="{{asset('admin/assets/js/form.min.js')}}"></script>
      

      
    
      <script src="{{asset('admin/assets/js/pages/forms/form-data.js')}}"></script>
@endsection

