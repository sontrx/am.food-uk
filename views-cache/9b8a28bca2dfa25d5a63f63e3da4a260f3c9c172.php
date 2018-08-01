<?php $__env->startSection('content'); ?>
<h2 class="admin__title"><i class="fas fa-list-alt"></i> Products</h2>


<table class="table table-dark table--product">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($product['id']); ?></th>
      <td><div class="frame"><img class="image" src="<?php echo e($product['image']); ?>"></div></td>
      <td><a href="admin?tab=product&id=<?php echo e($product['id']); ?>" class="product-link"><span class="product-name"><?php echo e($product['name']); ?></span></a></td>
      <td><?php echo e($product['price']); ?></td>
      <td><span class="delete js-deleteProduct" js-productId="<?php echo e($product['id']); ?>" js-productImage="<?php echo e($product['image']); ?>"><i class="fas fa-trash-alt"></i></span></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>

</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('default.layouts.side-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>