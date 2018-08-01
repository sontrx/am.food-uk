<?php $__env->startSection('content'); ?>
<h2 class="admin__title"><i class="fas fa-edit"></i> Edit</h2>

<form class="form-add-product" action="admin.php" method="post" enctype="multipart/form-data">

	<input type="" name="action" value="edit_product" hidden="">
	<input type="" name="oldImage" value="<?php echo e($product['image']); ?>" hidden="">
	<input type="" name="productId" value="<?php echo e($product['id']); ?>" hidden="">

	<div class="form-group">
		<label for="#productName">Product Name:</label>
		<input type="text" class="form-control" name="productName" value="<?php echo e($product['name']); ?>"  id="productName" placeholder="Enter product name">
	</div>

	<div class="form-group">
		<label for="#productDescription">Description</label>
	    <textarea class="form-control" id="productDescription" name="productDescription" rows="5"><?php echo e($product['description']); ?></textarea>
	</div>

	<div class="form-group">

		<div class="image-frame">
			<img src="<?php echo e($product['image']); ?>" alt="" class="product-image">
		</div>

		<label for="#productImage">Upload Other Image:</label>
		<input type="file" class="form-control" id="productImage" name="productImage">
	</div>

	<div class="form-group">
		<label for="#productPrice">Price</label>
		<input type="number" class="form-control" id="productPrice" value="<?php echo e($product['price']); ?>" name="productPrice" placeholder="0">
	</div>

	<div class="form-group" style="">
		<button type="submit" class="btn btn-primary btn-block">Edit This Product </button>
	</div>

</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('default.layouts.side-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>