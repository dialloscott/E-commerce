<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(string $name)
    {
        $product = Product::where('name', $name)->first();
        $products = Product::where('category_id', $product->category_id)->where('id', '<>',$product->id)->take(3)->get();
        return view('products.show', compact('product', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $products = Product::where('name','LIKE','%'.$query.'%')->get();
        return $products->pluck('name');
    }
}
