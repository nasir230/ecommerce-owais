@extends('layouts.app1')
@section('title','Home')
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
    <!-- banner -->


  

    <div class="container-fluid bg-banner py-5">
      <div class="row pl-md-5 py-5">
          <div class="col-md-6 px-0 pl-md-5 pl-3 py-5">
              <h2 class="text-white mb-1">Canada's 1st</h2>  
              <h1 class="text-white display-3 fw-600">Zero Waste</h1>
              <a href="all-products.html"><button class="btn btn-purple">Pet Shop</button></a> 
          </div>
          <div class="col-md-6 px-0 py-5">
              
          </div>
      </div>
  </div>


  <!-- featured-product -->
  <div class="container-fluid px-md-5 py-5 cate">
      <div class="row px-md-5">
          <div class="col-md-12 text-center pb-2 main-title">
              <h1 class="mb-0 fw-600">Our Categories</h1>
          </div>
          <div class="container">
              <div class="row justify-content-center pb-4">
                  <div class="col-md-2 col-6">
                      <div class="border-line-black"></div>
                  </div>
              </div>
          </div> 
      </div>
      <div class="row">
          @php
            $cat = Con::allcat();
            $cat = $cat->where('parent',0);  
            //dd($cat); 
          @endphp

          @foreach ($cat as $item)
          <div class="col-md-4 col-12 col-sm-6 text-center ">
                <div>
                    <a href="{{route('productsByCat',$item->slug)}}" > 
                      <img src="{{asset($item->thumbnail)}}" class="img-fluid w-100" >
                    </a>
                </div>
          </div>
          @endforeach
        
         </div>    
      </div>
  </div>

  <!-- featured-brand -->
  <div class="container px-sm-0 px-md-5 py-5">
      <div class="row px-md-5">
          <div class="col-md-12 text-center pb-2 main-title">
              <h1 class="mb-0 fw-600">Our Featured</h1>
          </div>
          <div class="container">
              <div class="row justify-content-center pb-4">
                  <div class="col-md-2 col-6">
                      <div class="border-line-black"></div>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="row product-card">
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4 show-more">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/product1.png')}}" alt="Card image cap">
                              <div class="container-fluid" id="view1">
                                  <div class="row justify-content-end">
                                      <div class="col-md-12 view1-12">
                                          <div class="border-heart">
                                              <i class="fa fa-heart-o" aria-hidden="true"></i>
                                          </div>
                                      </div>
                                      <div class="col-md-12 view1-12 mt-2">
                                          <div class="border-heart">
                                              <i class="fa fa-search" data-toggle="modal" data-target="#product"  aria-hidden="true"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <div id="btnCart1">
                        
                              Add to Bowl
                          </div>
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Stella & Chewy's Super Beef</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4 show-more">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/greenies.png')}}" alt="Card image cap">
                          <div class="container-fluid" id="view2">
                              <div class="row justify-content-end">
                                  <div class="col-md-12 view1-12">
                                      <div class="border-heart">
                                          <i class="fa fa-heart-o" aria-hidden="true"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-12 view1-12 mt-2">
                                      <div class="border-heart">
                                          <i class="fa fa-search" data-toggle="modal" data-target="#product"  aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      <div id="btnCart2">
                          Add to Bowl
                      </div>
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Greenies Original Regular</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4 show-more">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/vet.png')}}" alt="Card image cap">
                          <div class="container-fluid" id="view3">
                              <div class="row justify-content-end">
                                  <div class="col-md-12 view1-12">
                                      <div class="border-heart">
                                          <i class="fa fa-heart-o" aria-hidden="true"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-12 view1-12 mt-2">
                                      <div class="border-heart">
                                          <i class="fa fa-search" data-toggle="modal" data-target="#product"  aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div id="btnCart3">Add to Bowl</div>
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Vet's Best Aches</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4 show-more">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/product4.png')}}" alt="Card image cap">
                          <div class="container-fluid" id="view4">
                              <div class="row justify-content-end">
                                  <div class="col-md-12 view1-12">
                                      <div class="border-heart">
                                          <i class="fa fa-heart-o" aria-hidden="true"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-12 view1-12 mt-2">
                                      <div class="border-heart">
                                          <i class="fa fa-search" data-toggle="modal" data-target="#product"  aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div id="btnCart4">Add to Bowl</div>
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Vet's Best Aches</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- new-arrival -->
  <div class="container-fluid bg-promise">
      <div class="row py-5">
          <div class="col-md-12 py-3 text-center">
              <h3 class="text-white mb-1">Our <span class="text-yellow">Promise</span> To You</h3>
              <h1 class="text-white">The ECO-Friendly way to shop for your pet</h1>
              <div class="container">
                  <div class="row justify-content-center pb-4">
                      <div class="col-md-1 col-6 py-1">
                          <div class="border-line-yellow"></div>
                      </div>
                  </div>
              </div>
              <a href="our-story.html"><button type="button" class="btn btn-shop">Learn more</button></a>
          </div>
      </div>
  </div>
   <!-- featured-brand -->

   <div class="container px-sm-0 px-md-5 py-5">
      <div class="row px-md-5">
          <div class="col-md-12 text-center pb-2 main-title">
              <h1 class="mb-0 fw-600">Latest Pre-Loved Products</h1>
          </div>
          <div class="container">
              <div class="row justify-content-center pb-4">
                  <div class="col-md-2 col-6">
                      <div class="border-line-black"></div>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="row product-card">
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4 show-more">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/product1.png')}}" alt="Card image cap">
                           <div class="container-fluid" id="view5">
                                  <div class="row justify-content-end">
                                      <div class="col-md-12 view1-12">
                                          <div class="border-heart">
                                              <i class="fa fa-heart-o" aria-hidden="true"></i>
                                          </div>
                                      </div>
                                      <div class="col-md-12 view1-12 mt-2">
                                          <div class="border-heart">
                                              <i class="fa fa-search" data-toggle="modal" data-target="#product"  aria-hidden="true"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <div id="btnCart5">
                              Add to Bowl
                          </div>
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Stella & Chewy's Super Beef</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/greenies.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Greenies Original Regular</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/vet.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Vet's Best Aches</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/product4.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Vet's Best Aches</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
              </div>
              <div class="row product-card pt-4">
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/product1.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Stella & Chewy's Super Beef</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/greenies.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Greenies Original Regular</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/vet.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Vet's Best Aches</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="card p-4">
                          <img class="card-img-top-product img-fluid" src="{{asset('front/assets/images/product4.png')}}" alt="Card image cap">
                      </div>
                      <div class="text-center">
                          <p class="mb-0 text-product">Vet's Best Aches</p>
                          <p class="mb-0 fw-600 fs-18">$17.99</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


 
  @endsection
  
@section('js')
      
@endsection