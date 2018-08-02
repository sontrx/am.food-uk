<?php $__env->startSection('content'); ?>
<h2 class="admin__title"><i class="fas fa-list-alt"></i> Orders</h2>


<table class="table table-dark table--product .table-responsive table-hover table-bordered orders-table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">content</th>
      <th scope="col">buyer</th>
      <th scope="col">email</th>
      <th scope="col">address</th>
      <th scope="col">post code</th>
      <th scope="col">created at</th>
    </tr>
  </thead>
  <tbody>

  	<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- <?php echo e($order['content']); ?> -->
    <tr>
      <th scope="row"><?php echo e($order['id']); ?></th>
      <td>
      <?php echo e($order['content']); ?>

        
      </td>
      <td><?php echo e($order['buyer']); ?></td>
      <td><?php echo e($order['email']); ?></td>
      <td><?php echo e($order['address']); ?></td>
      <td><?php echo e($order['zipcode']); ?></td>
      <td><?php echo e($order['created_at']); ?></td>
      
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>

</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('default.layouts.side-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>