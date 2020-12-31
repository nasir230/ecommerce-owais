@extends('layouts.app1')
@section('title','Dashboard')
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
<div class="page-wrapper">

        <!--hero section start-->
        
        <section class="bg-darkpurple py-6">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h2 mb-0 text-white">Dashboard</h1>
                </div>
                </div>
                <!-- / .row -->
            </div>
        <!-- / .container -->
        </section>
    
        <div class="page-content">  
            <!--tab start-->

            <section class="py-5">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="tab product-tab">
                        <!-- Nav tabs -->
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist"> 
        
                            <a class="nav-item nav-link  ml-0 fw-600 text-black" id="nav-tab1" data-toggle="tab" href="#tab3-1" role="tab" aria-selected="true">Dashboard</a>
        
                            <a class="nav-item nav-link fw-600 text-black" id="nav-tab2" data-toggle="tab" href="#tab3-2" role="tab" aria-selected="false">My Order History</a> 
        
                            <a class="nav-item nav-link active fw-600 text-black" id="nav-tab5" data-toggle="tab" href="#tab3-5" role="tab" aria-selected="false">View Product</a>
        
                            <a class="nav-item nav-link fw-600 text-black" id="nav-tab6" data-toggle="tab" href="#tab3-6" role="tab" aria-selected="false">Chat</a>
        
                          </div>
                        </nav>
                        <!-- Tab panes -->
                        <div class="tab-content pt-5 p-0">
                          <div role="tabpanel" class="tab-pane fade" id="tab3-1">
                            <div class="row align-items-center">
                              
                              <div class="col-md-12 px-0">
                                <div class="card border-0">
                                    
                                    <div class="card-body">
                                        <div class="welcome-msg">
                                            <h6>Hello, john doe!</h6>
                                            <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                                        </div>
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                  <div class="card mb-3 mb-lg-0 border-0">
                                           <h5 class="font-w-6">Billing Address</h5>
                                      <div class="card-body">
                        <address>
                          jhon doe<br>
                          Street road<br>
                          AL,  Alabama, 42136<br>
                          United States<br>
                          T: 4563 <br>
                            </address>
                          <a href="#" class="text-purple">Edit Address</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="card border-0">
                                      <h5 class="font-w-6">Shipping Address</h5>
                                
                                      <div class="card-body">
                        <address>
                          Stephen Smith<br>
                          Street road<br>
                          AL,  Alabama, 42136<br>
                          United States<br>
                          T: 4563 <br>
                          </address>
                                          <a href="#" class="text-purple">Edit Address</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </div>
        
                          <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                            <div class="card border-0">
                                        <h5 class="font-w-6">My Orders</h5>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order#</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#7894</td>
                                                        <td>June 19, 2020</td>
                                                        <td>Pending</td>
                                                        <td>$59.00</td>
                                                        <td class="center">
                                                          <a href="view-order.html" class="text-purple">
                                                            <i class="fa fa-eye pl-2" aria-hidden="true"></i>
                                                          </a>
                                                        </td>
                                                    </tr>
        
                                                    <tr>
                                                        <td>#2864</td>
                                                        <td>Jan 25, 1920</td>
                                                        <td>Pending</td>
                                                        <td>$81.00</td>
                                                        <td class="center">
                                                          <a href="view-order.html" class="text-purple">
                                                            <i class="fa fa-eye pl-2" aria-hidden="true"></i>
                                                          </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#7894</td>
                                                        <td>June 19, 2020</td>
                                                        <td>Pending</td>
                                                        <td>$59.00</td>
                                                        <td class="center">
                                                          <a href="view-order.html" class="text-purple">
                                                            <i class="fa fa-eye pl-2" aria-hidden="true"></i>
                                                          </a>
                                                        </td>
                                                    </tr>
        
                                                    <tr>
                                                        <td>#3874</td>
                                                        <td>Jan 25, 1920</td>
                                                        <!-- <td>Veg</td>
                                                        <td class="pl-4"><img src="assets/images/product1.png" class="img-fluid h-50" alt=""></td> -->
                                                        <td>Pending</td>
                                                        <td>$81.00</td>
                                                        <td class="center">
                                                          <a href="view-order.html" class="text-purple">
                                                            <i class="fa fa-eye pl-2" aria-hidden="true"></i>
                                                          </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                          </div>
        
                          <div role="tabpanel" class="tab-pane fade  show active" id="tab3-5">
                            <section class="pt-0">
                                <div class="container">
                                  <div class="row">
                                      <div class="col-md-12">
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Ticket #</th>
                                                            <th>Product Name</th>
                                                            <th>Product Price</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $ticket = Con::myTicket(Auth::user()->id);
                                                        @endphp
                                                        @foreach ($ticket as $item)
                                                        <tr>
                                                        <td>#{{$item->token}}</td>
                                                            <td>{{$item->title}}</td>
                                                            <td>${{$item->price}}</td>
                                                            <td>{{$item->status}}</td>
                                                            <td class="center">
                                                            <a href="{{route('ticket',$item->id)}}" class="text-purple">
                                                                <i class="fa fa-eye pl-2" aria-hidden="true"></i>
                                                              </a>
                                                            </td>
                                                        </tr>    
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    
                                  </div>
                                  
                                </div>
                              </section>
                          </div>
        
        
                          <div role="tabpanel" class="tab-pane fade" id="tab3-6">
                            <div class="card grey lighten-3 chat-room">
                                <div class="card-body">
                              
                                  <div class="row px-lg-2 px-2">
                              
                                    <!-- Grid column -->
                                    <div class="col-md-12 pl-md-3 px-lg-auto px-0">
                              
                                      <div class="chat-message">
                              
                                        <ul class="list-unstyled chat">
                                          <li class="d-flex justify-content-between mb-4">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1 h-50 pt-4">
                                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                              <div class="header">
                                                <strong class="primary-font">Brad Pitt</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock"></i> 12 mins ago</small>
                                              </div>
                                              <hr class="w-100">
                                              <p class="mb-0">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                                labore et dolore magna aliqua.
                                              </p>
                                            </div>
                                          </li>
                                          <li class="d-flex justify-content-between mb-4">
                                            <div class="chat-body white p-3 z-depth-1">
                                              <div class="header">
                                                <strong class="primary-font">Lara Croft</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock"></i> 13 mins ago</small>
                                              </div>
                                              <hr class="w-100">
                                              <p class="mb-0">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium.
                                              </p>
                                            </div>
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                                          </li>
                                          <li class="d-flex justify-content-between mb-4 pb-3">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1  h-50 pt-4">
                                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                              <div class="header">
                                                <strong class="primary-font">Brad Pitt</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock"></i> 12 mins ago</small>
                                              </div>
                                              <hr class="w-100">
                                              <p class="mb-0">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                                labore et dolore magna aliqua.
                                              </p>
                                            </div>
                                          </li>
                                          <li class="white">
                                            <div class="form-group basic-textarea">
                                              <textarea class="form-control pl-2 my-0" id="ControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
                                            </div>
                                          </li>
                                          <button type="button" class="btn btn-zerodark btn-rounded waves-effect waves-light float-right">Send</button>
                                        </ul>
                              
                                      </div>
                              
                                    </div>
                                    <!-- Grid column -->
                              
                                  </div>
                                  <!-- Grid row -->
                              
                                </div>
                              </div>
                          </div>
        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              
              <!--tab end-->
             
            
            <!--tab end-->
        </div>

</div>
<!--body content end--> 
  @endsection
  
@section('js')
      
@endsection