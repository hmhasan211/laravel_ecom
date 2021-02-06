@extends('auth.auth-master')
@section('title')
    Reset Password
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Reset Password') }}</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('password.update') }}">
                           @csrf
                          
                            <fieldset>
                                  <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input  class="form-control @error('email') is-invalid @enderror"  name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ __(' Password') }}" type="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input  id="password-confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password_confirmation" value="{{ __('Confirm Password') }}" type="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button class="form-control btn btn-success btn-block" name="btn" type="submit">Reset Password</button>
                                </div>

                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

