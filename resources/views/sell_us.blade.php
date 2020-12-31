@extends('layouts.app1')
@section('title','Sell To Us')
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
                <h1 class="h2 mb-0 text-white">Sell To Us</h1>
            </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
        </section>
    
        <div class="page-content">  
            <!--tab start-->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                    <form enctype="multipart/form-data" class="py-5" action="{{route('sell.update')}}" method="post" >
                        @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Product Name </label>
                                    <input required  class="form-control" name="title" type="text" placeholder="Enter Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Original Purchase Price</label>
                                    <input required class="form-control" name="price" type="number" placeholder="Enter Price">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Product Condition</label>
                                    <select name="pr_condition"  class="form-control" id="exampleFormControlSelect1">
                                      <option>10</option>
                                      <option>9</option>
                                      <option>8</option>
                                      <option>7</option>
                                      <option>6</option>
                                      <option>5</option>
                                      <option>4</option>
                                      <option>3</option>
                                      <option>2</option>
                                      <option>1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product Age (In Months)</label>
                                    <input required name="age" class="form-control" type="text" placeholder="Product Age (In Months)">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product Quantity</label>
                                    <input name="quantity" class="form-control"  type="number" placeholder="Enter Available Quantity">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1">Upload Product Images</label>
                                    <input name="gallery[]"  name="pr-file" type="file" class="form-control-file"  multiple >
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Product Description <span class="required">*</span></label>
                                    <textarea name="excerpt"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-zerodark" >Send To Admin</button>
                        </form>
                    </div>
                </div>
            </div>
              
            
            <!--tab end-->
        </div>
      

    @if(session()->has('ticket'))
        <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmation" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="mb-0 fw-600 text-center">Ticket Submitted</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="container-fluid py-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="fw-600">Your Request Has been Sent to Admin </h3>
                                <h5 class="mb-1">Your Ticket Number: #{{session('ticket')->token}}</h5>
                                <h6 class="mb-1">
                                <a href="{{route('ticket',session('ticket')->id)}}" class="text-purple here">Click here</a> to review your ticket details</h6>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif  
          
</div>
<!--body content end--> 
  @endsection
  
@section('js')

    @if(session()->has('ticket'))
        <script>
            $('#confirmation').modal('show');
        </script>
    @endif

@endsection