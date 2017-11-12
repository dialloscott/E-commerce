{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ hasError($errors,'name') }}">
            <input type="text" name="name" id="name" class="form-control" value="{{old('name',$product->name)}}"
                   placeholder="Product name">
            {!! getErrorMessage($errors,'name') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ hasError($errors,'brand') }}">
            <label for="brand_id" class="control-label">Brand</label>
            <select name="brand_id" id="brand_id" class="form-control">
                @foreach($brands as $k => $v)
                    <option value="{{$k}}" {{ $k == $product->brand_id ? 'selected' : '' }}>{{$v}}</option>
                @endforeach
            </select>
            {!!  getErrorMessage($errors,'brand')  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ hasError($errors,'price') }}">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                <input type="text" name="price" id="brand" class="form-control" value="{{old('price',$product->price)}}"
                       placeholder="Product price">
            </div>
            {!! getErrorMessage($errors,'price') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ hasError($errors,'reduce') }}">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                <input type="text" name="reduce" id="brand" class="form-control" value="{{old('reduce',$product->reduce)}}"
                       placeholder="Product reduced price (Optional)">
                {!! getErrorMessage($errors,'reduce')  !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <labeel class="control-label">Category</labeel>
            <select name="category_id" id="category_id" class="form-control" title="category">
                @foreach($categories as $k => $v)
                    <option value="{{$k}}" {{ $k == $product->category_id ? 'selected' : '' }}>{{$v}}</option>
                @endforeach
            </select>
            {!! getErrorMessage($errors,'category_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-check-label">
                <input type="hidden" name="featured" value="0">
                <input class="form-check-input" {{$product->featured ? 'checked' :  '' }} type="checkbox" name="featured" value="1"> Featured Product
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ hasError($errors,'quantity') }}">
            <input type="number" name="quantity" class="form-control" value="{{old('quantity', $product->quantity)}}" min="0"
                   id="quantity"
                   placeholder="Product quantity">
            {!! getErrorMessage($errors,'quantity')  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="sku" class="form-control" value="{{old('sku', $product->sku)}}" readonly id="sku" placeholder="Product SKU">
            <button class="btn btn-info btn-sm"  type="button" onclick="generateSku()">
                generate
            </button>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#description" class="nav-link active" role="tab" data-toggle="tab">Description</a>
            </li>
            <li class="nav-item">
                <a href="#spec" class="nav-link" role="tab" data-toggle="tab">Spec</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in show active" id="description" role="tabpanel">
                <div class="form-group {{hasError($errors,'description')}}">
                    <label for="description" class="control-label">Product description</label>
                    <textarea name="description" id="description" rows="10" class="form-control"
                              placeholder="Product Description">{{old('description', $product->description)}}</textarea>
                    {!! getErrorMessage($errors,'description')!!}
                </div>
            </div>
            <div class="tab-pane fade in show" id="spec" role="tabpanel">
                <label for="spec" class="control-label">Product Spec (Optional)</label>
                <textarea name="spec" id="spec" class="form-control"
                          placeholder="Insert a spec">{!! old('spec',$product->spec) !!}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Create Product</button>
        </div>
    </div>
</div>