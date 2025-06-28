@extends('layouts.app')

@section('content')
<h2 class="mb-4">{{ $product->name }}</h2>

<div class="row">
    <div class="col-md-6">
        <img src="{{ asset('image.jfif') }}" class="img-fluid rounded" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>{{ $product->description }}</p>
        <h4 class="mb-3">Price: ₹{{ number_format($product->price, 2) }}</h4>

        <form id="payment-form" method="POST" action="{{ route('products.charge', $product->id) }}">
            @csrf
            <div class="mb-3">
                <label for="card-element" class="form-label">Credit or Debit Card</label>
                <div id="card-element" class="form-control p-2" style="height: auto;"></div>
                <input type="hidden" name="paymentMethod" id="payment-method">
            </div>
            <button type="submit" id="pay-button" class="btn btn-success w-100 mt-3">Pay Now</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('cashier.key') }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    const paymentMethodInput = document.getElementById('payment-method');
    const payButton = document.getElementById('pay-button');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        payButton.disabled = true;
        payButton.textContent = 'Processing...';

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: 'card',
            card: card,
        });

        if (error) {
            alert(error.message);
            payButton.disabled = false;
            payButton.textContent = 'Pay Now';
        } else {
            paymentMethodInput.value = paymentMethod.id;
            form.submit();
        }
    });
</script>
@endsection
