<form class="form-inline my- my-lg-1">
    <input class=" mr-sm-2 form-control" type="text" id="search" placeholder="Search products" data-url="{{route('products.search')}}">
    {{--<button class="btn btn-primary my-2 my-sm-0 btn-flat" type="submit">Search</button>--}}
</form>
<div id="search" style="display: none;" class="search-display">
  <div class="card"></div>
</div>