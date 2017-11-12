@extends('app')
@section('body')
    <div class="row">
        <div class="col-md-xs-12 col-sm-6 col-md-5 offset-sm-3 offset-md-3">
            <div class="card">
                <div class="card-block">
                    <h1 class="card-title text-center">Reset Password</h1>
                    <form action="{{route('password.request')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="form-group {{ hasError($errors,'email') }}">
                            <div class="col-md-10 offset-md-1">
                                <input type="email" class="form-control {{ hasError($errors,'email', true) }} " placeholder="email" name="email" id="email">
                                {!! getErrorMessage($errors,'email')!!}
                            </div>
                        </div>
                        <div class="form-group {{ hasError($errors,'password') }}">
                            <div class="col-md-10 offset-md-1">
                                <input type="password" class="form-control {{ hasError($errors,'password', true) }} " placeholder="password" name="password"
                                       id="password">
                                {!! getErrorMessage($errors,'password')!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <input type="password" class="form-control" placeholder="confirm password"
                                       name="password_confirm" id="password_confirm">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-12 offset-md-3  text-center">
                                <button class="btn btn-primary btn-block btn-flat" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
