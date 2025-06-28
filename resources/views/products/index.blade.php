@extends('layouts.app')

@section('content')
<h2 class="mb-4"> Products</h2>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4 align-items-end">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Search products..."
            value="{{ request('search') }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </div>
    @if(request()->has('search') && request('search') !== '')
        <div class="col-auto">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    @endif
</form>

<div class="row">
    @forelse ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('image.jfif') }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">₹{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('products.buy', $product->id) }}" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-center text-muted">No products found.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center">
    {{ $products->withQueryString()->links() }}
</div>
@endsection
