
@extends('admin.layouts.admin')
@section('title','Edit Product')

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
                <h4 class="page-title">Edit Product</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.products.index')}}" >Product</a>
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
            <h2><strong>Edit</strong> Product</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.products.create')}}">Create New</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.products.update',$modules->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Title
                                    <span class="required"></span>
                                </label>
                            <input required type="text" value="{{$modules->title}}" name="title" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Short Description
                                    <span class="required"></span>
                                </label>
                                <textarea class="form-control" name="excerpt">{{$modules->excerpt}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Price
                                    <span class="required"></span>
                                </label>
                                <input required type="number" value="{{$modules->price}}" name="price" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">old Price
                                    <span class="required"></span>
                                </label>
                                <input required type="number" value="{{$modules->old}}" name="old" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Product Category
                                    <span class="required"></span>
                                </label>
                                @php
                                //   dd($modules->category_id);
                                @endphp
                                <select name="category_id"  >
                                @foreach ($cat as $item)
                                
                                <option value="{{$item->id}}" @if($modules->category_id == $item->id) {{'selected'}} @endif >{{$item->title}}</option>    
                               
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
                        <div class="form-group row ">
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
                               <div class="col-md-12">
                                   @php $gallery=  explode(",",$modules->gallery); @endphp
                                   @foreach ($gallery as $item)
                                    <img width="100px" class="px-2" src="{{asset($item)}}" alt="" >
                                   @endforeach
                               </div>
                           </div>
                        </div>
                        <div class="form-group row ">
                                <div class="col-md-12">
                                    <label class="control-label">Details
                                        <span class="required"></span>
                                    </label>
                                    <textarea name="des" id="editor1">{{$modules->des}}</textarea>
                                </div>
                        </div>
                        @php
                            $attributes = unserialize($modules->attributes);
   
                        @endphp
                        <div class="form-group row  ">
                            <div class="col-12">
                                <span class="add_phone" style="float: right">Add</span>
                            </div>
                            <div class="col-12 con ">
                                @if(is_array($attributes))
                                    @foreach ($attributes as $key => $item)
                                    <div class="row" >
                                        <div class="col-6">
                                        <input style="float: left" value="{{$key}}" type="text" name="keys[]" class="form-control input-height" />
                                        </div>
                                        <div class="col-6">
                                        <input style="float: left" value="{{$item}}" type="text" name="vals[]" class="form-control input-height" />
                                        </div>
                                        <span style="float: right" class="remove">Remove</span>
                                    </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                    <a style="line-height: 2;" href="{{route('admin.products.index')}}" class="btn btn-danger waves-effect">Cancel</a>
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

       $('.con').delegate('.remove','click',function(){
            $(this).parent().remove();
         });
            $('.add_phone').click(function(){
            $('.con').append(`
                         <div class="row" >
                         <div class="col-6">
                            <input style="float: left" value="" type="text" name="keys[]" class="form-control input-height" />
                         </div>
                         <div class="col-6">
                             <input style="float: left" value="" type="text" name="vals[]" class="form-control input-height" />
                         </div>
                           <span style="float: right" class="remove">Remove</span>
                        </div>
                     `);
                });


        CKEDITOR.replace( 'editor1' );
    </script>
@endsection

