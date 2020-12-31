
@extends('admin.layouts.admin')
@section('title','Create Product')

@section('css')

<link href="{{asset('admin/assets/css/form.min.css')}}" rel="stylesheet" />

<style>
    .remove{
        right: 0px;
        position: absolute;
        background: red;
        color: white;
        border-radius: 10px;
    }

    [data-role="dynamic-fields"] > .form-inline + .form-inline {
    margin-top: 0.5em;
}

[data-role="dynamic-fields"] > .form-inline [data-role="add"] {
    display: none;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="add"] {
    display: inline-block;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="remove"] {
    display: none;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style">
              <li class="breadcrumb-item">
                <h4 class="page-title">Create Product</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.products.index')}}" >Product</a>
              </li>
              <li class="breadcrumb-item active">Create</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Create</strong> Product</h2>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.products.store')}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Title
                                    <span class="required"></span>
                                </label>
                                <input required type="text" name="title" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Short Description
                                    <span class="required"></span>
                                </label>
                                <textarea class="form-control" name="excerpt"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Price
                                    <span class="required"></span>
                                </label>
                                <input required type="number" name="price" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">old Price
                                    <span class="required"></span>
                                </label>
                                <input required type="number" name="old" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Product Category
                                    <span class="required"></span>
                                </label>
                                <select name="cat"  >
                                    @foreach ($cat as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>    
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
                           </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Details
                                    <span class="required"></span>
                                </label>
                                <textarea name="des" id="editor1">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <div class="col-12">
                                <span class="add_phone" style="float: right">Add</span>
                            </div>
                            <div class="col-12 con ">

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

