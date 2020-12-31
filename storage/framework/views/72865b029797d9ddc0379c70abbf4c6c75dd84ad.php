<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
  	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="msapplication-TileColor" content="#162946">
	  <meta name="theme-color" content="#e72a1a">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="mobile-web-app-capable" content="yes">
	  <meta name="HandheldFriendly" content="True">
    <meta name="Duplex VehiclesOptimized" content="320">
   
    <link rel="icon" href="<?php echo e(asset(Con::settings()->app_fav_icon)); ?>" type="image/x-icon">
	  <meta name="description" content="<?php echo e(Con::settings()->app_meta); ?>">
    <meta name="keywords" content="<?php echo e(Con::settings()->app_keywords); ?>">
    <meta name="author" content="<?php echo e(Con::settings()->app_name); ?>">
     
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
     <title> <?php echo $__env->yieldContent('title'); ?> - <?php echo e(Con::settings()->app_name); ?></title>
     
     <link href="<?php echo e(asset('front/assets/theme-css/theme-plugin.css')); ?>" rel="stylesheet" />
     <link href="<?php echo e(asset('front/assets/theme-css/theme.min.css')); ?>" rel="stylesheet" />
     <link href="<?php echo e(asset('front/assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
     <link href="<?php echo e(asset('front/assets/css/style.css')); ?>" rel="stylesheet"/>
     <link href="<?php echo e(asset('front/assets/css/query.css')); ?>" rel="stylesheet"/>

     <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo e(asset('front/assets/plugin/font-awesome-4.7.0/css/font-awesome.css')); ?>">
 
    <?php echo $__env->yieldContent('css'); ?>

        <style>
            .alert{
              position: fixed;
              top: 14px;
              right: 0px;
              z-index: 115;
              width: 96%;
              margin: 0px 11px;
            }
        </style>  
        <?php
            // $lang = Config::get('app.locale');
            //  if(Session::has('locale')){
            //     $lang = Session::get('locale');} 
        ?>
</li>

