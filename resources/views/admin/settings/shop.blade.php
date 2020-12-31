
@extends('admin.layouts.admin')
@section('title','Shop Settings')

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
                <h4 class="page-title">Shop</h4>
              </li>
              <li class="breadcrumb-item bcrumb-1">
              <a href="{{route('admin.home')}}">
                  <i class="fas fa-home"></i> Home</a>
              </li>
              <li class="breadcrumb-item bcrumb-2">
                <a href="{{route('admin.home')}}" >Settings</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Shop</strong> Settings</h2>
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
            <form method="post" enctype="multipart/form-data" action="{{route('admin.settings.update')}}" class="setting-from form-horizontal">
                @csrf
                    <div class="form-body">
                        <div class="d-none form-group row">
                            <div class="col-md-3 align-self-center mb-0">
                                <label class="control-label">Tax</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text"  name="shop_tax"  value="{{number_format(Con::settings()->shop_tax,2)}}" class="form-control" /> 
                            </div>
                        </div>
                        <div class="form-group row">
                               <div class="col-md-3 align-self-center mb-0 ">
                                <label class="control-label  ">Shop Discount</label>
                               </div>
                              <div class="col-md-9">
                                <input type="text" name="shop_discount" value="{{number_format(Con::settings()->shop_discount,2)}}" class="form-control " /> 
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

