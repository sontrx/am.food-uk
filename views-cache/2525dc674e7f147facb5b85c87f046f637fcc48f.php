<?php $__env->startSection('content'); ?>

<?php echo $__env->make('default.partials.checkout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('default.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>