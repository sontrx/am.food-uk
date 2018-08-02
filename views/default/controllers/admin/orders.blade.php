
@extends('default.layouts.side-menu')


@section('content')
<h2 class="admin__title"><i class="fas fa-list-alt"></i> Orders</h2>


<table class="table table-dark table--product .table-responsive table-hover table-bordered orders-table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">content</th>
      <th scope="col">buyer</th>
      <th scope="col">email</th>
      <th scope="col">address</th>
      <th scope="col">post code</th>
      <th scope="col">created at</th>
    </tr>
  </thead>
  <tbody>

  	@foreach ($orders as $order)
    <!-- {{$order['content']}} -->
    <tr>
      <th scope="row">{{$order['id']}}</th>
      <td>
      {{$order['content']}}
        
      </td>
      <td>{{$order['buyer']}}</td>
      <td>{{$order['email']}}</td>
      <td>{{$order['address']}}</td>
      <td>{{$order['zipcode']}}</td>
      <td>{{$order['created_at']}}</td>
      
    </tr>
    @endforeach

  </tbody>

</table>

@stop
