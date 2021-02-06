@extends('front-end.master')
@section('title')
    SuperMarket
@endsection
@section('content')
<!-- main-slider -->
<ul id="demo1">
    <li>
        <img src="{{asset('/')}}front-end/images/11.jpg" alt="" />
        <!--Slider Description example-->
        <div class="slide-desc">
            <h3>Buy Rice Products Are Now On Line With Us</h3>
        </div>
    </li>
    <li>
        <img src="{{asset('/')}}front-end/images/22.jpg" alt="" />
        <div class="slide-desc">
            <h3>Whole Spices Products Are Now On Line With Us</h3>
        </div>
    </li>

    <li>
        <img src="{{asset('/')}}front-end/images/44.jpg" alt="" />
        <div class="slide-desc">
            <h3>Whole Spices Products Are Now On Line With Us</h3>
        </div>
    </li>
</ul>
<!-- //main-slider -->
<!-- //top-header and slider -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h2>Top selling offers</h2>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
                    <li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
                        <div class="agile-tp">
                            <h5>Advertised this week</h5>
                            <p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
                        </div>
                        <div class="agile_top_brands_grids">
                            @foreach(\App\product::where('long_description','LIKE','%'.'offer'.'%')->take(6)->get() as $pro)
                            <div class="col-md-4  top_brand_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid_pos">
                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="{{route('product-details',['id'=>$pro->id])}}"><img title=" " alt=" " src="{{asset($pro->product_image)}}" width="200" height="250px"></a>
                                                        <p>{{$pro->product_name}}</p>
                                                        <a href="{{url('add/to-wishlist/'.$pro->id)}}" title="Add to Wishlist" ><i class="fa fa-heart-o"></i></a>
                                                        <div class="stars">
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                                        </div>
                                                        <h4>Tk.{{$pro->product_price}} </h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('add/to-cart/'.$pro->id)}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_price" value="{{$pro->product_price}}">
                                                                <input type="submit" name="submit" value="Add to cart" class="button">
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
                        <div class="agile-tp">
                            <h5>This week</h5>
                            <p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
                        </div>
                        <div class="agile_top_brands_grids">
                            @foreach(\App\product::where('long_description','LIKE','%'.'advertise'.'%')->take(6)->get() as $pro)
                                <div class="col-md-4 top_brand_left">
                                    <div class="hover14 column">
                                        <div class="agile_top_brand_left_grid">
                                            <div class="agile_top_brand_left_grid_pos">
                                            </div>
                                            <div class="agile_top_brand_left_grid1">
                                                <figure>
                                                    <div class="snipcart-item block" >
                                                        <div class="snipcart-thumb">
                                                            <a href="{{route('product-details',['id'=>$pro->id])}}"><img title=" " alt=" " src="{{asset($pro->product_image)}}"  width="200" height="250px"></a>
                                                            <p>{{$pro->product_name}}</p>
                                                            <a href="{{url('add/to-wishlist/'.$pro->id)}}" title="Add to Wishlist" ><i class="fa fa-heart-o"></i></a>
                                                            <div class="stars">
                                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                                            </div>
                                                            <h4>Tk.{{$pro->product_price}} </h4>
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details">
                                                            <form action="{{url('add/to-cart/'.$pro->id)}}" method="post">
                                                                @csrf
                                                                <fieldset>
                                                                    <input type="hidden" name="product_price" value="{{$pro->product_price}}">
                                                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //top-brands -->
<!-- Carousel
   ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="beverages.html"> <img class="first-slide" src="{{asset('/')}}front-end/images/b1.jpg" alt="First slide"></a>

        </div>
        <div class="item">
            <a href="personalcare.html"> <img class="second-slide " src="{{asset('/')}}front-end/images/b3.jpg" alt="Second slide"></a>

        </div>
        <div class="item">
            <a href="household.html"><img class="third-slide " src="{{asset('/')}}front-end/images/b1.jpg" alt="Third slide"></a>

        </div>
    </div>

</div><!-- /.carousel -->
<!--banner-bottom-->
<div class="ban-bottom-w3l">
    <div class="container">
        <div class="col-md-6 ban-bottom3">
            <div class="ban-top">
                <img src="{{asset('/')}}front-end/images/p2.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="ban-img">
                <div class=" ban-bottom1">
                    <div class="ban-top">
                        <img src="{{asset('/')}}front-end/images/p3.jpg" class="img-responsive" alt=""/>

                    </div>
                </div>
                <div class="ban-bottom2">
                    <div class="ban-top">
                        <img src="{{asset('/')}}front-end/images/p4.jpg" class="img-responsive" alt=""/>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 ban-bottom">
            <div class="ban-top">
                <img src="{{asset('/')}}front-end/images/111.jpg" class="img-responsive" alt=""/>


            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!--banner-bottom-->
<!--brands-->
<div class="brands">
    <div class="container">
        <h3>Brand Store</h3>
        <div class="brands-agile">
            @foreach(App\Brand::get('brand_name') as $brand)
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">{{$brand->brand_name}}</a></p>
                </div>
            </div>
            @endforeach
           <div class="clearfix"></div>
        </div>
        <div class="brands-agile-1">
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>

            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="brands-agile-2">
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>

            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="col-md-2 w3layouts-brand">
                <div class="brands-w3l">
                    <p><a href="#">Lorem</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//brands-->
<!-- new -->
<div class="newproducts-w3agile" id="SALE70">
    <div class="container">
        <h3>New offers</h3>
        <div class="agile_top_brands_grids">
            @foreach($products as $pro)
            <div class="col-md-3 top_brand_left-1">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                            <a href="{{url('add/to-wishlist/'.$pro->id)}}" class="badge badge-info"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="{{route('product-details',['id'=>$pro->id])}}"><img title=" " alt=" " src="{{asset($pro->product_image)}}" height="250px"></a>
                                        <p>{{$pro->product_name}}</p>
                                        <div class="stars">
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                        </div>
                                        <h4>Tk. &nbsp; {{$pro->product_price}}</h4>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="{{url('add/to-cart/'.$pro->id)}}" method="post">
                                            @csrf
                                            <fieldset>
                                                <input type="hidden" name="product_price" value="{{$pro->product_price}}">
                                               <input type="submit" name="submit" value="Add to cart" class="button">
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //new -->
@endsection

