@extends('front-end.master')
@section('title')
    Category | category content
@endsection
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Groceries</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--- groceries --->
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="categories">
                    <h2>Categories</h2>
                    @php
                        $cats = \App\categories::latest()->get();
                    @endphp
                    <ul class="cate">
                        @foreach($cats as $cat)
                        <li><a href="{{$cat->id}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$cat->category_name}}</a></li>
                        <ul>
{{--                            @foreach(\App\product::where('category_id','=','brand_id')->get() as $catProduct)--}}
{{--                            <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$catProduct->product_name}}</a></li>--}}
{{--                            @endforeach--}}
                        </ul>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="products-right-grid">
                    <div class="products-right-grids">
                        <div class="sorting">
                            <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by popularity</option>
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by average rating</option>
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>
                            </select>
                        </div>
                        <div class="sorting-left">
                            <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 9</option>
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 18</option>
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 32</option>
                                <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>All</option>
                            </select>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <div class="agile_top_brands_grids">
                    @foreach($catProducts as $catProduct)

                        <div class="col-md-4 top_brand_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">
                                        <a href="{{url('add/to-wishlist/'.$catProduct->id)}}" class="badge badge-info" ><i class="fa fa-heart-o"></i>Add to wishlist </a>
                                    </div>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block" >
                                                <div class="snipcart-thumb">
                                                    <a href="{{route('product-details',['id'=>$catProduct->id])}}"><img title=" {{$catProduct->product_name}}" alt=" {{$catProduct->product_name}}" src="{{asset($catProduct->product_image)}}" height="100px" ></a>
                                                    <p>{{$catProduct->product_name}}</p>
                                                        <div class="stars">
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                                        </div>
                                                    <h4>Tk: {{$catProduct->product_price}} </h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('add/to-cart/'.$catProduct->id)}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_price" value="{{$catProduct->product_price}}">
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


                        <nav class="numbering">
                            <ul class="pagination paging">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!--- groceries --->

            <!-- new -->
            <div class="newproducts-w3agile" id="SALE70">
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
                                                        <h4>Tk.  {{$pro->product_price}}</h4>
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
