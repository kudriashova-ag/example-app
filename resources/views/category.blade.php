@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{$category->name}}</h1>

    <div class="row mt-5">
      @forelse ($products as $product)
          <div class="col-md-4 position-relative">
              <img src="{{asset($product->image)}}" alt="" class="img-fluid">
              <a class="h5 text-center stretched-link d-block text-dark" href="{{url('/product/'.$product->slug)}}">{{$product->name}}</a>
          </div>
      @empty
          <p>No products</p>
      @endforelse
    </div>
@endsection