@extends('front-end.master')
@section('title')
    Customer Login
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Login Page</li>
            </ol>
        </div>
    </div>
    <div class="login">
        <div class="container">

            <h2>Login Form</h2>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                @if(session('customer_login'))
                    <div class="alert alert-warning alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session('customer_login')}}
                    </div>
                @endif
                <form action="{{route('customer.login')}}" method="Post">
                    @csrf
                    <input type="email" name="email_address" placeholder="Email Address" required=" ">
                    <input type="password" name="password" placeholder="Password" required=" ">
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
            <h4>For New People</h4>
            <p><a href="{{url('/customer-signup-form')}}">Register Here</a> (Or) go back to <a href="{{route('/')}}">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>
    </div>
@endsection

