@extends('layouts.main')

@section('title', 'Login')

@section('content')
    
    <form method="post" action="{{ route('auth.login') }}">
        @csrf
        <h3 style="margin: 60px 0 40px 0; font-size: 50px;font-weight: bold;text-align:center;">Login</h3>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value={{old('email')}}>
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
        <p>Don't have an account? Please <a href="{{ route('registration.index') }}">register</a>.</p>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
@endsection