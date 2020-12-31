@extends('layouts.app1')
@section('title','All Universities')
@section('meta','Meta')

@section('css')
  @php
      
      // dd();
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
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}"> <b>Messages</b> </a>
                  <a class="dropdown-item" href="{{route('admin.users.profile',Auth::user()->id)}}">Account Setting</a>
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
                    <!-- <img src="{{asset('front/img/whatsapp.png')}}" class="img-fluid" style="width: 22px;" alt=""> -->
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

  <!-- jumbotron-box start-->
  <div class=" container-fluid">
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
                                    <h3 class="font-weight-bold text-left ">
                                      Search For UK University Course
                                  </h3>
                                  </div>
                                </div>
                                <form action="{{route('universities.search')}}" method="post">
                                    @csrf
                                  <div class="row">
                                    <div class="col-md-10 col-sm-12">
                                      <div class="container-fluid px-0 search-padding">
                                        <div class="form-row">
                                            <div class="form-group col-md-4 offset-md-1 p-0 pl-2p">
                                                <input name="text" type="text" class="form-control border-none btr-bbr-none h-100" id="inputLearn"
                                                    placeholder="What do you want to learn?">
                                            </div>
                                        <div class="form-group col-md-3 border-none p-0" style="margin-right: -1px;">
                                              <div class="select">
                                                <select name="courses"  id="inputCourse" class="form-control border-none br-none">
                                                  <option selected value="all" >All Courses</option>
                                                  @foreach (Con::courses() as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>    
                                                  @endforeach
                                                </select>
                                              </div>
                                          </div>
                                          <div class="form-group col-md-3 border-none p-0">
                                              <div class="select">
                                                  
                                                  @php $types= Con::All_Type(); @endphp
                                                <select name="type" id="inputTitle" class="form-control border-none br-none w-100">
                                                  <option value="all">All Type</option>
                                                  @foreach($types as $type)
                                                   <option >{{$type->name}}</option>
                                                   @endforeach
                                               </select>
                                              </div>
                                          </div>
                                            <div class="form-group col-md-1 p-0 text-left">
                                                <button class="btn btn-online brl-none my-sm-0 btn-mob h-100" type="submit"><i
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

<div class="container-fluid p-0">
  <div class="col-md-12 p-0">
      <img src="{{asset($uni->cover)}}" class="img-fluid w-100" alt="">
        <div class="container-fluid specific-tag">
          <div class="row">
            <div class="col-md-6 col-7 p-0">
              <div class="container p-0">
                <div class="row">
                  <div style="background:{{$uni->color}}" class="col-md-6 col-6 bg-ruskin">
                    <p style="visibility: hidden;">test</p>
                  </div>
                  <div class="col-md-4 col-6 p-md-4 bg-white">
                    <img src="{{asset($uni->logo)}}" class="img-fluid w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>

<div class="container-fluid">
  <div class="container px-lg-5">
      <div class="row px-lg-5">
          <div class="col-md-9 blog-main px-md-5">
              <h2 class="my-4">
                  {{$uni->name}}
              </h2>
              <p>
                  Your Search found {{count($uni->course)}} courses at <u> {{$uni->name}}</u>
              </p>
              <p>
                  If you would like to discuss your options further , please <u>
                  <a style="color: black" href="{{route('enquire')}}"  rel="noopener noreferrer">arrange your free consultation</a>  
                  </u>
              </p>
          </div>
      </div>
      <div class="container px-lg-5 p-0">
          <div class="row px-lg-5">
              <div class="col-md-12 blog-main px-md-5 p-0">
                <table class="table table-striped markcon-gray">
                  <thead>
                      <tr>
                          <th scope="col" class="pl-2">Level</th>
                          <th scope="col">Course</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($uni->course as $item)
                      <tr>
                      <th scope="row" class="pl-2">{{$item->type}}</th>
                          <td colspan="2"><a style="color: #27485B;" target="_blank" href="{{$item->url}}"> {{$item->name}} </a></td>
                          <td><a href="{{route('enquire')}}"  style="background:{{$uni->color}}" class="btn btn-block btn-enquire text-white br-none">Enquire Now</a></td>
                      </tr>   
                      @endforeach
                  </tbody>
              </table>
              </div>
          </div>
      </div>
  </div>
</div>

<main role="main" class="container-fluid bg-gray">
  <div class="container px-lg-5">
      <div class="row px-lg-5">
          <div class="col-md-8 blog-main px-md-5 markcon-gray">
            <div class="content pt-4">

       
            {!! $uni->details !!}
          </div>
          <div class="content">

          <div class="container markcon-gray">
              <p class="mb-0 ">Farringdon Building</p>
              <p class="mb-0">19 Chaterhouse St, Holborn , London EC1N6RA</p>
              <p class="d-flex mb-0"> <img class="img-fluid pr-1" src="{{asset('front/img/farringdon.png')}}" alt="">Farringdon Station</p>
          </div>
          <div class="container py-3 markcon-gray">
              <p class="mb-0 ">East India Building</p>
              <p class="mb-0">3rd Floor , Import Building , 2 Clove Crescent , Poplar , London , E14 2BE </p>
              <p class="d-flex mb-0"> <img class="img-fluid pr-1" src="{{asset('front/img/east-india.png')}}" alt="">East India</p>
          </div>

          <div class="container p-0">
          <a href="{{route('enquire')}}" style="padding-top: 2px;background:{{$uni->color}}" class="btn btn-enquire text-white btn-lg btn-mob">Enquire Now</a>
          </div>
        </div>
      </div>

          <aside class="col-md-4 blog-sidebar pb-md-3">
            <div class="p-3 mb-3rounded">
              <h6 class="border-top-black pt-1">Print or share</h6>
              <div class="d-flex pt-1 pb-2 border-bottom-black">
                <a href=""><img src="{{asset('front/img/print.png')}}" class="img-fluid" alt=""></a>
                <!-- <a href=""><img src="assets/images/print-hovered.png" class="img-fluid img-top" alt=""></a> -->
                <a href=""><img src="{{asset('front/img/mail-print.png')}}" class="img-fluid" alt=""></a>
                <a href=""><img src="{{asset('front/img/facebook.png')}}" class="img-fluid" alt=""></a>
                <a href=""><img src="{{asset('front/img/linkden.png')}}" class="img-fluid" alt=""></a>
                <a href=""><img src="{{asset('front/img/twitter.png')}}" class="img-fluid" alt=""></a>
              </div>
            </div>
          
              <div class="pb-md-3 p-3">
                  <div class="card background-open-day border-none">
                      <div class="card-body">
                          <h4 class="card-title text-icon font-weight-600">OPEN DAY.</h4>
                          <h5 class="text-white font-weight-600">OPEN DOORS.</h5>
                          <h5 class="text-white font-weight-600">OPEN FUTURE.</h5>
                          <h6 class="font-weight-600">
                              Every Saturday <br> From 10 to 1
                          </h6>
                      </div>
                  </div>
                  <div>
                      <div class="bg-white open-about p-4">
                          <span class="text-danger font-weight-600">Open day</span> at markcon is a great support , we talk about
                          seletion of course , applciation process , assessment preparation , financial support &amp; employment in UK
                          <br>
                          <p class="text-muted pt-md-4">
                              EVENTS
                          </p>
                      </div>
                  </div>
              </div>
              <div class="p-3 pb-md-1">
                  <div class="card background-second-day border-none">
                      <div class="card-body">
                          <h4 class="text-white font-weight-600 pt-md-5">What should UK Students do during corona virus outbreak ?
                          </h4>
                      </div>
                  </div>
                  <div class="shadow-course">
                      <div class="bg-white open-about p-4"><span class="text-danger font-weight-600">COVID 19</span> As you may be
                          aware , the UK Government has announced that all schools and colleges in the UK are to close from Friday
                          20 March as a response to the Covid-19 pandemic <br>
                          <p class="text-muted pt-md-4">NEWS</p>
                      </div>
                  </div>
              </div>
          </aside>
      </div>
  </div>
</main>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-11 col-sm-12">
      <div class="container-fluid">
        <div class="row bg-white zoom-09">
          <div class="col-lg-4 col-md-4 px-lg-3 py-5">
            <h1 class="popular-uni-head pl-2">
              Popular University Courses
            </h1>
          </div>
          <div class="col-lg-7 col-md-8 pr-md-0">
            <div class="container p-0">
              <div class="row popular">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 pt-md-5 pb-md-5 pt-sm-0 pb-sm-5">
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 business-border my-4 pt-md-2 pb-md-1">
                      Business &amp; Management
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 health-border my-4 law-fix pt-md-2 pb-md-1">
                      Law
                      <p class="mb-0 pl-md-2 show-hover"></p>
                    </h4>
                  </a>
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 social-border my-4 pt-md-2 pb-md-1">
                      Finance &amp; Accounting
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 pt-md-5 pb-md-5 pt-sm-0 pb-sm-5">
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 digital-border my-4 pt-md-2 pb-md-1">
                      Media &amp; Communication
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 finance-border my-4 pt-md-2 pb-md-1">
                      Hospitality &amp; Tourism
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 law-border my-4 pt-md-2 pb-md-1">
                      Medical Sciences
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 pt-md-5 pb-md-5 pt-sm-0 pb-sm-5">
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 marketing-border my-4 pt-md-2 pb-md-1">
                      Engineering &amp; Technology
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 accounting-border my-4 pt-md-2 pb-md-1">
                      Computer Science
                      <p class="mb-0 pt-md-3 show-hover"></p>
                    </h4>
                  </a>
                  <a href="" class="courses">
                    <h4 class="width-13rem px-3 all-course-border my-4 pt-md-2 pb-md-1">
                      All <br> Courses
                      <p class="mb-0 pt-md-3 show-hover pl-md-5"></p>
                    </h4>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
   </div>
</div>

</div>

  <!-- jumbotron-box end-->


  <!-- about-section-start -->


  <!-- map-start -->
  <div class="container-fluid p-md-0">
    <div class="px-md-5">
      <div class="px-md-5">
        <div class="px-md-5">
          <img src="{{asset('front/img/map.png')}}" class="img-fluid w-100" alt="">
        </div>
      </div>
    </div>
  </div>

  <!-- newsletter-section-start -->

<div class="newsletter container-fluid bg-red text-white p-4">
  <div class="row px-lg-5 px-md-0 px-sm-1 justify-content-center">
    <div class="col-md-2 col-sm-3 centered py-2 py-md-0">
      <div class="d-flex">
        <i class="fa fa-search search-fix" aria-hidden="true"></i>
      <a href="{{route('universities')}}" class="pl-14 newsletter-box  ">
          Find a course
        </a>
      </div>
    </div>
    <div class="col-md-2 col-sm-3 centered py-2 py-md-0">
      <div class="d-flex">
        <i class="fa fa-mouse-pointer point-fix" aria-hidden="true"></i>
        <a style="cursor: pointer" type="button" data-toggle="modal" data-target="#login" class="pl-14 newsletter-box role_student">
          Apply Online
        </a>
      </div>
    </div>
    <div class="col-md-2 col-sm-3 centered py-2 py-md-0">
      <div class="d-flex">
        <i class="fa fa-phone phone-fix" aria-hidden="true"></i>
      <a href="{{route('contact')}}" class="pl-14 newsletter-box">
          Contact Us
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 py-2 py-md-0 p-0">
      <div class="col-auto p-0">
        <p class="mb-0 text-center text-md-left">Get the newsletter</p>
        <label class="sr-only" for="inlineFormInputGroup">Enter your E-mail</label>
        <div class="input-group mb-md-2 py-1 py-md-0">
          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter your E-mail">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-secondary">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- newsletter-section-end -->




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