@extends('layouts._master')
@section('title', 'Edit Product')
@section('content')
    <div class="products">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="custom-form-card">
                    <h2 class="text-center text-warning mb-4">Edit Product</h2>
                    <form method="POST" action="{{ route('products.update', $product) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $product->name) }}" placeholder="Enter product name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity_in_stock" class="form-label">Quantity in Stock</label>
                            <input type="number" id="quantity_in_stock" name="quantity_in_stock"
                                class="form-control @error('quantity_in_stock') is-invalid @enderror"
                                value="{{ old('quantity_in_stock', $product->quantity_in_stock) }}"
                                placeholder="Enter quantity in stock">
                            @error('quantity_in_stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="minimum_stock" class="form-label">Minimum Stock</label>
                            <input type="number" id="minimum_stock" name="minimum_stock"
                                class="form-control @error('minimum_stock') is-invalid @enderror"
                                value="{{ old('minimum_stock', $product->minimum_stock) }}"
                                placeholder="Enter minimum stock threshold">
                            @error('minimum_stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" class="btn btn-warning">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
