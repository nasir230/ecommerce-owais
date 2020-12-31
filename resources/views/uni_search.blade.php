@extends('layouts.app1')
@section('title','All Universities')
@section('meta','Meta')

@section('css')
  @php
     $img = asset("front/img/graduation.jpg");
  @endphp

<style>
  .home-banner{
     /* background-image: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,0.4)),url({{$img}});
     background-position: center; */
     background: #E30613;
  }

.newsletter i{
  display: flex;

}

  
</style>
      
@endsection

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
            <button type="button" class="btn btn-online markcon-gray font-weight-bold">Book Your Free Consultation
            </button>
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
              <span><i class="fa fa-bell text-white" aria-hidden="true"></i><p class="text-white mb-0 d-inline pr-md-3 font-size-14">Notification</p>

                <div style="display: inline-block"  class="dropdown">
                  <button style="background: none;border: none;"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img style="width: 39px;height: 37px;cursor: pointer; border-radius:40px" class="img-fluid" src="{{asset(Auth::user()->profile->photo)}}" alt="">
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}">Profile</a>
                  <a class="dropdown-item" href="{{route('logoutuser')}}">Logout</a>
                  </div>
                </div>
              
              </span></span>
          </div>
      @else
          <div class="row c-pr">
    
            <div class="col-lg-3 col-md-3 offset-lg-1 offset-0 d-flex py-1 py-md-0">
              <form class="fix-search-emp pt-2" action="{{route('search')}}" method="get" >
              <i class="fa fa-search text-white fix-search-emp pr-1" aria-hidden="true"></i>
                <input name="s" type="text" class="w-50 d-inline-block bg-transparent border-none placeholder-text" id="inputLearn" placeholder="Search">
              </form>
            </div>
            <div class="col-lg-4 col-md-4 pt-2">
                <span class="px-lg-3">
                  <a class="role_partner text-white" style="cursor: pointer;" data-toggle="modal" data-target="#login"> For Partners</a>    
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

  <!-- jumbotron-box start-->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0 border-none">
            <div class="jumbotron card mb-0 p-0 border-none">
                    <div class="home-banner">
                      <div class="container-fluid pt-4">
                        <div class="row justify-content-center">
                          <div class="col-md-10">
                            <div class="d-md-block d-sm-block searceher">
                            <div class="line-what-we-can">
                              <div class="container-fluid">
                                <div class="row justify-content-center">
                                  <div class="col-md-10 col-sm-12 pl-lg-0 pl-md-1">
                                  <h3 class="font-weight-bold text-left ">Search For UK University Course</h3>
                                  </div>
                                </div>
                                <form action="{{route('universities.search')}}" method="post">
                                    @csrf
                                  <div class="row">
                                    <div class="col-md-10 col-sm-12">
                                      <div class="container-fluid px-0 search-padding">
                                        <div class="form-row">
                                            <div class="form-group col-md-4 offset-md-1 p-0 pl-2p">
                                                    <input value="{{$text}}" name="text" type="text" class="form-control border-none btr-bbr-none" id="inputLearn"
                                                    placeholder="What do you want to learn?">
                                            </div>
                                        <div class="form-group col-md-3 border-none p-0" style="margin-right: -1px;">
                                              <div class="select">
                                                <select name="courses"  id="inputCourse" class="form-control border-none br-none">
                                                  <option value="all" >All Courses</option>
                                                  @foreach (Con::courses() as $item)
                                                    <option @if($old_course == $item->id) {{'selected'}} @endif value="{{$item->id}}"> {{$item->name}}</option>    
                                                  @endforeach
                                                </select>
                                              </div>
                                          </div>
                                          <div class="form-group col-md-3 border-none p-0">
                                               @php   $types= Con::All_Type(); @endphp
                                              <div class="select">
                                                <select name="type" id="inputTitle" class="form-control border-none br-none w-100">
                                                  <option value='all'>All Types</option>
                                                    @foreach($types as $type)
                                                     <option @if($old_type == $type->name ) {{'selected'}} @endif  >{{$type->name}}</option>
                                                    @endforeach
                                               </select>
                                              </div>
                                          </div>
                                            <div class="form-group col-md-1 p-0 text-left">
                                                <button class="btn btn-online brl-none my-sm-0 btn-mob" type="submit"><i
                                                class="fa fa-search markcon-gray" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                  </form>
                                <div class="row justify-content-center">
                                  <div class="col-md-10 col-sm-12 pl-lg-1 pl-md-1">
                                    <p class=" d-md-block d-none d-sm-block font-weight-bold text-left ">Home &gt; <u> UK University Crash Course </u></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>

  <!-- jumbotron-box end-->


  <!-- about-section-start -->

  <div class="container-fluid bg-gray">
    <div class="container">
        <div class="container px-md-5 py-3">
            <h3 class="px-md-5 font-weight-600 markcon-gray">UK University Course Search Results</h3>
            <p class="px-md-5 markcon-gray">Complete profiles for the UK Universities , including information on: courses entry requirements , fees , sevices for international , ranking , location</p>
        </div>
        <div class="container px-md-5">
            <div class="row px-md-5">
                @php
                    $Universities = Con::Universities();
                  
                @endphp
                @if(count($data) > 0)
                        @foreach ($data as $item)
                        <div class="col-md-4 pb-3 pb-md-0">
                            <div class="card shadow-course border-none">
                                <div class="bg-white p-3 text-center h-100">
                                    <img src="{{asset($item->logo)}}" class="img-fluid" alt="...">
                                </div>
                                <div style="background-color:{{$item->color}}" class="card-body p-3 text-center  text-white">
                                <h5 class="card-title mb-md-0"><a href="{{route('course',$item->id)}}" class="text-white">View Courses</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                @else
                
                <div class="col-md-12">
                    <h1 style="text-align: center;font-size: 27px;" class="font-weight-600 markcon-gray" >No University Found</h1> 
                </div>
               @endif 
            
            </div>
        </div>
     
        <div class="container px-md-5 py-3">
            <p class="px-md-5  markcon-gray">
                For more information on applying to any of the following UK unversities , arrange a <u><a href="">Free online consultation</a></u>
            </p>
        </div>
    </div>

