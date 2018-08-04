
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
								<input type="email" name="email" class="form-control" placeholder="">
							</div>

							<div class="col-sm-6">
								<label>Phone number</label>
								<input type="phone" name="phone" class="form-control">
							</div>
							
						</div>

						<div class="form-group">
							
							<label>Address:</label>
							<input type="text" name="address" class="form-control" placeholder="">

						</div>

						<div class="form-group">
							
							<label>Post Code</label>
							<input type="text" name="postCode" class="form-control" placeholder=""></input>
						</div>

						<label>Payment *</label>
						<div class="form-group">

							<script
							src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
							data-amount="{{$total*100}}"
							data-name="Boomkitchen"
							data-description="Pay your order"
							data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
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
							<span class="total__info">Recipes(<span class="js-checkoutCartTotal">{{$cartTotal}}</span>)</span>
							<span class="total__info">£ <span class="js-checkoutCartTotalPrice">{{$cartTotalPrice}}</span></span>
						</p>

						<p class="total__row">
							<span class="total__info">Delivery cost</span>
							<span class="total__info js-shippingCost" js-shippingCost='{{$shippingCost}}'>£{{$shippingCost}}</span>
						</p>

						<p class="total__row">
							<span class="total__end">Total</span>
							<span class="total__end">£ <span class="js-checkoutCartEndPrice">{{$total}}</span></span>
						</p>

						<a class="total__link" href="">
							Edit order <i class="fas fa-angle-right"></i>
						</a>

					</div>

				</div>

				<div class="checkout__box ">

					<p class="checkout__title">Your box</p>
					
					@foreach ($products as $product)
					<div class="product js-checkoutProduct" js-productId="{{$product['id']}}">

						<div class="product__left">
							<img src="{{$product['image']}}" alt="" class="product__image">
						</div>

						<div class="product__right">

							<p class="product__title">{{$product['name']}}</p>

							<div class="product__total">
								
								<span class="product__description">£{{$product['price']}}</span>
								<span class="product__description ">x<span class="js-productTotal">{{$product['total']}}</span></span>
							
							</div>

						</div>

						<div class="product__bonus">
							<span class="product__control js-productAdd" js-image="{{$product['image']}}" js-productId="{{$product['id']}}" js-total="{{$product['total']}}" js-price="{{$product['price']}}"><i class="fas fa-plus"></i></span>
							<span class="product__control js-checkoutProductRemove" js-productId="{{$product['id']}}" ><i class="fas fa-minus"></i></span>
						</div>

					</div>
					@endforeach


				</div>
			</div>

		</div>

	</div>
	<!-- end container -->

</section>

