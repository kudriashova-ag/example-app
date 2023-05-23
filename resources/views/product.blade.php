@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{$product->name}}</h1>

    <form name="addToCartForm">
      <input type="number" name="qty" value="1" min="1">
      <input type="hidden" name="id" value="{{$product->id}}">
      <button class="btn btn-primary">Add to Cart</button>
    </form>
   
@endsection



