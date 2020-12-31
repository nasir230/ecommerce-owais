@extends('layouts.app1')
@section('title','Enquire')
@section('meta','Meta')

@section('css')
  @php
      
      // dd();
     $img = asset("front/img/graduation.jpg");

    //  dd($data);
  @endphp
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.1/css/flag-icon.min.css">-->
  <!--  <link rel="stylesheet" href="{{asset('front/css/flag.css')}}">-->
<style>
  .home-banner{
     background-image: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,0.4)),url({{$img}});
     background-position: center;
  }

  .background-open-day {
    background-image: linear-gradient( to left, rgba(245, 246, 252, 0.52), rgba(255, 209, 0.73) ),
    url({{asset("front/img/uk-students.jpg")}});
}

.background-second-day {
    background-image: linear-gradient( to bottom, rgba(245, 246, 252, 0.52), rgba(227, 6, 19) ), 
    url({{asset("front/img/uk-stu.jpg")}});
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
                                  
                                  @component('components.search') @endcomponent 
                                  <div class="row justify-content-center">
                                    <div class="col-md-10 col-sm-12 pl-lg-1 pl-md-1">
                                      <p class=" d-md-block d-none d-sm-block font-weight-bold text-left ">Home &gt; <u> @if(isset($s)) {{$s}}   @endif </u></p>
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

    <main role="main" class="container-fluid bg-gray">
      <div class="container px-lg-5">
          <div class="row px-lg-5">
              <div class="col-md-8 blog-main px-lg-5 px-md-4 markcon-gray">
                  <div class="container-fluid px-0">
                      <div class="container px-0">
                          <div class="row">
                              <div class="col-md-12 blog-main pt-4">
                                  <h2 class="font-weight-600">Showing Result @if(isset($s)) {{$s}}   @endif </h2>
                                  <div class="container p-0">
                                    <div class="row">
                                      @php $news = Con::News(); @endphp
                                      @if(count($data) > 0) 
                                      @foreach ($data as $item)
                                      <div class="col-md-6 col-sm-6 col-12 p-0">
                                          <div class="p-3 pb-md-1">
                                            <div style="background-image: linear-gradient( to left, rgba(245, 246, 252, 0.52), rgba(227, 6, 19) ),
                                            url({{asset($item->thumbnail)}}" class="card  border-none">
                                              <div class="card-body">
                                              <h5 class="text-white font-weight-600 pt-md-5">{{$item->title}}</h5>
                                              </div>
                                            </div>
                                            <div class="gallery-first-shadow">
                                                <div class="bg-white open-about ">
                                                  <a href="{{$item->url}}" class="markcon-gray mb-0">
                                                    <p style="text-align: center;padding: 10px 0px;" > READ MORE </p>
                                                  </a>
                                                </div>
                                            </div>
                                          </div>
                                        </div>  
                                      @endforeach

                                      @else

                                      <div class="col-md-12">
                                        <h1>No Result Found</h1>
                                      </div>



                                      @endif
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              @component('components.sidebar') @endcomponent
          </div>
      </div>
  </main>


</div>




    <!-- map-start -->
    @component('components.map') @endcomponent
    
  <!-- newsletter-section-start -->
     @component('components.newsletter') @endcomponent
  <!-- newsletter-section-end -->
  


  @endsection
  
  
  @section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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

<script src="{{asset('front/js/tel1.js')}}"></script>
<script src="{{asset('front/js/tel.js')}}"></script>

<script>
     $(document).ready(function () {
    // jQuery 
    $("#telephone").intlTelInput({
      preferredCountries: ["gb"],

    });
});
    
     
</script>
  @endsection