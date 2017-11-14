<?php

namespace App\Http\Controllers;

use App\Product;

class PagesController extends Controller
{
    public function index()
    {
        dd(parse_url(getenv("DATABASE_URL")));
//        $products =  Product::orderBy('created_at','DESC')->get();
//        return view('pages.index',compact('products'));
    }
}
