<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Responsive Admin Template" />
        <meta name="author" content="Sunray" />

        <title>@yield('title') - {{Con::settings()->app_name}}</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset(Con::settings()->app_fav_icon)}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet">
    
    <!-- Custom Css -->
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{asset('admin/assets/css/styles/all-themes.css')}}" rel="stylesheet" />

    <style>
        .form-check .form-check-label {
            padding-left: 0px !important;
        }

        .card .table{
            /* border: 1px solid #dee2e6; */
        }
    </style>

        @yield('css')
    </head>
<body class="light" >
<div id="app" >


    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="{{asset(Con::settings()->app_fav_icon)}}" alt="admin">
            </div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->



    <!-- Top Bar -->
    @include('admin.layouts.header')

           
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            @include('admin.layouts.sidebar')
            <!-- #Menu -->
        </aside>
        <!-- #END# Right Sidebar -->
     
    </div>
        <section class="content">
            @if ($message = Session::get('success'))
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('info'))
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @yield('content')
            
            
       
        </section>
        </div>
        
         <div class="modal fade" id="filemodal" tabindex="-1" role="dialog" aria-labelledby="formModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">File Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                              @php $filemanager = Con::files();  @endphp
                              <div class="row" >
                              @foreach ($filemanager as $item)
                                        <div class="item col-2">
                                            <a class="url" data-url="{{$item->url}}">
                                            <img style="height:50px" class="w-100 thumbnail" src="{{asset($item->url)}}" > 
                                            </a>
                                            <a class="d-block text-dark">
                                            <h4 style="font-size:12px;" class="py-2 text-center" >{{$item->title}}</h4></a>
                                        </div>
                             @endforeach
                             </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                   </div>
                 </div>
             </div>
             
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/chart.min.js')}}"></script>
        <!-- Custom Js -->
        <script src="{{asset('admin/assets/js/admin.js')}}"></script>
        
        <script>
            $(document).ready(function() {
                
                var path = 'http://127.0.0.1:8000/';
                var fileid;
                var fileimg;

                function filset(id){
                  $(`#${id}`).val(url);
                }
                
                $('.filemanager').on("click", function(){
                   fileid = $(this).find('.f').prop('id');
                   fileimg = $(this).find('img').prop('id');          
                   $('#filemodal').modal('show');
                   debugger             
                });
                
                $('#filemodal .item').click(function(){
                    
                    var url = $(this).find('.url').data('url');
                    $(`#${fileid}`).val(url);
                 //   $(`#${fileimg}`).attr("src",path+url);
                    $('#filemodal').modal('hide'); 
                
                });
            
            });
        </script>

        @yield('js')
    </body>
</html>
