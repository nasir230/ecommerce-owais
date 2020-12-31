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
   @component('components.auth') @endcomponent
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
                                    <h3 class="font-weight-bold text-left ">
                                      Search For UK University Course
                                  </h3>
                                  </div>
                                </div>
                                 <!-- map-start -->
                                 @component('components.search') @endcomponent
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
                @foreach ($university as $item)
                <div class="p-2" style="    width: 300px !important;
                display: inline-block;">
                    <div class="card shadow-course border-none">
                        <div class="bg-white p-3 text-center">
                            <img src="{{asset($item->logo)}}" class="img-fluid" alt="...">
                        </div>
                        <div style="background-color:{{$item->color}}" class="card-body p-3 text-center  text-white">
                        <h5 class="card-title mb-md-0"><a href="{{route('course',$item->id)}}" class="text-white">View Courses</a></h5>
                        </div>
                    </div>
                </div>     
                @endforeach
            
            </div>
        </div>
     
        <div class="container px-md-5 py-3">
            <p class="px-md-5  markcon-gray">
                For more information on applying to any of the following UK unversities , arrange a <u><a href="">Free online consultation</a></u>
            </p>
        </div>
    </div>

</div>

<div class="container-fluid px-md-5 pt-1 pb-3 bg-gray">
  <div class="container px-md-5">
    <div class="container px-0 px-md-2">
      <h3 class="markcon-gray font-weight-600 pl-2-3rem">
        Top Stories
      </h3>
    </div>
    <div class="px-md-5">
      <div id="carouselSecondControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @php
          $story =  Con::Testimonals();
          $story = $story->where('type','story')->take(3);
     
        @endphp
        @foreach ($story as $key => $st)
          <div class="carousel-item @if($key == 3) {{'active'}} @endif ">
      
            <div class="container">
              <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 pr-md-0 p-0">
                  <img src="{{asset('front/img/story-one.png')}}" class="img-fluid w-100" alt="">
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 bg-red p-xl-4 p-lg-2">
                  <div class="text-white p-3">
                    <i class="fa fa-quote-left pr-2"></i>
                    <h3 class="font-italic times-roman">{{$st->details}}
                    <i class="fa fa-quote-right pr-2"></i>
                    <p class="mb-0 mt-md-3">{{$st->name}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
         
        
        </div>
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

<!-- one-box-carousel-end -->

  <!-- about-section-end -->
</div>

    <!-- map-start -->
    @component('components.map') @endcomponent
    
  <!-- newsletter-section-start -->
  @component('components.newsletter') @endcomponent

  <!-- newsletter-section-end -->

   <!-- client-logo-carousel-start -->
   @component('components.client') @endcomponent

<!-- client-logo-carousel-end -->
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