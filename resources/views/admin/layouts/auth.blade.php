<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Responsive Admin Template" />
        <meta name="author" content="Sunray" />

        <title>@yield('title')</title>

     <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{asset('admin/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- bootstrap -->
	<link href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css')}}" />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/pages/extra_pages.css')}}">
	<!-- favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/img/favicon.ico')}}" /> 
</head>
<body>
   @yield('content')
    <!-- start js include path -->
     <script src="admin/assets/plugins/jquery/jquery.min.js" ></script>
    <!-- bootstrap -->
    <script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="admin/assets/js/pages/extra_pages/extra_pages.js"></script>
    <!-- end js include path -->
</body>

<!-- Mirrored from radixtouch.in/templates/admin/sunray/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 16:46:24 GMT -->
</html>