<!-- Modal -->
<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="row align-items-center">
                <div class="col-lg-4 col-12 text-center">
                <img class="img-fluid rounded" src="{{asset('front/assets/images/product1.png')}}" alt="">
                </div>
                <div class="col-lg-8 col-12 mt-5 mt-lg-0">
                <div class="product-details">
                <h3 class="mb-0">{{$product->title}}</h3>
                    <span class="product-price h4">$17.99<del class="text-muted h6 pl-2">$25.00</del></span>
                    <ul class="list-unstyled my-4">
                    <li class="mb-2">Availibility: <span class="text-muted"> In Stock</span> 
                    </li>
                    <li>Categories :<span class="text-muted"> Food</span>
                    </li>
                    </ul>
                    <p class="mb-4">Nulla eget sem vitae eros pharetra viverra Nam vitae luctus ligula suscipit risus nec eleifend Pellentesque eu quam sem, ac malesuada</p>
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
                    <div class="d-sm-flex align-items-center border-top pt-4 mt-5">
                    <h6 class="mb-sm-0 mr-sm-4">Share It:</h6>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <a class="bg-white shadow-sm rounded p-2" href="#"><i class="fa fa-facebook zerodark-link"></i></a>
                        </li>
                        <li class="list-inline-item">
                          <a class="bg-white shadow-sm rounded p-2" href="#"><i class="fa fa-dribbble zerodark-link"></i></a>
                        </li>
                        <li class="list-inline-item">
                          <a class="bg-white shadow-sm rounded p-2" href="#"><i class="fa fa-instagram zerodark-link"></i></a>
                        </li>
                        <li class="list-inline-item">
                          <a class="bg-white shadow-sm rounded p-2" href="#"><i class="fa fa-twitter zerodark-link"></i></a>
                        </li>
                        <li class="list-inline-item">
                          <a class="bg-white shadow-sm rounded p-2" href="#"><i class="fa fa-linkedin zerodark-link"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
     </div>
</div>