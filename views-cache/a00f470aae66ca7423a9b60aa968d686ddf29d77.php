
<section class="invoice">
	<div class="container">

		<h2 class="invoice__title">
			Successfull purchase!
		</h2>
		<div class="invoice__table">

			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">product</th>
			      <th></th>
			      <th scope="col">price</th>
			      <th scope="col">quantity</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr class="invoice__product">
			      
			      <td><img src="<?php echo e($product['image']); ?>" alt="" class="invoice__product-image"></td>
			      <td><p class="invoice__name"><?php echo e($product['name']); ?></p></td>
			      <td><span class="invoice__price">£<?php echo e($product['price']); ?></span></td>
			      <td><span class="invoice__total ">x<span class="js-productTotal"><?php echo e($product['total']); ?></span></span></td>
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			    <tr>
			    	<th colspan='2'>Shipping cost:</th>
			    	<td colspan="2">£<?php echo e($shippingCost); ?></td>
			    	
			    </tr>
			    <tr>
			    	<th colspan='2'>Total cost:</th>
			    	<td colspan="2">£<?php echo e($total); ?></td>
			    	
			    </tr>
			  </tbody>

			  
			</table>
			<!-- end table -->
			

		</div>
		<!-- end invoice__table -->
	</div>
</section>