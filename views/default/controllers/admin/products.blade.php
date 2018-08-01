
@extends('default.layouts.side-menu')


@section('content')
<h2 class="admin__title"><i class="fas fa-list-alt"></i> Products</h2>


<table class="table table-dark table--product">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  	@foreach ($products as $product)
    <tr>
      <th scope="row">{{$product['id']}}</th>
      <td><div class="frame"><img class="image" src="{{$product['image']}}"></div></td>
      <td><a href="admin?tab=product&id={{$product['id']}}" class="product-link"><span class="product-name">{{$product['name']}}</span></a></td>
      <td>{{$product['price']}}</td>
      <td><span class="delete js-deleteProduct" js-productId="{{$product['id']}}" js-productImage="{{$product['image']}}"><i class="fas fa-trash-alt"></i></span></td>
    </tr>
    @endforeach

  </tbody>

</table>

@stop
