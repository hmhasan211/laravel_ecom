@extends('front-end.master')
@section('title')
     Product details
@endsection
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">View Product</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="products">
        <div class="container">
            <div class="agileinfo_single">

                <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="{{asset($singleProduct->product_image)}}" alt=" "  height="500px" class="img-responsive">
                </div>
                <div class="col-md-8 agileinfo_single_right">
                    <h2>{{$singleProduct->product_name}}</h2>
                    <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
                    </div>
                    <div class="w3agile_description">
                        <h4>{{$singleProduct->short_description}} :</h4>
                        <p>{!!$singleProduct->long_description!!}</p>
                    </div>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h4 class="m-sing">Tk. {{$singleProduct->product_price}} </h4>
                        </div>
                        <div class="snipcart-details top_brand_home_details">
                            <a href="{{url('add/to-wishlist/'.$singleProduct->id)}}" class="btn btn-warning col-sm-4"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                        </div>
                        <div class="snipcart-details top_brand_home_details">
                            <form action="{{url('add/to-cart/'.$singleProduct->id)}}" method="post">
                                @csrf
                                <fieldset>
                                    <input type="hidden" name="product_price" value="{{$singleProduct->product_price}}">
                                    <input type="submit" name="submit" value="Add to cart" class=" button ">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- new -->
    <div class="newproducts-w3agile" id="SALE70" >
        <div class="container">
            <h3>New offers</h3>
            <div class="agile_top_brands_grids">
                @foreach($products as $pro)
                    <div class="col-md-3 top_brand_left-1">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="agile_top_brand_left_grid_pos">
                                            <a href="{{url('add/to-wishlist/'.$pro->id)}}" class="badge badge-info"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                        </div>
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
