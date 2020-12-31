@extends('admin.layouts.admin')
@section('title','All Permissions')

@section('css')
    <!-- data tables -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
              <h4 class="page-title">All Permissions</h4>
            </li>
            <li class="breadcrumb-item bcrumb-1">
            <a href="{{route('admin.home')}}">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item bcrumb-2">
              <a href="{{route('admin.permissions.index')}}" >Permissions</a>
            </li>
            <li class="breadcrumb-item active">All Permissions</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="header">
            <h2><strong>All</strong> Permissions</h2>
            <ul class="header-dropdown m-r--5">
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
            <div class="table-responsive">
              <table class="table table-hover js-basic-example contact_list">
                <thead>
                  <tr>
                    <th class="center">#</th>
                    <th class="center">Name</th>
                    <th class="center">Detail</th>
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($permissions as $key => $permission)
                  <tr class="odd gradeX">
                         <td class="center" >{{$key}}</td>
                         <td>{{$permission->name}}</td>
                         <td class="center">{{$permission->detail}}</td>
                         <td class="center">
                            <a href="{{route('admin.permissions.edit', $permission->id)}}" title="Edit" class="btn btn-tbl-edit"> <i class="material-icons">create</i></a>
                            <form style="display:inline" action="{{route('admin.permissions.destroy',$permission->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <Button  title="Delete" class="btn btn-tbl-delete" >
                                     <i class="material-icons">delete_forever</i>
                                </Button>
                            </form>
                         </td>
                  </tr>
                  @endforeach                                               
                      </tbody>
                              </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

@endsection


@section('js')
        <!-- data tables -->
   <!-- data tables -->
   <script src="{{asset('admin/assets/js/table.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/pages/tables/jquery-datatable.js')}}"></script>

@endsection
