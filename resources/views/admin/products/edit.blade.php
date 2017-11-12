@extends('app')

@section('body')
    <h1 class="text-center">Edit {{ $product->name}} </h1>
    <form action="{{route('products.update',$product)}}" method="post">
        {{ method_field('PUT') }}
        @include('admin.products.form')
    </form>
@stop