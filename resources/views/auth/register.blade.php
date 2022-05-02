@extends('layouts.main')

@section('title', 'Register')

@section('content')
    
    <form method="post" action="{{ route('registration.create') }}">
        @csrf
        <h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">Register</h3>
        <div class="mb-3">
            <label class="form-label" for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
            @error("name")
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
            @error("email")
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
            @error("password")
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <p>Already have an account? Please <a href="{{ route('login') }}">login</a>.</p>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
@endsection