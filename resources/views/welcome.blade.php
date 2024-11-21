@extends('layouts._master')
@section('title', 'Add New Product')
@section('content')
    <div class="welcome">
        <!-- Hero Section -->
        <div class="hero">
            <canvas id="world"></canvas>
            <h1>Welcome to Stock Manager</h1>
            <p>Effortlessly manage your inventory with real-time notifications and powerful features.</p>
            <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">
                <i class="bi bi-box-arrow-in-right"></i> Get Started
            </a>
        </div>
        <!-- Features Section -->
        <div class="container features-section">
            <div class="row text-center">
                <h2 class="mb-5">Why Choose Stock Manager?</h2>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-speedometer2"></i>
                        <h5 class="mt-3">Real-Time Notifications</h5>
                        <p>Stay updated with stock levels and critical thresholds in real time.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-easel2"></i>
                        <h5 class="mt-3">User-Friendly Interface</h5>
                        <p>Easily manage your products and inventory with an intuitive design.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-graph-up-arrow"></i>
                        <h5 class="mt-3">Performance Optimized</h5>
                        <p>Enjoy blazing-fast performance with optimized SQL queries and caching.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts._footer')
@endsection
