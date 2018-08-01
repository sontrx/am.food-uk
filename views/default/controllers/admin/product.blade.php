

@extends('default.layouts.side-menu')


@section('content')
<h2 class="admin__title"><i class="fas fa-edit"></i> Edit</h2>

<form class="form-add-product" action="admin.php" method="post" enctype="multipart/form-data">

	<input type="" name="action" value="edit_product" hidden="">
	<input type="" name="oldImage" value="{{$product['image']}}" hidden="">
	<input type="" name="productId" value="{{$product['id']}}" hidden="">

	<div class="form-group">
		<label for="#productName">Product Name:</label>
		<input type="text" class="form-control" name="productName" value="{{$product['name']}}"  id="productName" placeholder="Enter product name">
	</div>

	<div class="form-group">
		<label for="#productDescription">Description</label>
	    <textarea class="form-control" id="productDescription" name="productDescription" rows="5">{{$product['description']}}</textarea>
	</div>

	<div class="form-group">

		<div class="image-frame">
			<img src="{{$product['image']}}" alt="" class="product-image">
		</div>

		<label for="#productImage">Upload Other Image:</label>
		<input type="file" class="form-control" id="productImage" name="productImage">
	</div>

	<div class="form-group">
		<label for="#productPrice">Price</label>
		<input type="number" class="form-control" id="productPrice" value="{{$product['price']}}" name="productPrice" placeholder="0">
	</div>

	<div class="form-group" style="">
		<button type="submit" class="btn btn-primary btn-block">Edit This Product </button>
	</div>

</form>


@stop
