@extends('layouts.app1')
@section('title',$product->title)
@section('meta',$product->title)

@section('css')
<style>
.con{
    max-width: 953px;
    margin:auto;
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
            <h1 class="h2 mb-0 text-white">{{$product->title}}</h1>
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
                    <div class="col-lg-6 col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              @if($product->gallery == null)

                                <div class="carousel-inner">
                                    <div class="carousel-item active ">
                                    <img class="d-block m-auto align-items-center img-fluid" src="{{asset($product->thumbnail)}}" alt="First slide">
                                    </div>
                                </div>

                            @else
                               @php
                                  $gallery =  explode(",",$product->gallery);
                               @endphp
                                <div class="carousel-inner">
                                     <div class="carousel-item active ">
                                     <img class="d-block m-auto align-items-center img-fluid" src="{{asset($product->thumbnail)}}" >
                                     </div>  
                                      @foreach ($gallery as $item)
                                        <div class="carousel-item ">
                                          <img class="d-block m-auto align-items-center img-fluid" src="{{asset($item)}}" >
                                        </div>  
                                      @endforeach
                                </div>
                            @endif
                            <a class="carousel-control-prev prev-related" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next next-related" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <div class="product-details">
                            <h3 class="mb-0">{{$product->title}}</h3>
                        <span class="product-price h4">${{$product->price}}
                            @if($product->old != null)
                             <del class="text-muted h6 pl-2">${{$product->old}}</del></span>
                             @endif
                            <ul class="list-unstyled my-4">
                            <!--<li class="mb-2">Availibility: <span class="text-muted"> In Stock</span> -->
                            </li>
                             <li>Categories :<span class="text-muted"> {{$product->category->title}}</span>
                            </li>
                            </ul>
                            <p class="mb-4">{{$product->excerpt}}</p>
                            <div class="d-sm-flex align-items-center mb-5">
                            <div class="d-flex align-items-center mr-sm-4">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="">
                                            <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="d-sm-flex align-items-center mt-5">
                            <button class="btn btn-zerodark btn-animated mr-sm-4 mb-3 mb-sm-0"><i class="fa fa-shopping-cart mr-1"></i>Add to Bowl</button>
                            <a class="btn btn-animated btn-dark" href="#"> <i class="fa fa-heart mr-1"></i>Add To Wishlist</a>
                            </div>   
                        </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="pt-0 pb-8">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="tab product-tab">
                        <!-- Nav tabs -->
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active ml-0" id="nav-tab1" data-toggle="tab" href="#tab3-1" role="tab" aria-selected="true">Description</a>
                            <a class="nav-item nav-link" id="nav-tab2" data-toggle="tab" href="#tab3-2" role="tab" aria-selected="false">Specification</a>
                          </div>
                        </nav>
                        <!-- Tab panes -->
                        <div class="tab-content pt-5 p-0">
                          <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                            <div class="row align-items-center">
                              <div class="col-md-12">
                                {!! $product->des !!}
                              </div>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                            @php  $attributes = unserialize($product->attributes); @endphp
                            @if(is_array($attributes))
                            <table class="table table-bordered mb-0">
                              <tbody>
                                @foreach ($attributes as $key => $item)
                                <tr>
                                  <td>{{$key}}</td>
                                <td>{{$item}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!--product details end-->
     
       </div>
</div>
<!--body content end--> 
  @endsection
  
@section('js')
      
@endsection