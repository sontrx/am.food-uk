@extends('default.layouts.default')

@section('content')
        
    <h2>This is content of action-test</h2>
    @foreach ($products as $product)
    {{$product['name']}}
    @endforeach
@stop