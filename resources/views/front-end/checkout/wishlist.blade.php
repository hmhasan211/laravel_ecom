@extends('front-end.master')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li><a href="{{route('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>
    <div class="checkout">
        <div class="container">
            <h2>Your Wishlist  contains: <span>{{count($wishlist)}} Products</span></h2>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Cart</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist as $i=>$wish)
                        <tr class="rem1">
                            <td class="invert">{{++$i}}</td>
                            <td class="invert-image"><a href="single.html"><img src="{{asset($wish->products->product_image)}}" style="height: 50px; width: 80px;" alt="cart image " class="img-responsive"></a></td>
                            <td class="invert">{{$wish->products->product_name}}</td>

                            <td class="invert">{{$wish->products->product_price}}</td>
                            <td class="invert">
                                <form action="{{url('add/to-cart/'.$wish->product_id)}}" method="post">
                                    @csrf
                                <input type="hidden" name="product_price" value="{{$wish->products->product_price}}">
                                    <input type="submit" class="btn btn-info" value="Add To Cart"/>
                                </form>
                            </td>
                            <td class="invert">
                                <a href="{{url('/wishlist/destroy/'.$wish->id)}}" class="rem">  <span class="close1"> </span></a>
                            </td>
                        </tr>

                    @endforeach
                    <!--quantity-->

                    <!--quantity-->
                    </tbody>
                </table>
            </div>
{{--            <div class="checkout-left">--}}
{{--                <div class="checkout-left-basket">--}}
{{--                    @if(\Illuminate\Support\Facades\Session::get('coupon'))--}}
{{--                    @else--}}
{{--                        <h4 style="color: black">--}}
{{--                            <form action="{{route('apply-coupon')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <input type="text" name="coupon" placeholder="Enter coupon code" class="form-control">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <button type="submit" class="btn btn-block">Apply</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </h4>--}}
{{--                    @endif--}}
{{--                    <ul>--}}
{{--                        @foreach($carts as $cart)--}}
{{--                            <li>{{$cart->products->product_name}} <i>-</i> <span>{{$cart->product_quantity * $cart->products->product_price}} </span></li>--}}
{{--                        @endforeach--}}
{{--                        @if(Session()->has('coupon'))--}}
{{--                            <li>Subtotal  =<span>Tk.{{$total}}/-</span></li>--}}
{{--                            <li>Discount = <span>{{Session()->get('coupon')['discount']}}%({{ $discount = $total*Session()->get('coupon')['discount']/100}}.tk)</span></li>--}}
{{--                            @php Session()->put('discountAmonut',$discount); @endphp--}}
{{--                            <li>Total  =<span>Tk.{{ $ttl = $total - $discount }}/-</span></li>--}}
{{--                        @else--}}
{{--                            <li>Total  =<span>Tk.{{ $ttl = $total }}/-</span></li>--}}
{{--                        @endif--}}
{{--                        @php--}}
{{--                            \Illuminate\Support\Facades\Session::put('orderTotal',$ttl);--}}
{{--                        @endphp--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="checkout-right-basket">--}}
{{--                    @if(Session::get('customerId') && Session::get('shippingId'))--}}
{{--                        <a href="{{route('checkout-payment')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>--}}
{{--                    @elseif(Session::get('customerId') )--}}
{{--                        <a href="{{route('checkout-shipping')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>--}}
{{--                    @else--}}
{{--                        <a href="{{route('customer.login.form')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>--}}
{{--                    @endif--}}

{{--                    <a href="{{route('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>--}}

{{--                </div>--}}
{{--                <div class="clearfix"> </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection


