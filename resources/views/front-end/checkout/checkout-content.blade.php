@extends('front-end.master')
@section('title')
    Sign up
@endsection
@section('content')
    <div class="register">
        <div class="container">
            <h2>Register Here</h2>
            <div class="login-form-grids">
                <h5>profile information</h5>
                <form action="{{route('customer.signup')}}" method="post">
                    @csrf
                    <input type="text" name="first_name" placeholder="First Name..." class=" @error('first_name') is-invalid @enderror">
                    <input type="text" name="last_name"  placeholder="Last Name..." class=" @error('last_name') is-invalid @enderror"><br>
                    <input type="email" name="email_address" id="chkEmail"  placeholder="Email Address" class=" @error('email_address') is-invalid @enderror">
                         <span id="res"></span>
                    <input type="password" name="password" placeholder="Password" class=" @error('password') is-invalid @enderror"><br>
                    <input type="text" name="phone_number" placeholder="Phone Number" class=" @error('phone_number') is-invalid @enderror"><br>
                    <input type="text" name="address" placeholder="Address..." class=" @error('address') is-invalid @enderror">
                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                        </div>
                    </div>
                    <input type="submit" value="Register" id="regBtn">
                </form>
            </div>
            <div class="register-home">
                <p><a href="{{url('customer-login-form')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Login </a> &nbsp; Or go back to <a href="{{route('/')}}">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
            </div>
        </div>
    </div>


    <script>
        var email_address = document.getElementById('chkEmail');
        email_address.onblur  = function() {
            var email = document.getElementById('chkEmail').value;
            var xmlHttp = new XMLHttpRequest();
            var serverPage = 'https://hamid.wdpf.tech/laravel_ecom/ajax-email-check/' + email;
            xmlHttp.open('GET', serverPage);
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('res').innerHTML = xmlHttp.responseText;

                    if (xmlHttp.responseText == 'Already Exist!!') {
                        document.getElementById('regBtn').disabled = true;
                    } else {
                        document.getElementById('regBtn').disabled = false;
                    }
                }
            }
            xmlHttp.send(null);
        }
    </script>

@endsection


