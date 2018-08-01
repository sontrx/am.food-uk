

<section class="products">

	<div class="container">

		<h2 class="products__title">Build your Boom Box Subscription</h2>
		<div class="products__box">


			@foreach ($products as $product)
			<div class="card products__card" js-productId="1"> 
				<a href="product?id={{$product['id']}}" class="products__link">
					<img class="card-img-top products__image" src="{{$product['image']}}" alt="Card image cap">
				</a>

				<div class="card-body">
				  <h5 class="card-title products__name"><a class="products__link" href="product?id={{$product['id']}}">{{$product['name']}}</a></h5>
				  <p class="card-text products__price">£{{$product['price']}}</p>

				  <div class="products__buy">
				  	<button class="btn btn-primary btn-sm products__button js-productAdd" js-image="{{$product['image']}}" js-productId="{{$product['id']}}" js-total="1" js-price="{{$product['price']}}">Add 1 recipe <i class="fas fa-plus"></i></button>	
				  </div>
				</div>

			</div>
			@endforeach
			
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
		<!-- end product__box -->

	</div>
	<!-- end container -->

</section>