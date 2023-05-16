@extends('templates.mainTemplate')

@section('content')
  <h1>Edit category</h1>

  @include('templates.formError')

  <form action="/admin/categories/{{$category->id}}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="">Name: </label>
      <input type="text" name="name" class="form-control" value={{$category->name}}>
    </div>

    <div class="form-group mt-3">
      <label for="">Description: </label>
      <textarea name="description" class="form-control">{{$category->description}}</textarea>
    </div>

    <button class="btn btn-primary mt-3">Save</button>
  </form>



@endsection