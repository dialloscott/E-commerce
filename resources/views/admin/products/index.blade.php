@extends('admin.dashboard')

@section('body')
    <div class="card">
        <h6 class="card-header text-center font-bold font-up py-4">
            There are {{ $product_count }} product{{ $product_count > 1 ? 's' :  '' }}
        </h6>
        <div class="card-body">
            <div id="table" class="table-editable"><br>
                <span class="table-add float-right mb-3 mr-2"><a href="{{route('products.create')}}"
                                                                 class="btn btn-success btn-sm">Add new Product</a></span>
                <table class="table table-bordered table-responsive table-striped text-center">
                    <tr>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Images</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Featured</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>

                                <form action="{{ route('products.destroy',$product) }}" method="post"
                                      class="form-delete-product">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <a href="" class="delete-product">
                                        <i class="material-icons red-text">delete_forever</i>
                                    </a>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('products.edit',$product)}}">
                                    <i class="material-icons green-text">mode_edit</i>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('products.show',$product)}}">
                                    <i class="material-icons ">add_a_photo</i>
                                </a>
                            </td>
                            <td>
                                @if($product->featuredImage())
                                    <img src="{{ $product->featuredImage()->secure_url }}" alt="" style="max-width:30%;">
                                @endif
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                @if(!$product->reduce)
                                {{ $product->price }}&euro;
                                @else
                                    <s class="text-danger">{{  $product->reduce }}</s>&euro;
                                    {{ $product->price }}&euro;
                                @endif
                            </td>
                            <td>
                                {{$product->featured  ? 'Yes' : 'No'}}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-md-8 offset-md-2">{{$products->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@stop