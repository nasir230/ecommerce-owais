@extends('layouts.app1')
@section('title','News')
@section('meta','Meta')

@section('css')
  @php $img = asset("front/img/graduation.jpg"); @endphp

<style>
  .home-banner{
     background-image: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,0.4)),url({{$img}});
     background-position: center;
     /* background: #E30613; */
  }

.background-second-day {
    background-image: linear-gradient( to bottom, rgba(245, 246, 252, 0.52), rgba(227, 6, 19) ), 
    url({{asset("front/img/uk-stu.jpg")}});
}

.newsletter i{
  display: flex;

}


#side-drawer {
    height: 100vh;
    width: 336px;
    /*Ideal width for sidebar accdg to https://forums.envato.com/t/standard-sidebar-width/75633*/
    top: 0;
    left: -336px;
    z-index: 1032;
    /*z-index of standard bootstrap navbar is 1030 + 1 offset due to side-drawer-void*/
    transition: left 0.25s ease;
}

#side-drawer-void {
    height: 100%;
    width: 100%;
    top: 0;
    z-index: 1031;
    /*z-index of standard bootstrap navbar is 1030*/
    background: rgba(0, 0, 0, .6);
}

.gallery-prev, .gallery-next {
    position: absolute;
    top: 0;
    bottom: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 15%;
    color:#9e9e9e;
    text-align: center;
    opacity: 0.5;
}

.gallery-next {
    right: -50px;
}
.gallery-prev {
    left: -50px;
}

.gallery-next:hover, .gallery-prev:focus, .gallery-next:hover, .gallery-prev:focus {
    text-decoration: none;
    outline: 0;
    opacity: 1;
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
                                    <h3 class="font-weight-bold text-left ">Search For UK University Course</h3>
                                  </div>
                                </div>
                                @component('components.search') @endcomponent
                                <div class="row justify-content-center">
                                  <div class="col-md-10 col-sm-12 pl-lg-1 pl-md-1">
                                    <p class=" d-md-block d-none d-sm-block font-weight-bold text-left ">Home &gt; <u> News </u>  </p>
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
<main role="main" class="container-fluid bg-gray">
    <div class="container px-lg-5">
        <div class="row px-lg-5">
            <div class="col-md-8 blog-main px-lg-5 px-md-4 markcon-gray">
                <div class="container-fluid px-0">
                    <div class="container px-0">
                        <div class="row">
                            <div class="col-md-12 blog-main pt-4">
                                <h2 class="font-weight-600"> News </h2>
                                <div class="container p-0">
                                  <div class="row">
                                    @php $news = Con::News(); @endphp
                                    @foreach ($news as $item)
                                    <div class="col-md-6 col-sm-6 col-12 p-0">
                                        <div class="p-3 pb-md-1">
                                          <div style="background-image: linear-gradient( to left, rgba(245, 246, 252, 0.52), rgba(227, 6, 19) ),
                                          url({{asset($item->thumbnail)}}" class="card  border-none">
                                            <div class="card-body">
                                            <h5 class="text-white font-weight-600 pt-md-5">{{$item->title}}</h5>
                                            </div>
                                          </div>
                                          <div class="gallery-first-shadow">
                                              <div class="bg-white open-about pt-4 px-4 pb-3">
                                                {{$item->excerpt}}<br>
                                                <a href="{{route('news.view',$item->id)}}" class="markcon-gray mb-0">
                                                  <p class="mb-0 pt-md-4"> READ MORE </p>
                                                </a>
                                              </div>
                                          </div>
                                        </div>
                                      </div>  
                                    @endforeach
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

  <!-- newsletter-section-start -->
  @component('components.newsletter') @endcomponent
  <!-- newsletter-section-end -->
   
     <!-- map-start -->
     @component('components.map') @endcomponent

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

<script>
    $(document).ready(function () {
      $("#pills-li-1").click(function () {
        $(".pills-1").toggleClass("fade show active");
      });
    });
    $(document).ready(function () {
      $("#pills-li-2").click(function () {
        $(".pills-2").toggleClass("fade show active");
      });
    });
    $(document).ready(function () {
      $("#pills-li-3").click(function () {
        $(".pills-3").toggleClass("fade show active");
      });
    });
  </script>
  @endsection