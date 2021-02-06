@extends('auth.auth-master')
@section('title')
    Sign Up
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" autofocus>

                                     @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" type="email" autofocus>

                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" type="password" value="">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm password" name="password_confirmation" type="password" required autocomplete="new-password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button class="form-control btn btn-success btn-block" name="btn" type="submit">Register</button>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        Already have an account?
                                    </label>
                                    <a href="{{ route('login') }}">Login now</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
