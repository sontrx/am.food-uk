<?php $__env->startSection('content'); ?>
<h2 class="admin__title text-center">welcome <?php echo e($user); ?>!</h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('default.layouts.side-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>