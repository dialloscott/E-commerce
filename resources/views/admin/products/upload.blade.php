@extends('admin.dashboard')

@section('body')
    <h5 class="text-center">Upload Product images for {{ $product->name }}</h5>
    @if(!$user->isAdmin())
        <p class="text-center">Cannot upload images as {{ $user->name }}</p>
    @endif
    @if($user->isAdmin())
        @if($product->images()->count() > 7)
            <p class="text-center">Cannot upload more than 8 photos for one product.Delete some photos to upload other
                photos.</p>
        @else
            <form action="{{route('products.attach.image',$product)}}" class="dropzone" enctype="multipart/form-data"
                  id="add-image">
                {{csrf_field()}}
            </form>
        @endif
    @endif
    <div class="row">
        @foreach($product->images as $image)
            <div class="col-xs-6 col-sm-4 col-md-3">
                <p>{{$image->id}}</p>
                <a href="{{ $image->imageUrl() }}" data-lity>
                    <img src="/{{$image->imageUrl()}}" alt="" width="200" height="200" class="img-thumbnail"
                         data-id{{$image->id}}>
                </a>
            </div>
        @endforeach
    </div>
    @if($product->images()->count() > 0)
        <p class="text-center">
            Witch image do you want featured as the main product image for {{ $product->name }}
        </p>
        <form action="{{route('products.images.featured',$product->id)}}" method="post">
            <div class="form-group">
                <select name="image_id" id="featured" class="form-control">
                    @foreach($product->images as $image)
                        <option value="{{$image->id}}" {{ $product->featuredImage() && $product->featuredImage()->id == $image->id ? 'selected' : '' }}>{{ $image->id }}</option>
                    @endforeach
                    {{csrf_field()}}

                </select>
                <button class="btn btn-primary">Featured</button>
            </div>
        </form>
    @endif
@stop