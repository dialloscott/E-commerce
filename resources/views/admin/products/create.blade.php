@extends('admin.dashboard')

@section('body')
    <div class="h4 text-center mb4">Add new product</div>
    <form action="{{route('products.store')}}" method="post" autocomplete="off">
      @include('admin.products.form')
    </form>
@stop