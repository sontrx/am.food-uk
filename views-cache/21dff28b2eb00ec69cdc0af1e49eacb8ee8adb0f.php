<?php $__env->startSection('content'); ?>
    
    <?php echo $__env->make('default.partials.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('default.partials.products', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('default.partials.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('default.partials.guide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('default.partials.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('default.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>