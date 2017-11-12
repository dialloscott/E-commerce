@extends('app')

@section('body')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($product->images as $image)
                    <div class="col">
                        <a href="{{ $image->imageUrl() }}" data-lity>
                            <img src="{{$image->imageUrl()}}" alt=""  class="img-thumbnail" style="width: 100%;">
                        </a>
                    </div>
                @endforeach
            </div>
            <ul class="nav nav-tabs mt-5">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">DESCRIPTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">SPECS</a>
                </li>
            </ul>
            <div class="tab-content card p-2">
                <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                    <p>
                        {{$product->description}}
                    </p>
                </div>
                <div class="tab-pane fade in show active" id="panel2" role="tabpanel">
                    <p>
                        {{$product->spec}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3>{{ $product->name }}</h3>
            <p>{{$product->description}}</p>
            <p>Brand: {{ $product->brand->name }}</p>
            @if($product->reduce)
                <div class="text-success"><s>{{ $product->reduce }}&euro;</s></div>
            @endif
            Price: {{ $product->price }}&euro;
            <p><b>Available: {{ $product->quantity }}</b></p>
            <form action="/carts" method="post">
                {{csrf_field()}}
                <input type="hidden" name="product" value="{{$product->id}}">
                <div class="form-group">
                    <label for="quantity" class="control-label">Quantity:</label>
                    <select name="quantity" id="" class="form-control" title="">
                        @for($i = 1 ; $i <= $product->quantity; $i ++)
                            <option value="{{$i}}" {{ $product->quantity == $i ? 'selected' : '' }}>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                @if($user && !$user->alreadyAddToCart($product))
                    <button class="btn btn-default" type="submit">Add to cart</button>
                @endif
            </form>
            <div class="h4 m-lg-3 text-muted">Similar Products</div>
            <div class="row">
                @foreach($products as $product_s)
                    <div class="col-md-6">
                        <a href="{{route('products.desc',$product_s->name)}}"
                           style="color: inherit; text-decoration: none;">
                            <div class="mt-2">
                                {{$product_s->name}}
                            </div>
                            <div class="">
                                <img src="{{$product_s->featuredImage() ? $product_s->featuredImage()->imageUrl() : ''}}" alt="" style="width: 100%;">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop