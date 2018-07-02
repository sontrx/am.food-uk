

<section class="products">

	<div class="container">

		<h2 class="products__title">Build your Boom Box Subscription</h2>
		<div class="products__box">

			<div class="card-deck">

				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="card products__card" js-productId="1"> 
					<img class="card-img-top products__image" src="<?php echo e($product['image']); ?>" alt="Card image cap">
					<div class="card-body">
					  <h5 class="card-title products__name"><a class="products__link" href="product?id=<?php echo e($product['id']); ?>"><?php echo e($product['name']); ?></a></h5>
					  <p class="card-text products__price">£<?php echo e($product['price']); ?></p>

					  <div class="products__buy">
					  	<button class="btn btn-primary btn-sm products__button js-productAdd" js-image="<?php echo e($product['image']); ?>" js-productId="<?php echo e($product['id']); ?>" js-total="1" js-price="<?php echo e($product['price']); ?>">add recipe</button>	
					  </div>
					</div>

				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				<!-- <div class="card products__card" js-productId="1"> 
					<img class="card-img-top products__image" src="public/images/product1.png" alt="Card image cap">
					<div class="card-body">
					  <h5 class="card-title products__name">4 Curry Recipe Kits Subscription (free delivery)</h5>
					  <p class="card-text products__price" js-product-price=14>£14.00</p>

					  <div class="products__buy">
					  	<button class="btn btn-primary btn-sm products__button js-productAdd" js-image="public/images/product1.png" js-productId="1" js-total="1" js-price="14">add recipe</button>	
					  </div>
					</div>

				</div>
				<div class="card products__card" js-productId="2">
					<img class="card-img-top products__image" src="public/images/product2.jpg" alt="Card image cap">
					<div class="card-body">
					  <h5 class="card-title products__name">10 Curry Recipe Kits Subscription (free delivery)</h5>
					  <p class="card-text products__price" js-product-price=30>£30.00</p>

					  <div class="products__buy">
					  	<button class="btn btn-primary btn-sm products__button js-productAdd" js-image="public/images/product2.jpg" js-productId="2" js-total="1" js-price="30">add recipe</button>	
					  </div>
					</div>
				</div> -->

			</div>
			<!-- end card-deck -->

		</div>
		<!-- end product__box -->

	</div>
	<!-- end container -->

</section>