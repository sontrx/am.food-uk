@extends('default.layouts.default')

@section('content')
        
    <h2>this test blade </h2>
    @foreach ($products as $product)
    {{$product['name']}}
    @endforeach
@stop