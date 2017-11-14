<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="A medium sized e-commerce shopping cart made by Lamine. Made using Laravel 5.5">
    <meta name="keywords"
          content="shopping, ecommerce, store, electronics, electronics store, lamine, lamine, github, laravel, laravel 5, laravel 5.5">
    <meta name="author" content="lamine diallo">
    <link rel="shortcut icon" href="{{asset('fav-icon.png')}}">
    <title>E-commerce Store</title>
    <style>
        .navbar a{
            color: inherit;
            font-size:18px;
        }
        .navbar{
            margin-bottom:40px;
            box-shadow: 0 0 6px;
        }
        .tt-suggestion {
            color: red;
        }
    </style>
    <!-- Bootstrap core CSS -->
    <script src="{{asset('js/vendor/swal/sweetalert.min.js')}}"></script>
    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome/font-awesome.min.css',true)}}">
    <link rel="stylesheet" href="{{asset('css/mdb/css/mdb.css',true)}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css',true)}}">
    <link rel="stylesheet" href="{{asset('js/vendor/lity/dist/lity.css',true)}}">
    <link rel="stylesheet" href="{{asset('css/app.css',true)}}">
</head>
<body>
@include('partials.nav')
<div class="container">
    @yield('body')
</div>
<script src="{{asset('css/mdb/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('css/mdb/js/mdb.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/axios/axios.min.js') }}"></script>
<script src="{{asset('js/vendor/lity/dist/lity.js')}}"></script>
<script src="{{asset('js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@include('partials.flash')
</body>
</html>
