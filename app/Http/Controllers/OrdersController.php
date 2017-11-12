<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\PaymentRequest;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class OrdersController extends Controller
{
    public function index()
    {
        $user_id = $this->user()->id;
        if (!Cart::where('user_id', $user_id)->count()) {
            flash()->notice('No orders', 'You do not have any order');
            return redirect('/');
        }
        $carts = Cart::where('user_id', $user_id)->get();
        $cart_count = $carts->count();
        $total = Cart::with('product')->where('user_id', $user_id)->sum('total');
        return view('orders.index', compact('carts', 'cart_count', 'total'));
    }

    public function store(PaymentRequest $request)
    {
        $user = $this->user();
        $carts = Cart::with('product')->where('user_id', $user->id)->get();
        $cart_total = Cart::with('product')->where('user_id', $user->id)->sum('total');
        Stripe::setApiKey("sk_test_c51SVOj0RfXhlrMT9TgJMIiy");
        try {
            $customer = Customer::create([
                'source' => $request->get('stripeToken'),
                'email' => $user->email,
                'description' => $request->get('full_name')
            ]);
            $charge = Charge::create([
                'amount' => $cart_total * 100,
                'currency' => 'eur',
                'customer' => $customer->id
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment error try again');
        }
        $order = Order::create([
            'user_id' => $user->id,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'full_name' => $request->get('full_name'),
            'zip_code' => $request->get('zip_code'),
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'address_2' => $request->get('address_2'),
            'total' => $cart_total
        ]);

        foreach ($carts as $cart) {
            $order->products()->attach($cart->product->id, [
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
                'reduce' => $cart->product->reduce,
                'total' => $cart->quantity * $cart->product->price,
                'total_reduce' => $cart->product->reduce * $cart->quantity
            ]);
        }
        Cart::where('user_id', $user->id)->delete();
        flash()->success('Success', 'Your oder was processed successfully');
        return redirect('/');
    }
}
