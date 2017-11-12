@extends('app')
@section('body')
    <div class="row">
        <div class="col-md-xs-12 col-sm-6 col-md-5 offset-sm-3 offset-md-3">
            <div class="card">
                <div class="card-block">
                    <h1 class="card-title text-center">Register</h1>
                    <form action="/register" method="post" autocomplete="off">
                        {{csrf_field()}}
                        <div class="form-group {{ hasError($errors,'name') }}">
                            <div class="col-md-10 offset-md-1">
                                <input type="text" class="form-control {{ hasError($errors,'name', true) }} " placeholder="name" name="name"
                                       id="name" value="{{old('name')}}">
                                {!! getErrorMessage($errors,'name')!!}
                            </div>
                        </div>
                        <div class="form-group {{ hasError($errors,'email') }}">
                            <div class="col-md-10 offset-md-1">
                                <input type="email" class="form-control {{ hasError($errors,'email', true) }} " placeholder="email" name="email" id="email" value="{{old('email')}}">
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
                                       name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-12 offset-md-2  text-center">
                                <button class="btn btn-primary btn-block btn-flat" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p class="center-block text-center">
                Already have an account ?<a href="{{route('login')}}" class="btn btn-link">Login</a>
            </p>
        </div>
    </div>
@stop
