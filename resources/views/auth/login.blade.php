@extends('layouts._master')
@section('title', 'Add New Product')
@section('content')
    <div class="login-container">
        <h2 class="text-center">Login to Your Account</h2>
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required
                    placeholder="Enter your password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <p class="text-center">Don't have an account? <a href="{{ route('auth.register') }}">Register here</a></p>
        </form>
    </div>
@endsection
