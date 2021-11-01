@extends('layouts.main')

@section('title', 'Create')

@section('content')
<div class="row">
    <h1 class="col-2">Edit</h1>
    <a href="/" class="col-1">Voltar</a>
</div>
<form action="/edit/{{ $products->id }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="product">Product</label>
    <input type="text" class="form-control" value="{{ $products->product }}" name="product" id="product">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" value="{{ $products->price }}" name="price" id="price">
  </div>
  <button type="submit" class="mt-2 btn btn-primary">Edit</button>
</form>
@endsection