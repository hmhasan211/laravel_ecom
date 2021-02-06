@extends('front-end.master')
@section('title')
   Search Result
@endsection
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">  Search for <strong>'{{$search}}'</strong>&nbsp;&nbsp;<i class=" badge badge-info">{{count($searchProducts)}}&nbsp;result found!! </i></li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->


    <div class="products">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="agile_top_brands_grids">
                    @foreach($searchProducts as $pro)
                        <div class="col-md-4 top_brand_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">
                                        <a href="{{url('add/to-wishlist/'.$pro->id)}}" class="badge badge-info" ><i class="fa fa-heart-o"></i>Add to wishlist </a>
                                    </div>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block" >
                                                <div class="snipcart-thumb">
                                                    <a href="{{route('product-details',['id'=>$pro->id])}}"><img title=" {{$pro->product_name}}" alt=" {{$pro->product_name}}" src="{{asset($pro->product_image)}}" height="100px" ></a>
                                                    <p>{{$pro->product_name}}</p>
                                                        <div class="stars">
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                                        </div>
                                                    <h4>Tk: {{$pro->product_price}} </h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('/add/to-cart/'.$pro->id)}}" method="post">
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


            {{$searchProducts->links()}}

        </div>
    </div>

@endsection

