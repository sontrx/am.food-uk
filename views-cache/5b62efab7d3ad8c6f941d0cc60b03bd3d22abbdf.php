<?php $__env->startSection('content'); ?>
        
    <h2>This is content of action-test</h2>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($product['name']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('default.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>