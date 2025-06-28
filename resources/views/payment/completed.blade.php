@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-success mb-4">Payment Completed!</h2>
    <p>Thank you for your purchase.</p>
    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Products</a>
</div>
@endsection
