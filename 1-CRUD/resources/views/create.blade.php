@extends('layouts.main')

@section('title', 'Create')

@section('content')
<div class="row">
    <h1 class="col-2">Create</h1>
    <a href="/" class="col-1">Voltar</a>
</div>
<form action="/create" method="post">
@csrf
  <div class="form-group">
    <label for="product">Product</label>
    <input type="text" class="form-control" name="product" id="product">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" id="price">
  </div>
  <button type="submit" class="mt-2 btn btn-primary">Create</button>
</form>
@endsection