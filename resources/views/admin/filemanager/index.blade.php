@extends('admin.layouts.admin')
@section('title','FileManager')

@section('css')

<style>

</style>
       
@endsection

@section('content')
<section class="">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">FileManager</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{route('admin.home')}}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">FileManager</li>
                    </ul>
        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>File Manager</strong>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a data-toggle="modal" data-target="#exampleModal" class="" type="button" >Add New File</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div  class="list-unstyled row clearfix">
                            @foreach ($filemanager as $item)
                            
                            @switch($item->extension)
                            @case('png')
                                  <div class="col-lg-2">
                                    <ul class="header-dropdown m-r--5">
                                      <li class="dropdown">
                                       <a title="Status" href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                           <img style="height:172px" class="w-100 thumbnail" src="{{asset($item->url)}}" >
                                           <h4 style="font-size:12px;" class="py-2 text-dark text-center" >{{$item->title}}</h4>
                                       </a>
                                        <ul class="dropdown-menu pull-right" style="">
                                           <li><a href="{{route('admin.filemanager.delete',$item->id)}}" >Delete</a></li>
                                       </ul>
                                     </li>
                                 </ul>
                                </div>
                                @break
                        
                            @default
                                <div class="col-lg-2">
                                    <ul class="header-dropdown m-r--5">
                                      <li class="dropdown">
                                       <a title="Status" href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                           <img style="height:172px" class="w-100 thumbnail" src="{{asset($item->url)}}" >
                                           <h4 style="font-size:12px;" class="py-2 text-dark text-center" >{{$item->title}}</h4>
                                       </a>
                                        <ul class="dropdown-menu pull-right" style="">
                                           <li><a href="{{route('admin.filemanager.delete',$item->id)}}" >Delete</a></li>
                                       </ul>
                                     </li>
                                 </ul>
                                </div>
                        @endswitch
                              
                            @endforeach
                        </div>
                     {{-- <div id="root" ></div> --}}
                    </div>
                </div>
            </div>
         </div>
    </div>
    


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">File Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" 
                action="{{route('admin.filemanager.upload')}}" >
                @csrf
                <div class="modal-body">
                        <label >Upload File</label>
                         <input class="form-control" type="file" name="file" >
                        <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect">Save</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>

@endsection


@section('js')

     <script>
    
     </script>

@endsection
