@extends('layouts.main')

@section('title', 'Login')

@section('content')
@if(session('errors'))
    <p>{{ session('errors')->first('email') }}</p>
@endif
<h1>Login</h1>
<a href="/">Home</a>
<a href="/login">Login</a>
<a href="/register">Register</a>
<form action="/login" method="post">
    @csrf
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection