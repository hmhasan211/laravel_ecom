
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{{asset('/')}}front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    @stack('style')
    <link href="{{asset('/')}}front-end/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="{{asset('/')}}front-end/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
{{--    <script src="{{asset('/')}}front-end/js/jquery-1.11.1.min.js"></script>--}}
    <script src="{{asset('/')}}front-end/js/jquery-3.5.1.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{asset('/')}}front-end/js/move-top.js"></script>
    <script type="text/javascript" src="{{asset('/')}}front-end/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<div class="agileits_header">
    <div class="container">

         <div class="w3l_offers">
            <p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="#SALE70">SHOP NOW</a></p>
        </div>

        <div class="agile-login">
            <ul>

                @if(Session::get('customerId'))
                    <li><a href="#" onclick="document.getElementById('customerLogoutForm').submit();">Logout</a></li>
                    <li><a href="{{route('customer.help')}}">Help</a></li>
                @else
                    <li><a href="{{ url('/customer-signup-form') }}"> Create Account </a></li>
                     <li><a href="{{ route('customer.login.form') }}">Login</a></li>
                    <li><a href="{{route('customer.help')}}">Help</a></li>
                @endif
            </ul>
            {{--form for logout--}}
            <form id="customerLogoutForm" action="{{route('customer-logout')}}" method="Post">
                @csrf
            </form>
        </div>
        @php
            $total = App\Cart::all()->where('user_ip',request()->ip())->sum(function ($t){
                return $t->product_price * $t->product_quantity;
                });
            $qty = App\Cart::all()->where('user_ip',request()->ip())->sum('product_quantity');
            $wishlist = App\Wishlist::where('customer_id',Session::get('customerId'))->get();
        @endphp
        <div class="product_list_header">
            <i  class="last"><a href="{{url('/wishlist')}}"> <button class="w3view-car" type="submit" name="submit" ><i class="fa fa-heart" aria-hidden="true">{{count($wishlist)}}</i></button></a>
            <i  class="last"><a href="{{url('/checkout')}}"> <button class="w3view-car" type="submit" name="submit" ><i class="fa fa-cart-arrow-down" aria-hidden="true">{{$qty}}</i></button></a>
                <span>Tk.{{$total}}</span>
            </i>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@if(session('cartAdded'))
    <div class="alert alert-success alert-dismissable text-center ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{session('cartAdded')}}
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning alert-dismissable text-center ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{session('warning')}}
    </div>
@endif
@if(session('item_delete'))
    <div class="alert alert-danger alert-dismissable text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{session('item_delete')}}
    </div>
@endif
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+880) 1627 047 063</li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="{{route('/')}}">super Market</a></h1>
        </div>
        <div class="w3l_search ">
            <form method="post" action="{{url('/search')}}">
                @csrf
                <input type="search" name="search" id="search"  placeholder="Search for a Product..." required="">
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div id="search_result" style="
    position: absolute;"></div>
                <div class="clearfix"></div>
            </form>

        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('/')}}" class="act">Home</a></li>
                    @foreach($categories as $cat)
                    <li class="active"><a href="{{route('/category-product',['id'=>$cat->id])}}" class="act">{{$cat->category_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- //navigation -->
@yield('content')

<!-- //footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>

                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>863 mehdibag, <span>Chittagong.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">hamidhasan@gmail.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    @foreach($categories as $cat)
                        <li class="active"><a href="{{route('/category-product',['id'=>$cat->id])}}" class="act">{{$cat->category_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{url('/')}}">Store</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{url('/checkout')}}">My Cart</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{url('/customer-login-form')}}">Login</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{url('/customer-signup-form')}}">Create Account</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="footer-copy">

        <div class="container">
            <p>© <?php echo date('Y')?> Super Market. All rights reserved | Developed by <a href="#">HamidHasan</a></p>
        </div>
    </div>

</div>
<div class="footer-botm">
    <div class="container">
        <div class="w3layouts-foot">
            <ul>
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="payment-w3ls">
            <img src="{{asset('/')}}front-end/images/card.png" alt=" " class="img-responsive">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/')}}front-end/js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<script src="{{asset('/')}}front-end/js/minicart.min.js"></script>
<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>
<!-- main slider-banner -->
<script src="{{asset('/')}}front-end/js/skdslider.min.js"></script>
<link href="{{asset('/')}}front-end/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

        jQuery('#responsive').change(function(){
            $('#responsive_wrapper').width(jQuery(this).val());
        });

    });
</script>

<script>
    $(document).ready(function(){

        $('#search').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#search_result').fadeIn();
                        $('#search_result').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'li', function(){
            $('#search').val($(this).text());
            $('#search_result').fadeOut();
        });
    });
</script>

<!-- //main slider-banner -->
</body>
</html>
