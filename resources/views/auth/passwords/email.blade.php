@extends('auth.auth-master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ __('Reset Password') }}</h3>
                </div>
                <div class="panel-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <fieldset>
                            <div class="form-group">
                                <input  class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" type="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            
                            <div class="form-group">
                                <button class="form-control btn btn-success btn-block" name="btn" type="submit"> {{ __('Send Password Reset Link') }}</button>
                            </div>

                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
