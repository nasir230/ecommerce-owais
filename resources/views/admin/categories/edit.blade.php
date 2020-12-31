
@extends('admin.layouts.admin')
@section('title','Edit Category')

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
                <h4 class="page-title">Edit Category</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.categories.index')}}" >Category</a>
              </li>
              <li class="breadcrumb-item active">Edit</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Edit</strong> Category</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.categories.create')}}">Create New</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.categories.update',$module->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Title
                                    <span class="required"></span>
                                </label>
                            <input required value="{{$module->title}}" type="text" name="title" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Short Description
                                    <span class="required"></span>
                                </label>
                            <textarea class="form-control" name="excerpt">{{$module->excerpt}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Parent Category
                                    <span class="required"></span>
                                </label>
                                <select name="parent"  >
                                    <option value="0" @if($module->parent == 0){{'selected'}} @endif >none</option>
                                    @foreach ($modules as $item)
                                <option value="{{$item->id}}" @if($module->parent == $item->id){{'selected'}} @endif  >{{$item->title}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                 <label for="">Thumbnail</label>    
                                 <div class="file-field input-field">
                                 <div class="btn"><span>Upload</span>
                                    <input name="thumbnail" type="file">
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
                                    <a style="line-height: 2;" href="{{route('admin.categories.index')}}" class="btn btn-danger waves-effect">Cancel</a>
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