</head>
<body class="" >
      <?php if(session()->has('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?php echo e(session('success')); ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php endif; ?>
    
    <?php if(session()->has('warning')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Warning!</strong> <?php echo e(session('warning')); ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php endif; ?>
    
        <!-- topbar -->
        <div class="container-fluid bg-darkpurple py-3">
          <div class="row">
            <div class="col-6 pl-md-5 head">
               <div class="d-flex pl-md-5 align-items-center">
                 <img src="<?php echo e(asset('front/assets/images/barker.png')); ?>" class="img-fluid bag pr-1" style="width: 30px; margin-top: 0px; height: 25px;">
                <span class="text-white fs-14 fw-600">Contact Us</span>
                </div>
            </div>
            <div class="col-6 head">
                <div class="d-flex justify-content-end">
                <img src="<?php echo e(asset('front/assets/images/dog-acc.png')); ?>" class="img-fluid bag pr-1" style="width: 30px;margin-top: 0px;height: 25px;">
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item dropdown account text-white fs-14 fw-600 mt-m10">
                          <a class="nav-link dropdown-toggle px-0" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                          <div class="dropdown-menu account-drop" aria-labelledby="account">
                          <a class="dropdown-item px-2" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                          <?php if(Auth::user()->role->name == 'Admin'): ?>
                          <a class="dropdown-item px-2" href="<?php echo e(route('admin.home')); ?>">Admin Panel</a>
                          <?php endif; ?>
                            <a class="dropdown-item px-2" href="<?php echo e(route('dashboard')); ?>">My Orders</a>
                          <a class="dropdown-item px-2" href="<?php echo e(route('logoutuser')); ?>">Logout</a>
                          </div>
                        </li>
                      <?php else: ?>
                        <li class="nav-item dropdown account text-white fs-14 fw-600 mt-m10">
                          <a class="nav-link dropdown-toggle px-0" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                          <div class="dropdown-menu account-drop" aria-labelledby="account">
                            <a class="dropdown-item px-2" href="<?php echo e(route('signin')); ?>">Signin</a>
                            <a class="dropdown-item px-2" href="<?php echo e(route('signup')); ?>">Signup</a>
                          </div>
                        </li>
                    <?php endif; ?>
                </div>
              </div>
           </div>
        </div>
        <div class="container-fluid">
            <div class="row py-2">
                <div class="col-md-4 col-sm-12 text-center">
                <a href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(asset(Con::settings()->app_fav_icon)); ?>" class="img-fluid" >
                    </a>
                </div>
                <div class="col-md-5 col-sm-12 text-center">
                    <div class="container-fluid pt-2">
                        <div class="row justify-content-center">
                            <div class="col-md-12 pr-md-5 col-sm-10">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control bl-tb search-top pt-0" placeholder="Search Here">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text br-tb" id="inputGroup-sizing-sm">
                                          <img src="<?php echo e(asset('front/assets/images/paw.png')); ?>" class="img-fluid bag" alt="" style="width:30px"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 d-sm-none d-md-block d-none pt-2">
                    <div class="text-center d-flex justify-content-center">
                      <a class="zerodark-link fs-14 pr-2 pt-2" style="cursor:pointer;" href="<?php echo e(route('cart')); ?>" > My Bowl
                          <img src="<?php echo e(asset('front/assets/images/bowl1.png')); ?>" class="img-fluid bag" style="width:30px">
                      </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar -->

      <!-- navbar -->
      <nav class="navbar navbar-expand-lg py-1 border-top">
        <div class="text-left d-md-block d-sm-block d-lg-none d-block">
            <a href="">
                <img src="<?php echo e(asset('front/assets/images/bag.png')); ?>" class="img-fluid" alt="">
            </a>
        </div>
        <span class="d-md-block d-sm-block d-lg-none d-block" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars text-zerodark"></i></span>

        <div class="collapse navbar-collapse justify-content-center" id="navbarsExample03">
          <ul class="navbar-nav nav-menu">
            <li class="nav-item active px-4">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">HOME</a>
            </li>
            <li class="nav-item px-4 fw-600">
              <a class="nav-link" href="#">DEALS & PROMOTION</a>
            </li>
            <li class="nav-item dropdown px-4 fw-600">
                <a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCT</a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                  <a class="dropdown-item" href="<?php echo e(route('products')); ?>">All Products</a>
                </div>
              </li>
            <li class="nav-item px-4 fw-600">
              <a class="nav-link" href="#">HOW IT WORKS</a>
            </li>
            <li class="nav-item px-4 fw-600">
                <a class="nav-link" href="our-story.html">OUR STORY</a>
            </li>
            <li class="nav-item px-4 fw-600">
                <a class="nav-link" href="contact-us.html">CONTACT US</a>
            </li>
            <li class="nav-item px-4 fw-600">
                <a class="nav-link pt-1" href="<?php echo e(route('sell')); ?>"><button type="button" class="btn btn-zerodark">Sell To Us</button></a>
            </li>
          </ul>
        </div>
    </nav>

    <!-- mobile-menu -->
    <div id="mySidenav" class="sidenav bg-darkpurple">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo e(route('home')); ?>" class="pb-0">Home</a>
        <a href="#" class="pb-0">DEALS & PROMOTION</a>
        <a class="nav-item try dropdown px-4 pt-0">
            <a class="nav-item dropdown-toggle pt-0 text-white" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCT</a>
            <div class="dropdown-menu mob" aria-labelledby="dropdown03">
              <a class="dropdown-item pl-2 fs-13 text-black" href="#">Action</a>
              <a class="dropdown-item pl-2 fs-13 text-black" href="#">Another action</a>
              <a class="dropdown-item pl-2 fs-13 text-black" href="#">Something else here</a>
            </div>
        </a>
        <a href="#">HOW IT WORKS</a>
        <a href="our-story.html">OUR STORY</a>
        <a href="<?php echo e(route('contact')); ?>">CONTACT US</a>
        <a href="<?php echo e(route('sell')); ?>">SELL TO US</a>
    </div>

    <?php echo $__env->yieldContent('content'); ?>
  
    <!-- Footer -->
    <div class="container-fluid bg-footer px-md-5">
      <div class="row px-md-5 justify-content-center">
          <div class="col-md-11">
              <div class="row">
                  <div class="col-md-12">
                      <footer class="page-footer font-small indigo">
                          <div class="container text-center text-md-left my-4">
                          <div class="row">
                          <div class="col-md-3 text-center border-right-white">
                            <h3 class="text-white">About Us</h3>
                            <p class="fs-13 text-link-a">Zero  Barks was founded on a single mission , to provide exceptional pet . Zero Barks supplies at affordable prices . We have accomplished this by cutting out the middle-man - meaning we manufacture our supplies and offer them
                            </p>
                         </div>
                         <hr class="clearfix w-100 d-md-none">
                         <div class="col-md-6 text-center border-right-white">
                         <h3 class="text-white mb-4">News Letter</h3>
                          <input type="email" class="form-control w-75 m-auto email-holder" placeholder="Enter your email" aria-label="Enter your email"
                          aria-describedby="button-addon2">
                          <button type="button" class="btn btn-zerodark my-3">Subscribe</button>
                          <div class="d-flex fs-24 justify-content-center">
                              <a href="#"><i class="fa fa-facebook mr-3 text-white" aria-hidden="true"></i></a>
                              <a href="#"><i class="fa fa-twitter mr-3 text-white" aria-hidden="true"></i></a>
                              <a href="#"><i class="fa fa-instagram text-white" aria-hidden="true"></i></a>
                          </div>
                        </div>
                        <hr class="clearfix w-100 d-md-none">
                        <div class="col-md-3 text-center">
                        <h3 class="text-white">Contact Us</h3>
                        <p class="fs-13 text-link-a">
                            Area Demo Store , Demo Store XYZ 345-659 Call Us: 123-456-789 , Email Us : Support@gmail.com Fax: 123456 Directly to our customers . Our supplies are value-priced so that
                        </p>
                      </div>
                    </div>
                    </div>
                 </footer>
               </div>
             </div>
              <div class="row bt-white">
                  <div class="col-md-12 text-center pt-2">
                      <h3 class="text-white fw-900">Quick Links</h3>
                  </div>
                  <div class="col-md-12 text-center">
                      <div class="d-flex justify-content-center text-link-a linker">             
                          <a href="index.html"><p class="px-2">Home</p></a>
                          <a href="#"><p class="px-2">Deals & Promotions</p></a>
                          <a href="#"><p class="px-2">How it Works</p></a>
                          <a href="our-story.html"><p class="px-2">Our Story</p></a>
                          <a href="contact-us.html"><p class="px-2">Contact Us</p></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- footer-bar -->
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 p-0">
            <div class="footer-copyright text-center py-2 text-white bg-bar fw-200"> © ZEROBARKS 2020-2021 . All Rights Reserved </div>
          </div>
      </div>
  </div>


  <script src="<?php echo e(asset('front/assets/js/jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('front/assets/js/poper.js')); ?>"></script>
  <script src="<?php echo e(asset('front/assets/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('front/assets/js/custom.js')); ?>"></script>

   <?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH D:\zmark\zmark\resources\views/layouts/app1.blade.php ENDPATH**/ ?>