<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Responsive Admin Template" />
        <meta name="author" content="Sunray" />

        <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(Con::settings()->app_name); ?></title>
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset(Con::settings()->app_fav_icon)); ?>" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="<?php echo e(asset('admin/assets/css/app.min.css')); ?>" rel="stylesheet">
    
    <!-- Custom Css -->
    <link href="<?php echo e(asset('admin/assets/css/style.css')); ?>" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="<?php echo e(asset('admin/assets/css/styles/all-themes.css')); ?>" rel="stylesheet" />

    <style>
        .form-check .form-check-label {
            padding-left: 0px !important;
        }

        .card .table{
            /* border: 1px solid #dee2e6; */
        }
    </style>

        <?php echo $__env->yieldContent('css'); ?>
    </head>
<body class="light" >
<div id="app" >


    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="<?php echo e(asset(Con::settings()->app_fav_icon)); ?>" alt="admin">
            </div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->



    <!-- Top Bar -->
    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

           
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- #Menu -->
        </aside>
        <!-- #END# Right Sidebar -->
     
    </div>
        <section class="content">
            <?php if($message = Session::get('success')): ?>
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>

            <?php if($message = Session::get('error')): ?>
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>

            <?php if($message = Session::get('warning')): ?>
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>

            <?php if($message = Session::get('info')): ?>
            <div style="display:display: block;position: fixed;z-index: 3;width: 77%;margin: 13px auto;right: 15px;" class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
            
            
       
        </section>
        </div>
        
         <div class="modal fade" id="filemodal" tabindex="-1" role="dialog" aria-labelledby="formModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">File Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                              <?php $filemanager = Con::files();  ?>
                              <div class="row" >
                              <?php $__currentLoopData = $filemanager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item col-2">
                                            <a class="url" data-url="<?php echo e($item->url); ?>">
                                            <img style="height:50px" class="w-100 thumbnail" src="<?php echo e(asset($item->url)); ?>" > 
                                            </a>
                                            <a class="d-block text-dark">
                                            <h4 style="font-size:12px;" class="py-2 text-center" ><?php echo e($item->title); ?></h4></a>
                                        </div>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                   </div>
                 </div>
             </div>
             
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('admin/assets/js/app.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admin/assets/js/chart.min.js')); ?>"></script>
        <!-- Custom Js -->
        <script src="<?php echo e(asset('admin/assets/js/admin.js')); ?>"></script>
        
        <script>
            $(document).ready(function() {
                
                var path = 'http://127.0.0.1:8000/';
                var fileid;
                var fileimg;

                function filset(id){
                  $(`#${id}`).val(url);
                }
                
                $('.filemanager').on("click", function(){
                   fileid = $(this).find('.f').prop('id');
                   fileimg = $(this).find('img').prop('id');          
                   $('#filemodal').modal('show');
                   debugger             
                });
                
                $('#filemodal .item').click(function(){
                    
                    var url = $(this).find('.url').data('url');
                    $(`#${fileid}`).val(url);
                 //   $(`#${fileimg}`).attr("src",path+url);
                    $('#filemodal').modal('hide'); 
                
                });
            
            });
        </script>

        <?php echo $__env->yieldContent('js'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\zmark\resources\views/admin/layouts/admin.blade.php ENDPATH**/ ?>