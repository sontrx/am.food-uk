<!DOCTYPE html>
<html>
<head>
    
    <?php echo $__env->make('default.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>
<body>

    <?php echo $__env->make('default.components.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('default.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>