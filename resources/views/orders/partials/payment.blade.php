<p>
    &nbsp;
</p>
<div class="card p-2">
    <div class="card-block">
        <h6 class="card-title">
            Shipping Information
        </h6>
        <hr>
        <form action="{{ route('orders.store') }}" method="post" id="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{hasError($errors,'first_name')}}">
                        <input type="text" name="first_name" id="last_name" class="form-control" title="first_name"
                               placeholder="First name">
                       {!! getErrorMessage($errors,'first_name') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{hasError($errors,'last_name')}} ">
                        <input type="text" name="last_name" id="last_name" class="form-control" title="last_name"
                               placeholder="Last name">
                        {!! getErrorMessage($errors,'last_name') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{hasError($errors,'address')}} ">
                        <input type="text" name="address" id="address" class="form-control" title="address"
                               placeholder="Address 1">
                        {!! getErrorMessage($errors,'address') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="address_2" id="address_2" class="form-control" title="address_2"
                               placeholder="Address 2 (optional)">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{hasError($errors,'city')}} ">
                        <input type="text" name="city" id="city" class="form-control" title="city" placeholder="City">
                        {!! getErrorMessage($errors,'city') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{hasError($errors,'state')}} ">
                        <label for="state" class="control-label">State:</label>
                        <select name="state" id="state" title="state" class="form-control">
                            @foreach(getStates() as $k => $v)
                                <option value="{{ $k }}" >{{ $v }}</option>
                            @endforeach
                        </select>
                        {!! getErrorMessage($errors,'state') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{hasError($errors,'zipe_code')}} ">
                        <input type="text" name="zip_code" id="zip_code" class="form-control" title="zip_code"
                               placeholder="Zip Code">
                        {!! getErrorMessage($errors,'zipe_code') !!}
                    </div>
                </div>
            </div>
            <div class="h4">Payment Information</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="full_name" id="full_name" class="form-control" title="full_name"
                               placeholder="Full Name">
                    </div>
                </div>
            <div class="col-md-6" id="payment-form">
                <div id="card-errors" role="alert"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-default" id="payment-btn" type="submit"> confirm payment {{ $total }}&euro;</button>
            </div>
            </div>
        </form>


    </div>
</div>
