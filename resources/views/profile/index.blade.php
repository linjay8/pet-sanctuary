@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <p class="mt-5">Hello, {{ $user->name }}. Your email is {{ $user->email }}.</p>
@endsection