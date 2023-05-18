@extends('templates.mainTemplate')

@section('content')
    <h1>Products</h1>
    
    <a href="{{url('admin/products/create')}}" class="btn btn-primary">Add Product</a>
    {{-- {{ route('products.create') }} --}}

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td>{{$loop->iteration + ($products->currentPage() - 1) * $products->perPage()}}</td>
          <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" style="width: 100px"></td>
          <td>{{$product->name}}</td>
          <td>{{$product->price}}</td>
          <td>{{$product->category->name}}</td>
          <td>
            <a href="/admin/products/{{$product->id}}/edit" class="btn btn-warning">Edit</a>
            <form action="/admin/products/{{$product->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{$products->links()}}
@endsection