<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = $this->user()->id;
        $carts = Cart::with('product')->where('user_id', $user_id)->get();
        $cart_count = $carts->count();
        $total = Cart::with('product')->where('user_id', $user_id)->sum('total');
        return view('carts.index', compact('carts', 'cart_count','total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|numeric|exists:products,id',
            'quantity' => 'required|numeric'
        ]);
        $user_id = $this->user()->id;
        $product = $request->get('product');
        $quantity = $request->get('quantity');
        $product = Product::where('id', $product)->first();
        $cart_count = Cart::where('user_id', $user_id)->where('product_id', $product->id)->count();
        if ($product && !$cart_count) {
            $total = $product->reduce ? $quantity * $product->reduce : $quantity * $product->price;

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'total' => $total
            ]);
            return redirect()->back();
        }
        flash()->error('error', 'Sorry the product  has already been added to your cart!');
        return redirect()->back();
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|max:5'
        ]);
        $product = Product::find($request->get('product'));
        if ($product) {
            $quantity = $request->get('quantity');
            $total = $product->reduce ? $quantity * $product->reduce : $quantity * $product->price;
            $cart = Cart::where('user_id', $this->user()->id)->where('product_id', $product->id)->first();
            $cart->update([
               'total' => $total,
                'quantity' => $quantity
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function delete(int $id)
    {
        $cart = Cart::find($id);
        if($cart) {
            $cart->delete();
            flash()->success('Cart deleted','Cart deleted successfully');
            return redirect()->back();
        }
        flash()->success('Invalid','Sorry invalid cart');
        return redirect()->back();
    }
}
