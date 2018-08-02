
<section class="checkout">
	
	<div class="container">
		
		<div class="row">

			<div class="col-md-8">

				<div class="checkout__left">
					
					<div class="checkout__title">
						<span>About you</span>
						<small>all field are required</small>
					</div>

					<form class="checkout__form" action="checkout.php" method="POST">

						<div class="form-group">
							<label for="genderSelect">Title:</label>
							<select id="genderSelect" class="form-control" name="genderSelect">
								<option>Mr</option>
								<option>Mrs</option>
							</select>
						</div>

						<div class="form-group row">

							<div class="col-sm-6">
								<label>Fisrt Name</label>
								<input type="text" name="firstName" class="form-control">
							</div>

							<div class="col-sm-6">
								<label>Last Name</label>
								<input type="text" name="lastName" class="form-control">
							</div>
							
						</div>

						<div class="form-group row">

							<div class="col-sm-6">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="name@example.com">
							</div>

							<div class="col-sm-6">
								<label>Phone number</label>
								<input type="phone" name="phone" class="form-control">
							</div>
							
						</div>

						<div class="form-group">
							
							<label>Address:</label>
							<input type="text" name="address" class="form-control" placeholder="your address">

						</div>

						<div class="form-group">
							
							<label>Post Code</label>
							<input type="text" name="postCode" class="form-control" placeholder="..."></input>
						</div>

						<label>Payment *</label>
						<div class="form-group">

							<script
							src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
							data-amount="<?php echo e($total); ?>"
							data-name="Boomkitchen"
							data-description="Pay your order"
							data-image="public/images/logo.png"
							data-locale="auto"
							data-zip-code="true"
							data-currency="gbp">
							</script>
						</div>


					</form>


 				</div>
 				<button type="submit" class="btn btn-primary btn-block" disabled>Next: Delivery</button>

			</div>

			<div class="col-md-4 checkout__right js-cart">
				
				<div class="checkout__total">

					<p class="checkout__title">Order total</p>

					<div class="total">

						<p class="total__row">
							<span class="total__info">Recipes(<span class="js-checkoutCartTotal"><?php echo e($cartTotal); ?></span>)</span>
							<span class="total__info">£ <span class="js-checkoutCartTotalPrice"><?php echo e($cartTotalPrice); ?></span></span>
						</p>

						<p class="total__row">
							<span class="total__info">Delivery cost</span>
							<span class="total__info js-shippingCost" js-shippingCost='<?php echo e($shippingCost); ?>'>£<?php echo e($shippingCost); ?></span>
						</p>

						<p class="total__row">
							<span class="total__end">Total</span>
							<span class="total__end">£ <span class="js-checkoutCartEndPrice"><?php echo e($total); ?></span></span>
						</p>

						<a class="total__link" href="">
							Edit order <i class="fas fa-angle-right"></i>
						</a>

					</div>

				</div>

				<div class="checkout__box ">

					<p class="checkout__title">Your box</p>
					
					<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="product js-checkoutProduct" js-productId="<?php echo e($product['id']); ?>">

						<div class="product__left">
							<img src="<?php echo e($product['image']); ?>" alt="" class="product__image">
						</div>

						<div class="product__right">

							<p class="product__title"><?php echo e($product['name']); ?></p>

							<div class="product__total">
								
								<span class="product__description">£<?php echo e($product['price']); ?></span>
								<span class="product__description ">x<span class="js-productTotal"><?php echo e($product['total']); ?></span></span>
							
							</div>

						</div>

						<div class="product__bonus">
							<span class="product__control js-productAdd" js-image="<?php echo e($product['image']); ?>" js-productId="<?php echo e($product['id']); ?>" js-total="<?php echo e($product['total']); ?>" js-price="<?php echo e($product['price']); ?>"><i class="fas fa-plus"></i></span>
							<span class="product__control js-checkoutProductRemove" js-productId="<?php echo e($product['id']); ?>" ><i class="fas fa-minus"></i></span>
						</div>

					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


				</div>
			</div>

		</div>

	</div>
	<!-- end container -->

</section>

