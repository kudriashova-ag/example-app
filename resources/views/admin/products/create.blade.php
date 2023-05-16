@extends('templates.mainTemplate')

@section('content')
  <h1>Create Product</h1>

  {!! Form::open(['url' => 'admin/products/create']) !!}

    <div class="form-group">
      {!! Form::label('name', 'Product Name') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group mt-3">
      {!! Form::label('price', 'Product Price') !!}
      {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group mt-3">
      {!! Form::label('category_id', 'Category') !!}
      {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group mt-3">
      {!! Form::label('description', 'Description') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>

     {!! Form::submit('Save', ['class'=>'btn btn-primary mt-3']) !!}

  {!! Form::close() !!}
@endsection