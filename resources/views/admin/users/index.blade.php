@extends('admin.layouts.admin')
@section('title','All Users')

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
              <h4 class="page-title">All Users</h4>
            </li>
            <li class="breadcrumb-item bcrumb-1">
            <a href="{{route('admin.home')}}">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item bcrumb-2">
              <a href="{{route('admin.users.index')}}" >Users</a>
            </li>
            <li class="breadcrumb-item active">All Users</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="header">
            <h2><strong>All</strong> Users</h2>
            <ul class="d-none header-dropdown m-r--5">
              <li class="dropdown">
                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button"
                  aria-haspopup="true" aria-expanded="false" >
                  <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="#" onClick="return false;">Action</a>
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
                    <th class="center">Email</th>
                    <th class="center">Roll</th>
                    <th class="center">Joined Date</th>
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user) 
                        <tr class="odd gradeX">
                            <td class="table-img center">
                                <img width="40px" src="{{asset($user->profile->photo)}}" alt="">
                            </td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                            <td class="text-center">{{$user->role->name}}</td>
                            <td class="text-center">{{date_format($user->created_at,"d-M-y")}}</td>
                            <td class="center">
                                @can('users.edit','none')
                                <a href="{{route('admin.users.edit',$user->id)}}" title="Edit" class="btn btn-tbl-edit"> <i class="material-icons">create</i></a>
                                @endcan
                                @can('users.delete','none')
                                <a href="{{route('admin.users.delete',$user->id)}}" title="Delete" class="btn btn-tbl-delete">
                                    <i class="material-icons">delete_forever</i></a>
                                @endcan                               
                                <a href="{{route('admin.users.profile',$user->id)}}" title="View" class="btn btn-tbl-edit btn-xs"><i class="fa fa-user"></i></a>
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
