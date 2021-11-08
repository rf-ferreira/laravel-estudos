@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<p>Hello, {{ Auth::user()->name }}</p>
<a href="/logout">Logout</a>
@endsection