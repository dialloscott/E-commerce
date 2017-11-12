<div class="card">
    <div class="card-title">
        <a data-toggle="collapse" style="color: inherit;" href="#order{{$order->id}}"
           aria-expanded="false" aria-controls="order{{$order->id}}">
            Order#{{$order->id}} {{$order->created_at->format('d,M Y')}}
        </a>

    </div>
</div>
<div class="collapse" id="order{{$order->id}}">
    <div class="card card-body" style="height: 300px; overflow: auto;">
        <table class="table-striped">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td><a href="" style="color: inherit;">{{$product->name}}</a></td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td>{{$product->pivot->price}}</td>
                    <td>{{$product->pivot->total}}</td>
                </tr>
            @endforeach
            <tr>
                <td><b>Customer Info</b></td>
                <td><b>{{ $order->first_name }} {{$order->last_name}}</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Shipping Address</b></td>
                <td><b>{{ $order->address }} {{$order->city}} {{$order->state}}</b></td>
                <td>Total</td>
                <td>{{ $order->total }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>