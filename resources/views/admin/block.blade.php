@extends('admin.layouts.auth')
@section('title',__('actions.blocked'))

@section('content')
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form class="form-404">
                <span class="login100-form-logo">
                    <img alt="" src="../assets/img/hospital.png">
                </span>
                <span class="form404-title p-b-34 p-t-27">
                    Blocked
                </span>
                <p class="content-404">Oops, You Are Blocked For Some Reason</p>
                <div class="container-login100-form-btn">
                    
                    <a class="login100-form-btn" href="{{ route('logoutuser') }}">
                        Logout
                     </a>
                
                </div>
                {{-- <div class="text-center p-t-27">
                    <a class="txt1" href="#">
                        Need Help?
                    </a>
                </div> --}}
            </form>
        </div>
    </div>
</div>
       <h1>You Are Blocked</h1>
@endsection



