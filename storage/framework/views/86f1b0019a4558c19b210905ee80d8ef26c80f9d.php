
<?php $__env->startSection('title','All Inquiries'); ?>

<?php $__env->startSection('css'); ?>

    <!-- data tables -->
  <link href="<?php echo e(asset('admin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
       
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
              <h4 class="page-title">All Inquiries</h4>
            </li>
            <li class="breadcrumb-item bcrumb-1">
            <a href="<?php echo e(route('admin.home')); ?>">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item bcrumb-2">
              <a href="<?php echo e(route('admin.forms.index')); ?>"> Inquiries</a>
            </li>
            <li class="breadcrumb-item active">All</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="header">
            <h2><strong>All</strong> Inquiries</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                  <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                      <li>
                          <a href="<?php echo e(route('admin.forms.create')); ?>"> Create New</a>
                      </li>
                  </ul>
              </li>
          </ul>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table class="table table-hover js-basic-example contact_list">
                <thead>
                  <tr>
                    <th class="center">#</th>
                    <th class="center">Title</th>
                    <th class="center">Price</th>
                    <th class="center">Status</th>
                    <th class="center">Customer</th>
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX">
                    <td class="center">#<?php echo e($data->token); ?></td>
                    <td class="text-left"><?php echo e($data->title); ?></td>
                    <td class="text-center"><?php echo e($data->price); ?></td>
                    <td class="text-center"><?php echo e($data->status); ?></td>
                    <td class="text-center"> <?php if(empty($data->user)): ?> <?php echo e('unknown'); ?> <?php else: ?>
                      <a href="<?php echo e(route('admin.users.profile',$data->user->id)); ?>"  > <?php echo e($data->user->name); ?></a> <?php endif; ?> </td>
                    <td class="text-center">
                        <a href="<?php echo e(route('admin.forms.edit', $data->id)); ?>"  class="btn btn-tbl-edit">
                              <i class="material-icons">create</i>
                        </a>
                        <a href="<?php echo e(route('admin.forms.delete', $data->id)); ?>"  class="btn btn-tbl-edit">
                              <i class="material-icons">delete_forever</i>
                        </a>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
        <!-- data tables -->
        <script src="<?php echo e(asset('admin/assets/js/table.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admin/assets/js/pages/tables/jquery-datatable.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zmark\resources\views/admin/forms/index.blade.php ENDPATH**/ ?>