<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Payment;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::query()
            ->when(
                $search,
                fn($query) =>
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
            )
            ->latest()
            ->paginate(8);

        return view('products.index', compact('products'));
    }

    public function buy(Product $product)
    {
        return view('products.buy', compact('product'));
    }
    public function charge(Request $request, Product $product)
    {
        $request->validate([
            'paymentMethod' => 'required',
        ]);

        $user = auth()->user();

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->paymentMethod);

            $user->charge($product->price * 100, $request->paymentMethod, [
                'return_url' => route('payment.completed'),
            ]);

            Payment::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'payment_intent_id' => $charge->id ?? null,
                'payment_method' => $request->paymentMethod,
                'amount' => $product->price,
                'currency' => 'inr',
                'status' => $charge->status ?? 'succeeded',
            ]);

            return redirect()->route('products.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('products.buy', $product->id)
                ->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
