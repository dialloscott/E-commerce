@extends('app')

@section('body')
    @include('pages.partials.carousel')
    {{--@include('pages.partials.mobile')--}}
    <section class="section pb-3">
        <h1 class="section-heading h4 pt-3 text-muted text-center">Featured products</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 mb-r">
                    <div class="card animated zoomIn">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <a href="{{route('products.desc',$product->name)}}">
                                <img src="/{{ $product->featuredImage() ? $product->featuredImage()->imageUrl() : '' }}"
                                     alt="" class="img-fluid"
                                     style="width: 100%;height: 80%;">
                            </a>
                        </div>
                        <div class="card-body text-center no-padding">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="card-text">{{substr($product->description,0,20)}}</p>
                            <div class="card-footer">
                               <span class="left">
                                   {{ $product->price }}&euro;
                                   @if($product->reduce)
                                       <span class="discount">{{ $product->reduce }}&euro;</span>
                                   @endif
                               </span>
                                <span class="right"><a class="" data-toggle="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fa fa-heart"></i></a></span>
                                <form action="carts" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    @if($user && !$user->alreadyAddToCart($product))
                                        <button class="btn  btn-success">Add to card</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

@stop