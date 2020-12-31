<aside class="col-md-4 blog-sidebar py-md-3">
    <div class="container my-2">
        <ul class="list-group border-left-nav font-size-18">
            <li class="py-1 ml-4 p-2 font-weight-600 bg-transparent border-none list-style-none">
                <a href="{{route('home')}}" class="emp-head-list">
                    Discover Markcon
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent border-none">
                <a href="{{route('about')}}" class="list-employee">
                    About Us
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent 
                                    border-none">
                <a href="{{route('event')}}" class="list-employee">
                    Event Gallery
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent border-none">
                <a href="{{route('news')}}" class="list-employee">
                    News
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent border-none">
                <a href="{{route('openday')}}" class="list-employee">
                    Open Day
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent border-none">
                <a href="{{route('finance')}}" class="list-employee">
                    Finance
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent border-none">
                <a href="{{route('employability')}}" class="list-employee">
                    Employability
                </a>
            </li>
            <li class="py-1 ml-4 p-2 emp-list bg-transparent border-none">
            <a href="{{route('contact')}}" class="list-employee">
                    Contact Us
                </a>
            </li>
        </ul>
    </div>

    <div class="p-3 mb-3rounded">
        <h6 class="border-top-black pt-1">Print or share</h6>
        <div class="d-flex pt-1 pb-2 border-bottom-black">
            <a href=""><img src="{{asset('front/img/print.png')}}" class="img-fluid" alt=""></a>
            <a href=""><img src="{{asset('front/img/mail-print')}}" class="img-fluid" alt=""></a>
            <a href=""><img src="{{asset('front/img/facebook.png')}}" class="img-fluid" alt=""></a>
            <a href=""><img src="{{asset('front/img/linkden.png')}}" class="img-fluid" alt=""></a>
            <a href=""><img src="{{asset('front/img/twitter.png')}}" class="img-fluid" alt=""></a>
        </div>
    </div>
     
    @php
    $testimonals =  Con::news()->take(1);
  @endphp
  @foreach ($testimonals as $item)
    <div class="pb-md-3 p-3">
        <div class="card background-open-day border-none">
            <div class="card-body">
            <h5 class="text-white font-weight-600">{{$item->title}}</h5>
            </div>
        </div>
        <div class="gallery-first-shadow">
            <div class="bg-white open-about p-4">
                 {{$item->excerpt}}
                <br>
                <p class="text-muted pt-md-4">
                    NEWS
                </p>
            </div>
        </div>
    </div>
    @endforeach

 
</aside>