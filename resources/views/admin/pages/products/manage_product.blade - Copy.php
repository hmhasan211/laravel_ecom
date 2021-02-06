@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-10 col-sm-offset-1 ">
            @if(session('message'))
                <div class="alert alert-success alert-dismissable ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session('message')}}
                </div>
            @endif
            @if(session('dlt'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session('dlt')}}
                </div>
            @endif
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <Table class="table table-bordered table-responsive-display table-primary table-hover text-center">
                        <tr class="bg-info text-center">
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Qunatity</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                      @if($products)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$products->firstItem()+$loop->index}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td><img src="{{asset($product->product_image)}}" alt="" width="50px" height="50px"></td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->short_description}}</td>
                                <td>{!! $product->long_description!!}</td>
                                <td>{{ $product->pub_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    @if($product->pub_status == 1)
                                        <a href="{{route('unpublished-product',['id'=>$product->id])}}" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('published-product',['id'=>$product->id])}}" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-arrow-down"></span></a>
                                    @endif
                                        <a href="" class="btn btn-primary btn-xs" title="viewDetails"> <span class="glyphicon glyphicon-zoom-in"></span></a>
                                        <a href="{{url('edit/product/'.$product->id)}}" class="btn btn-success btn-xs" title="Edit"> <span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="{{url('delete/product/'.$product->id)}}" title="Delete" class="btn btn-danger btn-xs"  onClick="return confirm('Are sure want to delete?')" > <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            @endforeach
                          @endif
                    </Table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
