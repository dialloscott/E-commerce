<?php

namespace App\Http\Controllers;

use App\Product;

class PagesController extends Controller
{
    public function index()
    {
        $products =  Product::all()->get();
        return view('pages.index',compact('products'));
    }
}
