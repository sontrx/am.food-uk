<?php $__env->startSection('content'); ?>
<h2 class="admin__title"><i class="fas fa-plus-square"></i> Add Product</h2>

<form class="form-add-product" action="admin.php" method="post" enctype="multipart/form-data">

	<input type="" name="action" value="add_product" hidden="">

	<div class="form-group">
		<label for="#productName">Product Name:</label>
		<input type="text" class="form-control" name="productName"  id="productName" placeholder="Enter product name">
	</div>

	<div class="form-group">
		<label for="#productDescription">Description</label>
	    <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
	</div>

	<div class="form-group">
		<label for="#productImage">Image</label>
		<input type="file" class="form-control" id="productImage" name="productImage" placeholder="image">
	</div>

	<div class="form-group">
		<label for="#productPrice">Price</label>
		<input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="0">
	</div>

	<div class="form-group" style="">
		<button type="submit" class="btn btn-primary btn-block">Add This Product</button>
	</div>

</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('default.layouts.side-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>