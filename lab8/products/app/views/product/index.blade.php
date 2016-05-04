@extends('product.layout')

@section('bodyContent')
@foreach($products as $product)
<?php 
    print_r($product->name);
    echo ': $';
    print_r($product->price);
    echo '<br>';
?>
@endforeach
@stop