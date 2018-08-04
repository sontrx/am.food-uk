
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
			  	@foreach ($products as $product)
			    <tr class="invoice__product">
			      
			      <td><img src="{{$product['image']}}" alt="" class="invoice__product-image"></td>
			      <td><p class="invoice__name">{{$product['name']}}</p></td>
			      <td><span class="invoice__price">£{{$product['price']}}</span></td>
			      <td><span class="invoice__total ">x<span class="js-productTotal">{{$product['total']}}</span></span></td>
			    </tr>
			    @endforeach

			    <tr>
			    	<th colspan='2'>Shipping cost:</th>
			    	<td colspan="2">£{{$shippingCost}}</td>
			    	
			    </tr>
			    <tr>
			    	<th colspan='2'>Total cost:</th>
			    	<td colspan="2">£{{$total}}</td>
			    	
			    </tr>
			  </tbody>

			  
			</table>
			<!-- end table -->
			

		</div>
		<!-- end invoice__table -->
	</div>
</section>