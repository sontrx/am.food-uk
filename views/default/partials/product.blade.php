

<section class="product">
	
	<div class="container product__container">
		
		<h2 class="product__title">{{$product['name']}}</h2>
		<div class="product__rating">
			<span class="product__star"><i class="fas fa-star"></i></span>
			<span class="product__star"><i class="fas fa-star"></i></span>
			<span class="product__star"><i class="fas fa-star"></i></span>
			<span class="product__star"><i class="fas fa-star"></i></span>
			<span class="product__star"><i class="fas fa-star"></i></span>
			<small style="font-size: 12px;font-weight: lighter">(500 review)</small>
		</div>
 
  		<div class="product__main">

			
			<img class="product__image" src="{{$product['image']}}"></img>
			

			<div class="product__cart">
				<p class="product__description">

					{{$product['description']}}

				</p>
				<div class="product__info">
					<span class="product__icon"><i class="fas fa-clock"></i></span>
					<span>take 35 mins</span>
				</div>
				<div class="product__info">
					<span class="product__icon"><i class="fab fa-angellist"></i></span>
					<span>use within 4-5 day after receive</span>
				</div>
				<div class="product__info">
					<span class="product__icon"><i class="far fa-chart-bar"></i></span>
					<span>1000cal / serving</span>
				</div>
				<p class="product__price">

					Price: £{{$product['price']}}

				</p>
				<div class="product__add">
					<button class="btn btn-primary btn-block btn-sm product__button js-productAdd" js-image="{{$product['image']}}" js-productId="{{$product['id']}}" js-total="1" js-price="{{$product['price']}}">Add 1 recipe <i class="fas fa-plus"></i></button>
				</div>
			</div>
			
		</div>

	</div>

</section>