</div>
<div class="container-fluid px-md-5 py-3 pb-3 bg-gray">
    <div class="container px-md-5">
      <div class="container px-0 px-md-2">
        <h3 class="markcon-gray font-weight-600 pl-md-5 pl-0 pl-sm-0">
          Top Stories
        </h3>
      </div>
      <div class="px-md-5">
        <div id="carouselSecondControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-12 pr-md-0 p-0">
                    <img src="{{asset('front/img/story-one.png')}}" class="img-fluid w-100 h-100" alt="">
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-12 bg-red p-xl-4 p-lg-2">
                    <div class="text-white p-3">
                      <i class="fa fa-quote-left pr-2"></i>
                      <h3 class="font-italic times-roman">Getting a degree from UK university will make me more
                        attractive to overseas and multinational employers, and also boost my profile when i go into
                        private practice in the near future
                      </h3>
                      <i class="fa fa-quote-right pr-2"></i>
                      <p class="mb-0 mt-md-3">
                        Godwin , 40 , BA (Hons) Accounting and Financial Management
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-12 pr-md-0 p-0">
                    <img src="{{asset('front/img/story-one.png')}}" class="img-fluid w-100 h-100" alt="">
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-12 bg-red p-xl-4 p-lg-2">
                    <div class="text-white p-3">
                      <i class="fa fa-quote-left pr-2"></i>
                      <h3 class="font-italic times-roman">Getting a degree from UK university will make me more
                        attractive to overseas and multinational employers, and also boost my profile when i go into
                        private practice in the near future
                      </h3>
                      <i class="fa fa-quote-right pr-2"></i>
                      <p class="mb-0 mt-md-3">
                        Godwin , 40 , BA (Hons) Accounting and Financial Management
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div></div>
          <a class="prev-control d-none d-md-flex" href="#carouselSecondControls" role="button" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="next-control d-none d-md-flex" href="#carouselSecondControls" role="button" data-slide="next">
            <i class="fa fa-chevron-right"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- about-section-end -->
</div>

   
    


  
  

  @endsection

  @section('js')
  <script>
    $(document).ready(function () {
      $('.print-hover').hover(function () {
        $('.img-top').addClass('d-block');
      },
        function () {
          $('.img-top').removeClass('d-block');
        });
    });   
  </script>
  @endsection