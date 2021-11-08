@extends('layouts.main')

@section('title', 'Register')

@section('content')
<h1>Register</h1>
<a href="/">Home</a>
<a href="/login">Login</a>
<a href="/register">Register</a>
<form action="/register" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection