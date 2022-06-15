@extends('layouts.layout')

@section('title', 'Login | Register')

@section('content')
<div class="row col-md-12">
    <div class="col-md-6">
        <h2 class="text-center">Login</h2>
        <form action="{{ route('auth.authenticate') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button class="btn btn-primary mt-2">Login</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2 class="text-center">Register</h2>
        <form action="{{ route('auth.register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label mt-4">Name</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label mt-4">Confirm password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
            </div>
            <div class="form-group">
                <label for="role" class="form-label mt-4">Role</label>
                <select class="form-select" id="role" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->role }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary my-2">Register</button>
        </form>
    </div>
</div>
@endsection