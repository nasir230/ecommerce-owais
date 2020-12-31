
<?php $__env->startSection('title','All Products'); ?>
<?php $__env->startSection('meta','All Products'); ?>

<?php $__env->startSection('css'); ?>
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
      
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                <form action="<?php echo e(route('productsSearch')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                    <div class="row mb-4 align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0"> <span class="text-dark">Showing : <?php echo e($products->currentPage()); ?> - <?php echo e($products->lastPage()); ?> of <?php echo e($products->total()); ?> Total</span>
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-md-end">
                      <div class="ml-2 d-flex align-items-center">
                        <select name="cat"  class="custom-select" id="inputGroupSelect03">
                            <option selected value="all" >All Category</option>
                            <?php $__currentLoopData = Con::allCat(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(isset($category)): ?> <?php if( $category == $item->slug): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>  value="<?php echo e($item->slug); ?>"><?php echo e($item->title); ?></option>     
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="ml-2 d-flex align-items-center">
                        <select name="orderby" class="custom-select" id="inputGroupSelect01">
                          <option <?php if(isset($orderby)): ?> <?php if( $orderby == 'asc'): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>   value="asc">Aesc</option>
                          <option <?php if(isset($orderby)): ?> <?php if( $orderby == 'desc'): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>  value="desc">Desc</option>
                        </select>
                      </div>
                      <div class="ml-2 d-flex align-items-center">
                         <input class="btn btn-danger"  type="submit" value="Search"   >
                      </div>
                    </div>
                  </div>
                </form>

                <div class="row product-card mb-4">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-sm-6 pb-4 px-1">
                          <div class="card p-4 show-more">
                          <a href="<?php echo e(route('product',$item->slug)); ?>">
                              <img class="card-img-top-product img-fluid" src="<?php echo e(asset($item->thumbnail)); ?>" >
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
                              <a href="<?php echo e(route('cart.add',$item->id)); ?>">Add to Bowl</a>
                              </div>
                          </div>
                          <div class="text-center">
                          <p class="mb-0 text-product"><?php echo e($item->title); ?></p>
                          <p class="mb-0 fw-600 fs-18">$<?php echo e($item->price); ?></p>
                          </div>
                        </div> 
                          <?php $__env->startComponent('components.productView',['product' => $item ]); ?> <?php if (isset($__componentOriginal9ae27dead4f3d424edecec794c33fd836a46cc23)): ?>
<?php $component = $__componentOriginal9ae27dead4f3d424edecec794c33fd836a46cc23; ?>
<?php unset($__componentOriginal9ae27dead4f3d424edecec794c33fd836a46cc23); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                           
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>

                <div class="col-lg-3 col-md-12 sidebar mt-8 mt-lg-0">
                  <div>

                    <div class="widget widget-categories mb-4 border rounded p-4">
                      <h5 class="widget-title mb-3" style="font-weight:600;">Categories</h5>
                      <div>
                        <?php $__currentLoopData = Con::allCat(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pt-1">
                          <h6 class="mb-0">
                           <a   href="<?php echo e(route('productsByCat',$item->slug)); ?>" class=" <?php if(request()->segment(2) == $item->slug): ?> <?php echo e('active'); ?> <?php endif; ?> link-title" style="font-weight:600;"><?php echo e($item->title); ?></a>
                          </h6>
                        </div>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <?php
                                $topproduct = Con::allProduct()->take(5);
                          ?>
                            <?php $__currentLoopData = $topproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allproducts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="pt-2">
                              <h6 class="">
                              <a href="<?php echo e(route('product',$allproducts->slug)); ?>" class="link-title" style="font-weight:600;"><?php echo e($allproducts->title); ?></a> 
                              </h6>
                            </div>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
                <nav aria-label="Page navigation">
                  <?php if($products->lastPage() > 1): ?>
                  <ul class="pagination justify-content-center">
                      <li class="<?php echo e(($products->currentPage() == 1) ? ' disabled' : ''); ?>">
                          <a href="<?php echo e($products->url(1)); ?>">
                            <span>Previous</span>
                          </a>
                      </li>
                      <?php for($i = 1; $i <= $products->lastPage(); $i++): ?>
                        <li class="<?php echo e(($products->currentPage() == $i) ? ' active' : ''); ?>">
                              <a href="<?php echo e($products->url($i)); ?>"><?php echo e($i); ?></a>
                        </li>
                      <?php endfor; ?>
                      <li class="<?php echo e(($products->currentPage() == $products->lastPage()) ? ' disabled' : ''); ?>">
                        <a href="<?php echo e($products->url($products->currentPage()+1)); ?>">
                          <span>Next</span>
                        
                        </a>
                      </li>
                  </ul>
                  <?php endif; ?>
                </nav>
            </div>
          </section>
       </div>
        
</div>
<!--body content end--> 
  <?php $__env->stopSection(); ?>
  
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('front/assets/js/range.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zmark\resources\views/products.blade.php ENDPATH**/ ?>