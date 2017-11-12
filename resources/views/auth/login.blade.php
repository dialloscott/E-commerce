@extends('app')

@section('body')
    <div class="col-md-xs-12 col-sm-6 col-md-5 offset-sm-3 offset-md-3">
        <div class="card">
            <div class="card-block">
                <h1 class="card-title text-center">Log in</h1>
                <form action="/login" method="post">
                    {{csrf_field()}}

                    <div class="form-group {{ hasError($errors,'email') }}">
                        <div class="col-md-10 offset-md-1">
                            <input type="text" class="form-control "
                                   placeholder="email" name="email" id="email">
                            {!! getErrorMessage($errors,'email')!!}
                        </div>
                    </div>
                    <div class="form-group {{ hasError($errors,'password') }}">
                        <div class="col-md-10 offset-md-1">
                            <input type="password" class="form-control "
                                   placeholder="password" name="password"
                                   id="password">
                            {!! getErrorMessage($errors,'password')!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 offset-md-1">
                            <label for="">
                                <input type="checkbox" name="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-12 offset-md-3  text-center">
                            <button class="btn btn-primary btn-block btn-flat" type="submit">Register</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-12 text-center">
                    <a href="{{ route('password.request') }}" class="btn btn-link">Forgot password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
