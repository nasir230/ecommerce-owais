
@extends('admin.layouts.admin')
@section('title','Edit')

@section('css')

<link href="{{asset('admin/assets/css/form.min.css')}}" rel="stylesheet" />

<style>

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style">
              <li class="breadcrumb-item">
                <h4 class="page-title">Edit</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.forms.index')}}" >Inquiry</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Create</strong></h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.forms.create')}}">Create New</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.forms.update',$modules->id)}}" id="form_sample_1" class="form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Title
                                    <span class="required"></span>
                                </label>
                            <input required value="{{$modules->title}}" type="text" name="title" class="form-control input-height" /> 
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
                                <label class="control-label">Orignal Price
                                    <span class="required"></span>
                                </label>
                            <input required type="number" value="{{$modules->price}}" name="price" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Quantity
                                    <span class="required"></span>
                                </label>
                                <input required type="number" value="{{$modules->quantity}}" name="quantity" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Product Age (In Months)
                                    <span class="required"></span>
                                </label>
                                <input required type="text" value="{{$modules->age}}" name="age" class="form-control input-height" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Product Condition
                                    <span class="required"></span>
                                </label>
                                <select name="pr_condition"  id="exampleFormControlSelect1">
                                    <option @if($modules->price == 10) {{'selected'}} @endif >10</option>
                                    <option  @if($modules->price == 9) {{'selected'}} @endif > 9</option>
                                    <option  @if($modules->price == 8) {{'selected'}} @endif >8</option>
                                    <option  @if($modules->price == 7) {{'selected'}} @endif >7</option>
                                    <option  @if($modules->price == 6) {{'selected'}} @endif >6</option>
                                    <option  @if($modules->price == 5) {{'selected'}} @endif >5</option>
                                    <option  @if($modules->price == 4) {{'selected'}} @endif >4</option>
                                    <option  @if($modules->price == 3) {{'selected'}} @endif >3</option>
                                    <option  @if($modules->price == 2) {{'selected'}} @endif >2</option>
                                    <option  @if($modules->price == 1) {{'selected'}} @endif >1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label">Status
                                    <span class="required"></span>
                                </label>
                                <select name="status"  id="exampleFormControlSelect1">
                                    <option @if($modules->status == 'Pending') {{'selected'}} @endif >Pending</option>
                                    <option @if($modules->status == 'Approved') {{'selected'}} @endif >Approved</option>
                                    <option @if($modules->status == 'Offer Accepted') {{'selected'}} value="Offer Accepted" @endif >Offer Accepted</option>
                                </select>
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

                        @if($modules->ticket_type == 'pickup') 
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="control-label">Starting Date
                                        <span class="required"></span>
                                    </label>
                                
                                    <input readonly type="date" value="{{$modules->ticket_s_location}}"  class="form-control input-height" /> 
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Ending Date
                                        <span class="required"></span>
                                    </label>
                                    <input readonly type="date"  value="{{$modules->ticket_e_location}}"  class="form-control input-height" /> 
                                </div>
                            </div>
                        @else
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="control-label">Ticket Token
                                        <span class="required"></span>
                                    </label>
                                    <input readonly type="text" value="{{$modules->ticket_token}}"  class="form-control input-height" /> 
                                </div>
                            </div>

                        @endif
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                    <a style="line-height: 2;" href="{{route('admin.forms.index')}}" class="btn btn-danger waves-effect">Cancel</a>
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