@extends('admin.layouts.admin')
@section('title','All Roles')

@section('css')

    <!-- data tables -->
    <link href="{{asset('admin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
       
@endsection

@section('content')

<div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
              <h4 class="page-title">All Roles</h4>
            </li>
            <li class="breadcrumb-item bcrumb-1">
            <a href="{{route('admin.home')}}">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item bcrumb-2">
              <a href="{{route('admin.roles.index')}}" >Roles</a>
            </li>
            <li class="breadcrumb-item active">All Roles</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="header">
            <h2><strong>All</strong> Roles</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                  <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                      <li>
                          <a href="{{route('admin.roles.create')}}"> Create New</a>
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
                  @foreach ($roles as $key => $role)
                  <tr class="odd gradeX">
                         <td class="center" >{{ $key }}</td>
                         <td class="text-left" >{{$role->name}}</td>
                         <td class="text-left">{{$role->detail}}</td>
                        
                         <td class="text-center">
                            @can('roles.edit','none')
                            <a href="{{route('admin.roles.edit', $role->id)}}" title="Edit"  class="btn btn-tbl-edit">
                                <i class="material-icons">create</i>
                            </a>
                            @endcan

                            @can('roles.delete','none')
                            <form style="display:inline" title="Delete" action="{{route('admin.roles.destroy',$role->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <Button class="btn btn-tbl-delete" >
                                    <i class="material-icons">delete_forever</i>
                                </Button>
                            </form>
                            @endcan
                         @can('roles.view_all_permissions','none')
                        <a href="{{route('admin.roles.permissions',$role->id)}}" title="Roles Permissions" class="btn btn-tbl-delete">
                                <i class="fa fa-key "></i>
                              </a>
                        @endcan
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
</div>

@endsection


@section('js')
        <!-- data tables -->
        <script src="{{asset('admin/assets/js/table.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/pages/tables/jquery-datatable.js')}}"></script>

@endsection
