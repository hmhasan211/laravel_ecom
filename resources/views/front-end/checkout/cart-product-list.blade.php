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
            <h2>Your shopping cart contains: <span class="text-info badge badge-success">{{$carts->sum('product_quantity')}}items </span></h2>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $i=>$cart)
                    <tr class="rem1">
                        <td class="invert">{{++$i}}</td>
                        <td class="invert-image"><a href="single.html"><img src="{{asset($cart->products->product_image)}}" style="height: 50px; width: 50px;" alt="cart image " class="img-responsive"></a></td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <a href="{{url('decrease-cart/'.$cart->id)}}" class="entry value-minus"></a>
                                    <div class="entry value"><span>{{$cart->product_quantity}}</span></div>
                                    <a href="{{url('increase-cart/'.$cart->id)}}" class="entry value-plus"></a>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{$cart->products->product_name}}</td>

                        <td class="invert">{{$cart->products->product_price}}</td>
                        <td class="invert">
                            <a href="{{url('/item/destroy/'.$cart->id)}}" class="rem">  <span class="close1"> </span></a>
                        </td>
                    </tr>

                    @endforeach
                    <!--quantity-->
                    <script>
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->
                    </tbody></table>
            </div>
            <div class="checkout-left">
                <div class="checkout-left-basket">
                @if(\Illuminate\Support\Facades\Session::get('coupon'))
                    @else
                    <h4 style="color: black">
                        <form action="{{route('apply-coupon')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" name="coupon" placeholder="Coupon code '21k'" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-block">Apply</button>
                            </div>
                        </div>
                        </form>
                    </h4>
                    @endif
                    <ul>
                        @foreach($carts as $cart)
                        <li>{{$cart->products->product_name}} <i>-</i> <span>{{$cart->product_quantity * $cart->products->product_price}} </span></li>
                        @endforeach
                             @if(Session()->has('coupon'))
                        <li>Subtotal  =<span>Tk.{{$total}}/-</span></li>
                        <li>Discount = <span>{{Session()->get('coupon')['discount']}}%({{ $discount = $total*Session()->get('coupon')['discount']/100}}.tk)</span></li>
                                @php Session()->put('discountAmonut',$discount); @endphp
                        <li>Total  =<span>Tk.{{ $ttl = $total - $discount }}/-</span></li>
                            @else
                        <li>Total  =<span>Tk.{{ $ttl = $total }}/-</span></li>
                            @endif
                        @php
                            \Illuminate\Support\Facades\Session::put('orderTotal',$ttl);
                        @endphp
                    </ul>
                </div>
                <div class="checkout-right-basket">
                    @if(Session::get('customerId') && Session::get('shippingId'))
                    <a href="{{route('checkout-payment')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    @elseif(Session::get('customerId') )
                    <a href="{{route('checkout-shipping')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    @else
                    <a href="{{route('customer.login.form')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    @endif

                    <a href="{{route('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection


