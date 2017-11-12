@extends('app')

@section('body')
    <h4>Orders</h4>
    @foreach($carts as $cart)
     <div class="card mt-2">
         <div class="card-block">
             <div class="row">
                 <div class="col-md-4">
                     {{ $cart->product->name }}
                 </div>
                 <div class="col-md-2">
                     Price: <strong>{{ $cart->product->price }}&euro;</strong>
                 </div>
                 <div class="col-md-2">
                     Qty: <strong>{{ $cart->quantity }}</strong>
                 </div>
                 <div class="col-md-2">
                     Total: <strong>{{ $cart->total }}</strong>
                 </div>
                 <div class="col-md-2">
                     <a href="" onclick="event.preventDefault(); document.getElementById('delete-cart').submit();">
                         <i class="fa fa-times text-danger"></i>
                     </a>
                     <form action="{{ route('carts.delete',$cart->id) }}" id="delete-cart" method="post">
                         {{method_field('DELETE')}}
                         {{ csrf_field() }}
                     </form>
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
   @include('orders.partials.payment')
@stop