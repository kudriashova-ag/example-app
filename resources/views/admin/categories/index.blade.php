@extends('templates.mainTemplate')

@section('content')
    <h1>Categories</h1>
    <a href="/admin/categories/create" class="btn btn-primary">Add Category</a>

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$category->name}}</td>
          <td>{{$category->description}}</td>
          <td>
            <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
            <form action="/admin/categories/{{$category->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection