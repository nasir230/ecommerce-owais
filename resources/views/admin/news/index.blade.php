@extends('admin.layouts.admin')
@section('title','All News')

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
              <h4 class="page-title">All News</h4>
            </li>
            <li class="breadcrumb-item bcrumb-1">
            <a href="{{route('admin.home')}}">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item bcrumb-2">
              <a href="{{route('admin.news.index')}}"> News</a>
            </li>
            <li class="breadcrumb-item active">All News</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="header">
            <h2><strong>All</strong> News</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                  <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                      <li>
                          <a href="{{route('admin.news.create')}}"> Create News</a>
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
                    <th class="center">Title</th>
                    <th class="center">Status</th>
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($modules as $key => $data)
                  <tr class="odd gradeX">
                  <td class="center"> <img width="50px" src="{{asset($data->thumbnail)}}" ></td>   
                   <td class="text-center" >{{$data->title}}</td>
                   <td class="text-center">{{$data->status}}</td>
                   <td class="text-center">
                            <a title="Edit" href="{{route('admin.news.edit', $data->id)}}"  class="btn btn-tbl-edit">
                                <i class="material-icons">create</i>
                            </a>
                            <a  title="View" href="{{route('admin.news.view', $data->id)}}"  class="btn btn-tbl-edit">
                                <i class="material-icons">visibility</i>
                            </a>
                            <a  title="Delete" href="{{route('admin.news.delete', $data->id)}}"  class="btn btn-tbl-edit">
                                <i class="material-icons">delete_forever</i>
                            </a>
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
