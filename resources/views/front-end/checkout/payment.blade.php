@extends('front-end.master')
@section('title')
    payment
@endsection
@section('content')
    <div class="register">
        <div class="container">
            <h2>Please follow up below information</h2>
            <div class="login-form-grids">
                <h5></h5>
                <form action="{{route('new-order')}}" method="Post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>  Cash On Delivery</th>
                            <td><input type="radio" name="payment_type" value="Cash">&nbsp;Cash On Delivery</td>
                        </tr>
                        <tr>
                            <th> Bkash</th>
                            <td><input type="radio" name="payment_type" value="Bkash">&nbsp;bKash</td>
                        </tr>
                        <tr>
                            <th> Paypal</th>
                            <td><input type="radio" name="payment_type" value="paypal">&nbsp;Paypal</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="btn" value="Confirm Order"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="register-home">
                <a href="{{url('/')}}">Home</a>
            </div>
        </div>
    </div>
@endsection



