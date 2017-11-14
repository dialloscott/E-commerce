<?php

namespace App\Http\Controllers;

use App\Product;

class PagesController extends Controller
{
    public function index()
    {
        $products =  Product::orderBy('created_at','DESC')->get();
        dd($products[0]);
        return view('pages.index',compact('products'));
    }
}
