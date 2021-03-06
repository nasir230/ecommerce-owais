

@extends('layouts.app1')
@section('title','Cart')
@section('meta','Cart')

@section('css')
<style>

.con{
    max-width: 953px;
    margin:auto;
 } 

 .ticket td {
  /* width: 50%; */
 }


 .btn-product {
    background: none;
    color: #042825;
    border: 1px solid #ced4da;
    height: 22px;
    width: auto;
    padding: 0 11px;
    font-size: 13px;
    cursor: pointer;
    display: inline;
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
            <h1 class="h2 mb-0 text-white">Cart</h1>
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
                    <div class="col-lg-8">
                      <?php $total = 0 ?>
                      <div class=" table-responsive">
                        <table class="cart-table table">
                          <thead>
                            <tr>
                              <th scope="col" style="font-weight:900;">Product</th>
                              <th scope="col" style="font-weight:900;">Price</th>
                              <th scope="col" style="font-weight:900;">Quantity</th>
                              <th scope="col" style="font-weight:900;">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <?php 

                                $subTotal = 0 ; 
                                $tax = number_format(Con::settings()->shop_tax,2);
                                $discount = number_format(Con::settings()->shop_discount,2);
                           
                           ?>

                             @if(session('cart'))
                            
                             @foreach(session('cart') as $id => $details)
                              <?php 
                                    // Cart Total
                                   $lineTotal = $details['price'] * $details['quantity']; 
                                   $subTotal += $details['price'] * $details['quantity']; 
                              ?>
                            <tr>
                              <td>
                                <div class="cart-thumb media align-items-center">
                                  <a href="#">
                                    <img class="img-fluid" src="{{asset($details['thumbnail']) }}">
                                  </a>
                                  <div class="media-body ml-3">
                                  <div class="product-title mb-2"><a class="link-title" href="{{route('product',$details['slug'])}}">{{$details['title']}}</a></div>
                                  </div>
                                </div>
                              </td>
                              <td><span class="product-price text-muted">${{number_format($details['price']) }} </span></td>
                              <td>
                              <div class="d-flex align-items-center">
                                    <a href="{{route('cart.decreament',$id)}}" class="btn-product btn-product-up">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <button class="btn-product btn-product-up"><span>{{$details['quantity']}}</span> </button>
                                    <a href="{{route('cart.increament',$id)}}" class="btn-product btn-product-down">
                                        <i class="fa fa-plus"></i>
                                    </a>
                              </div>
                              </td>
                              <td>
                              <span class="product-price text-dark font-w-6 px-1">${{number_format($lineTotal)}}</span>
                              <a href="{{route('cart.remove',$id)}}" class="close-link"><i class="fa fa-times"></i></a>
                              </td>
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-4 pl-lg-5 mt-8 mt-lg-0">
                      <div class="border rounded p-5 bg-light-4">
                        <h4 class="text-black text-left mb-2 font-w-6">Cart Totals</h4>
                      <div class="d-flex justify-content-between align-items-center border-bottom py-3"> <span  class="text-muted">Subtotal</span><span class="text-dark">${{number_format($subTotal,2)}}</span> 
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                            <span class="text-muted">Discount</span>
                            <span class="text-dark">{{$discount}}%</span> 
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 mb-5">
                           <span class="text-dark h5">Total</span>
                           @php
                                // $total = $subTotal - $discount  ;
                                    $discount = ($discount / 100) * $subTotal;
                                     $total =  $subTotal - $discount;

                                    //  $tax = ($tax / 100) * $total;
                                    //  $total =  $total + $tax;
                                // $total = $total + $tax ;
                           @endphp
                           <span class="text-dark font-w-6 h5">${{$total}} </span> 
                        </div> <a class="btn btn-zerodark btn-animated btn-block" href="checkout.html">Proceed To Checkout</a>
                        <a class="btn btn-dark btn-animated mt-3 btn-block" href="{{route('products')}}">Continue Shopping</a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
       </div>
</div>
<!--body content end--> 
@endsection
  
@section('js')
      
@endsection