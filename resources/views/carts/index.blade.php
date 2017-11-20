@extends('app')

@section('body')
    <h4>Your Cart</h4>
    @foreach( $carts as $cart)
        <div class="card mt-2 animated zoomIn">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-4 text-center">{{ $cart->product->name }}</div>
                    <div class="col-md-2"><strong>Price: {{ $cart->product->price }}&euro;</strong></div>
                    <div class="col-md-2">
                        <form action="{{ route('carts.update',$cart) }}" method="post" class="form-inline">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="cart" value="{{ $cart->id }}">
                            <input type="hidden" name="product" value="{{ $cart->product->id }}">
                            <div class="form-group">
                                <select name="quantity" id="" class="form-control mt-1" title="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button class="btn btn-default mt-0">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-1">Qty: {{ $cart->quantity }}</div>
                    <div class="col-md-1"><strong>Total: {{ $cart->total }}&euro;</strong></div>
                    <div class="col-md-2">
                        <a href="" onclick="event.preventDefault(); document.getElementById('cart-delete').submit();">
                            <form action="{{ route('carts.delete',$cart) }}" method="post" id="cart-delete">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <i class="fa fa-times fa-2x text-danger"></i>
                            </form>
                        </a>
                        <form action=""></form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $cart->product->featuredImage() ?$cart->product->featuredImage()->secure_url: '' }}"
                             alt="" class="img-thumbnail" style="width: 40%;">
                    </div>
                    <div class="col-md-4">
                        SKU: <strong>{{ $cart->product->sku }}</strong>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="card mt-3">
        <div class="card-block">
            <div class="row">
                <div class="col-md-6">
                    <i class="material-icons">shopping_cart</i>
                    {{ $cart_count }}
                </div>
                <div class="col-md-6 text-right">
                    Total: <strong>{{ $total }}&euro;</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        @if($total > 0 )
            <a href="{{ route('orders.index') }}" class="btn btn-default mt-3">Checkout</a>
        @else
            <a href="/" class="btn btn-success mt-3">Shopping</a>
        @endif
    </div>
@stop
