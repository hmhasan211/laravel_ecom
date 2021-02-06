@extends('front-end.master')
@section('title')
    Shipping
@endsection
@section('content')
    <div class="register">
        <div class="container">
            <h2>Please re-check below information</h2>
            <div class="login-form-grids">
                <h5>Shipping Info confirmation</h5>
                <form action="{{route('new-shipping')}}" method="post">
                    @csrf
                    <input type="text" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}" class=" @error('full_name') is-invalid @enderror">
                    <input type="email" name="email_address"  value="{{$customer->email_address}}" class=" @error('email_address') is-invalid @enderror"><br>
                    <input type="text" name="phone_number" value="{{$customer->phone_number}}" class=" @error('phone_number') is-invalid @enderror"><br>
                    <input type="text" name="address" value="{{$customer->address}}" class=" @error('address') is-invalid @enderror">
                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                        </div>
                    </div>
                    <input type="submit" value="Confirm">
                </form>
            </div>
            <div class="register-home">
                <a href="index.html">Home</a>
            </div>
        </div>
    </div>
@endsection


