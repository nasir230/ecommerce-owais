@section('content')
<div class="container-fluid p-0">

  <!-- main-nav-start -->

  <nav class="navbar navbar-expand-md navbar-light bg-red pl-md-5">
    <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid justify-content-center d-md-none text-center">
      <div class="row text-center w-100">
        <div class="col-5 pr-0 d-flex">
          <i class="fa fa-search text-white fix-search-mob pl-3 pt-1" aria-hidden="true"></i>
          <input type="text" class="bg-transparent form-control border-none placeholder-text pt-0" id="inputLearn" placeholder="Search">
        </div>
        <div class="col-7 px-0">
          <i class="fa fa-bell text-white" aria-hidden="true"></i>
          <p class="text-white mb-0 d-inline pr-md-3 font-size-14">
            Notification
          </p>
          <img class="img-fluid w-10 pl-2 fix-img-noti" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="">
        </div>
      </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mt-2 mt-lg-0 main-nav pl-md-5 pr-md-4 w-50">
        <li class="nav-item active">
          <div class="d-flex">
          <a href="{{route('enquire')}}" class="enq-button text-dark btn btn-online markcon-gray font-weight-bold">Book Your Free Consultation </a>
          </div>
        </li>
      </ul>
       
      @if(Auth::check())
          <div class="form-inline my-2 text-center text-md-left">
           
            <span class="custom-search-box text-md-right">
             <form  action="{{route('search')}}" method="get" class="d-inline">
              <i class="fa fa-search text-white" aria-hidden="true"></i>
              <input name="s" type="text" class="bg-transparent border-none placeholder-text w-25" id="inputLearn" placeholder="Search">
            </form>
              <span><i class="fa fa-bell-o text-white" aria-hidden="true"></i>
            
                
                <div style="display: inline-block"  class="dropdown">
                  <button style="cursor: pointer; background: none;border: none;"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p class="text-white mb-0 d-inline pr-md-3 font-size-14">Notifications</p>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}">Empty</a>
                  </div>
                </div>

                <div style="display: inline-block"  class="dropdown">
                  <button style="background: none;border: none;"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img style="width: 39px;height: 37px;cursor: pointer; border-radius:40px" class="img-fluid" src="{{asset(Auth::user()->profile->photo)}}" alt="">
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}"> <b>Messages</b> </a>
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}">Account Setting</a>
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}">Profile</a>
                  <a class="dropdown-item" href="{{route('logoutuser')}}">Logout</a>
                  </div>
                </div> 

              </span>
            </span>
     
          </div>
      @else
          <div class="row c-pr">
    
            <div class="col-lg-3 col-md-3 offset-lg-1 offset-0 d-flex py-1 py-md-0">
              <form class="fix-search-emp mb-0" action="{{route('search')}}" method="get" >
              <i class="fa fa-search text-white fix-search-emp pr-1" aria-hidden="true"></i>
                <input name="s" type="text" class="w-50 d-inline-block bg-transparent border-none placeholder-text" id="inputLearn" placeholder="Search">
              </form>
            </div>
    
            <!-- <div class="col-lg-2 col-md-2 d-flex py-md-0">
                <span class="fix-search-emp" style="cursor: pointer;" >
                    <i class="fa fa-sign-in text-white pr-1" aria-hidden="true"></i>
                    <a data-toggle="modal" data-target="#loginnn" class="text-white mb-0 d-inline pr-md-3">
                        Login </a>
                </span>
            </div> -->
            <div class="col-lg-4 col-md-4 pt-2">
                <span class="px-lg-3">
                  <a class="role_partner text-white" style="cursor: pointer;" data-toggle="modal" data-target="#login">
                     <img src="{{asset('front/img/partner-light.png')}}" class="img-fluid" style="width: 22px;" alt=""> 
                    For Partners
                  </a>    
                </span>
            </div>
            <div class="col-lg-2 col-md-2 py-2 py-md-0">
                <div class="d-flex">
                    <button data-toggle="modal" data-target="#login" type="button" class="role_partner btn btn-online markcon-gray font-weight-bold">Apply Online </button>
                </div>
            </div>
        </div>
      @endif

    </div>
  </nav>

  <!-- main-nav-end -->