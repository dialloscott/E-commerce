<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        return view('admin.index',compact('orders','users'));
    }
}
