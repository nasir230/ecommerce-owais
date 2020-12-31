@extends('layouts.app1')
@section('title','Login')
@section('meta','Meta')

@section('css')
<style>
.con{
    max-width: 953px;
    margin:auto;
 } 
</style>
      
@endsection

@section('content')
<div class="page-wrapper">

        <!--hero section start-->
        
        <section class="bg-darkpurple py-6">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h2 mb-0 text-white">Signup</h1>
            </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
        </section>
    
        <div class="page-content">  
            <!--tab start-->
                <section class="bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 col-md-8 col-sm-11">
                        <div class="shadow p-6 login bg-white  text-center">
                        <img src="{{asset('front/assets/images/logo.png')}}" class="img-fluid" alt="">
                        <h4 class="text-center my-3 fw-600">Customer Login</h4>
                        <form id="contact-form" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="messages"></div>
                            <div class="form-group">
                            <input id="form_name" type="text" name="email" class="form-control" placeholder="User Email" required data-error="Username is required.">
                            <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                            <input id="form_password" type="password" name="password" class="form-control" placeholder="Password" required data-error="password is required.">
                            <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group mt-4 mb-5">
                            <div class="remember-checkbox d-flex align-items-center justify-content-between">    
                            </div>
                            </div> <button type="submit" class="btn btn-zerodark btn-block">Login Now</button>
                        </form>
                        <div class="another_login"><span> or</span></div>
                        <div class="d-flex align-items-center text-center justify-content-center mt-4">
                                <span class="text-muted mr-1">Don't have an account?</span>
                                <a href="{{route('signup')}}" class="text-purple">Sign Up</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            
            <!--tab end-->
        </div>

</div>
<!--body content end--> 
  @endsection
  
@section('js')
      
@endsection