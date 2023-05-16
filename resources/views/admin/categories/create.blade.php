@extends('templates.mainTemplate')

@section('content')
  <h1>Create category</h1>

  @include('templates.formError')

  <form action="/admin/categories" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Name: </label>
      <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mt-3">
      <label for="">Description: </label>
      <textarea name="description" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary mt-3">Save</button>
  </form>



@endsection