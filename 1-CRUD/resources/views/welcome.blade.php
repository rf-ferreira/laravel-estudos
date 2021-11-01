@extends('layouts.main')

@section('title', 'Products')

@section('content')
<div class="row mt-2">
    <h1 class="col-2">CRUD</h1>
    <a href="/create" class="col-2 h-25 btn btn-primary">Create</a>
</div>
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td> {{ $product->product }} </td>
            <td> {{ $product->price }} </td>
            <td><a href="/edit/{{ $product->id }}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="/delete/{{ $product->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @if(!count($products))
            <td colspan="4">
                No products found.
            </td>
        @endif
    </tbody>
</table>
@endsection