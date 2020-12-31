@extends('layouts.app1')
@section('title','All Products')
@section('meta','All Products')

@section('css')
<style>
.con{
    max-width: 953px;
    margin:auto;
 } 

 .pagination li {
   border:1px solid lightgray;
 }

 .pagination li a {
   color:#212121;
   padding: 20px 10px;  
 }

 .pagination .active a {
   color:#754C9B;
 }

 .sidebar a:hover {
  color:#754C9B!important;
 }

 .sidebar  .active {
  color:#754C9B!important;
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
                  <h1 class="h2 mb-0 text-white">All Products  </h1>
              </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
        </section>
        <div class="page-content">  

          <section>
            <div class="container">
              <div class="row">
                <div class="col-lg-9 col-md-12 order-lg-1">
                <form action="{{route('productsSearch')}}" method="post">
                  @csrf
                    <div class="row mb-4 align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0"> <span class="text-dark">Showing : {{$products->currentPage()}} - {{$products->lastPage()}} of {{$products->total()}} Total</span>
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-md-end">
                      <div class="ml-2 d-flex align-items-center">
                        <select name="cat"  class="custom-select" id="inputGroupSelect03">
                            <option selected value="all" >All Category</option>
                            @foreach (Con::allCat() as $item)
                            <option @isset($category) @if( $category == $item->slug) {{'selected'}} @endif @endisset  value="{{$item->slug}}">{{$item->title}}</option>     
                            @endforeach
                        </select>
                      </div>
                      <div class="ml-2 d-flex align-items-center">
                        <select name="orderby" class="custom-select" id="inputGroupSelect01">
                          <option @isset($orderby) @if( $orderby == 'asc') {{'selected'}} @endif @endisset   value="asc">Aesc</option>
                          <option @isset($orderby) @if( $orderby == 'desc') {{'selected'}} @endif @endisset  value="desc">Desc</option>
                        </select>
                      </div>
                      <div class="ml-2 d-flex align-items-center">
                         <input class="btn btn-danger"  type="submit" value="Search"   >
                      </div>
                    </div>
                  </div>
                </form>

                <div class="row product-card mb-4">
                        @foreach ($products as $item)
                        <div class="col-md-3 col-sm-6 pb-4 px-1">
                          <div class="card p-4 show-more">
                          <a href="{{route('product',$item->slug)}}">
                              <img class="card-img-top-product img-fluid" src="{{asset($item->thumbnail)}}" >
                              </a>
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
                              <a href="{{route('cart.add',$item->id)}}">Add to Bowl</a>
                              </div>
                          </div>
                          <div class="text-center">
                          <p class="mb-0 text-product">{{$item->title}}</p>
                          <p class="mb-0 fw-600 fs-18">${{$item->price}}</p>
                          </div>
                        </div> 
                          @component('components.productView',['product' => $item ]) @endcomponent
                           
                      @endforeach
                  </div>
                </div>

                <div class="col-lg-3 col-md-12 sidebar mt-8 mt-lg-0">
                  <div>

                    <div class="widget widget-categories mb-4 border rounded p-4">
                      <h5 class="widget-title mb-3" style="font-weight:600;">Categories</h5>
                      <div>
                        @foreach (Con::allCat() as $item)
                        <div class="pt-1">
                          <h6 class="mb-0">
                           <a   href="{{route('productsByCat',$item->slug)}}" class=" @if(request()->segment(2) == $item->slug) {{'active'}} @endif link-title" style="font-weight:600;">{{$item->title}}</a>
                          </h6>
                        </div>    
                        @endforeach
                      </div>
                    </div>

                    <div class="widget widget-brand mb-4 border rounded p-4">
                        <h5 class="widget-title mb-3">Price</h5>
                        <div class="container">
                            <div class="row">
                              <div class="col-sm-12">
                                <div id="slider-range"></div>
                              </div>
                            </div>
                            <div class="row slider-labels">
                              <div class="col-12 caption">
                                <strong>Min:</strong> <span id="slider-range-value1"></span>
                              </div>
                              <div class="col-12 caption">
                                <strong>Max:</strong> <span id="slider-range-value2"></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <form>
                                  <input type="hidden" name="min-value" value="">
                                  <input type="hidden" name="max-value" value="">
                                </form>
                              </div>
                            </div>
                          </div>
                    </div>

                    <div class="widget widget-categories mb-4 border rounded p-4">
                       <h5 class="widget-title mb-3" style="font-weight:600;">Top Rated Products</h5>
                        <div>
                          @php
                                $topproduct = Con::allProduct()->take(5);
                          @endphp
                            @foreach ($topproduct as $allproducts)
                            <div class="pt-2">
                              <h6 class="">
                              <a href="{{route('product',$allproducts->slug)}}" class="link-title" style="font-weight:600;">{{$allproducts->title}}</a> 
                              </h6>
                            </div>    
                            @endforeach
                        </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
                <nav aria-label="Page navigation">
                  @if ($products->lastPage() > 1)
                  <ul class="pagination justify-content-center">
                      <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                          <a href="{{ $products->url(1) }}">
                            <span>Previous</span>
                          </a>
                      </li>
                      @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
                              <a href="{{ $products->url($i) }}">{{ $i }}</a>
                        </li>
                      @endfor
                      <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $products->url($products->currentPage()+1) }}">
                          <span>Next</span>
                        
                        </a>
                      </li>
                  </ul>
                  @endif
                </nav>
            </div>
          </section>
       </div>
        
</div>
<!--body content end--> 
  @endsection
  
@section('js')
<script src="{{asset('front/assets/js/range.js')}}"></script>
@endsection