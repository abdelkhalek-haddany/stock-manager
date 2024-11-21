@extends('layouts._master')
@section('title', 'Add New Product')
@section('content')
    <div class="register-container">
        <h2 class="text-center">Create a New Account</h2>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" required
                    placeholder="Enter your full name" value="{{ old('name') }}">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required
                    placeholder="Enter your email" value="{{ old('email') }}">
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

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required
                    placeholder="Confirm your password">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>

            <p class="text-center">Already have an account? <a href="{{ route('auth.login') }}">Login here</a></p>
        </form>
    </div>
@endsection
