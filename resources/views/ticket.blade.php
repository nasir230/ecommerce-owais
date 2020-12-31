

@extends('layouts.app1')
@section('title',$ticket->title)
@section('meta',$ticket->title)

@section('css')
<style>

.con{
    max-width: 953px;
    margin:auto;
 } 

 .ticket td {
  /* width: 50%; */
 }

</style>
      

@endsection

@section('content')
<div class="page-wrapper">
  @php
 $product = $ticket;

@endphp
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
                <!--tab start-->
                <section class="pb-0">
                  <div class="container">
                  <h4 class="mb-2 font-w-6">TICKET NUMBER #{{$product->token}}</h4>
                    <div class="row">
                    
                      <div class="col-lg-6 col-12 mt-lg-0">
                        <div class="product-details">
                          <h1 class="h4 mb-0 font-w-6">{{$product->title}}</h1>
                          </div> <span class="product-price h5 text-pink">${{$product->price}} </span>
                          <ul class="list-unstyled">
                            <li><small>Status : <span class="text-green"> {{$product->status}}</span> </small>
                            </li>
                          </ul>
                          <div class="widget widget-size border rounded p-3">
                              <h5 class="widget-title mb-2 fw-600">QUANTITY : {{$product->quantity}}</h5>
                              <p class="border-top border-bottom desc py-3">{{$product->excerpt}}</p>
                            </div>
                      </div>
                      <div class="col-lg-6 col-12 mt-lg-0">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          @if($product->gallery != null)
                          @php $gallery =  explode(",",$product->gallery);  @endphp
                            <div class="carousel-inner">
                                  @foreach ($gallery as $key => $item)
                                    <div class="carousel-item @if($key == 0 ) {{'active'}} @endif">
                                      <img class="d-block m-auto align-items-center img-fluid" src="{{asset($item)}}" />
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
                      </div>
                    </div>
                  </div>
                </section>



      <section class="py-5 ">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="tab product-tab">
                <!-- Nav tabs -->
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active ml-0" id="nav-tab1" data-toggle="tab" href="#tab3-1" role="tab" aria-selected="true">MORE DETAILS</a></div>
                </nav>
                <!-- Tab panes -->
                <div class="tab-content pt-5 p-0">
                  <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                    <div class="row align-items-center">
                      
                      <div class="col-md-12">
                          <table class="ticket table table-bordered mb-0">
                              <tbody>
                                <tr>
                                <td>Product Condition</td>
                                <td class="text-center" >{{$product->pr_condition}}</td>
                                </tr>
                                <tr>
                                  <td>Product Age (In Months)</td>
                                  <td class="text-center" >{{$product->age}}</td>
                                </tr>
                                <tr>
                                  <td>Product Quantity</td>
                                  <td class="text-center" >{{$product->quantity}}</td>
                                </tr>
                                @if($product->status != 'Pending')
                                  <tr>
                                      <td colspan="2">
                                          <div class="d-sm-flex align-items-center mt-5">
                                          <a href="{{route('dashboard')}}" class="btn btn-animated mr-sm-3 mb-3 mb-sm-0 cht-btn">
                                                <i class="fa fa-comments pr-3"></i>
                                                Start Chat With Admin
                                              </a>
                                          </div>
                                      </td>
                                  </tr>
                                @endif
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @if($product->status == 'Offer Accepted')
        <div class="container-fluid pb-5">
          <div class="row justify-content-center">
              <div class="col-lg-9 col-md-10 col-sm-11 py-5 bg-light-4">
                  <div class="container-fluid">
                  <form action="{{route('ticket.update')}}" method="POST" >
                    @csrf
                      <div class="row">
                        <div class="col-md-3 py-2">
                          <select id="delivery_option"  name="type" class="form-control"  >
                              <option value="pickup" @if($product->ticket_type == 'pickup') {{'selected'}} @endif >Pickup</option>
                              <option value="delivery" @if($product->ticket_type == 'delivery') {{'selected'}} @endif  >Delivery To Admin</option>
                          </select>
                        </div>
                      </div>
                 

                      <div  class="pickup row">
                            <input name="id" type="hidden" value="{{$product->id}}" >
                            <div class="col-md-4">
                            <input class="form-control" name="sdate" value="{{$product->ticket_s_location}}"  id="start" placeholder="Start Date" type="date">
                            </div>
                            <div class="col-md-4">
                              <input class="form-control" name="edate" value="{{$product->ticket_e_location}}" id="end" placeholder="End Date" type="date">
                            </div>
                            <div class="col-md-4">
                              <button class="btn btn-zerodark btn-animated mt-3 mt-md-0">Schedule Meeting</button>
                            </div>
                        </div>

                        <div class="code row">
                          <div class="col-md-8">
                            <input class="form-control" value="@if($product->ticket_token == null) #{{rand()}} @else {{$product->ticket_token}} @endif" readonly name="token" type="text">
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-zerodark btn-animated mt-3 mt-md-0">Submit</button>
                          </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      @endif
       </div>
</div>
<!--body content end--> 
  @endsection
  
@section('js')

<script>

   var a = document.getElementById('delivery_option').value;
   var pickup =  document.querySelector('.pickup');
   var code =   document.querySelector('.code');

   if(a == 'pickup'){
        pickup.style.display = 'flex';
        code.style.display = 'none';
      }else{
        pickup.style.display = 'none';
        code.style.display = 'flex';
      }

  document.getElementById('delivery_option').addEventListener("change", function() {
      if(this.value == 'pickup'){
        pickup.style.display = 'flex';
        code.style.display = 'none';
      }else{
        pickup.style.display = 'none';
        code.style.display = 'flex';
      }
 
  });
</script>
      
@endsection