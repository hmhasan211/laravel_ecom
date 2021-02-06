@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-12">
            @if(session('msg'))
                <div class="alert alert-success alert-dismissable ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session('msg')}}
                </div>
            @endif
            @if(session('dlt'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session('dlt')}}
                </div>
            @endif
            <div class="panel panel-default" style="margin-top: 10px">
                <div class="panel-body ">
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr class="bg-info text-center">
                            <th>Sl.</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Order Total</th>
                            <th>Discount</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                        </tr>
                        @foreach($orders as $i=>$order)
                            <tr>
                                <td >{{++$i}}</td>
                                <td>{{$order->first_name.' '.$order->last_name}}</td>
                                <td>{{$order->phone_number}}</td>
                                <td>{{round($order->product_price)}}/-</td>
                                <td>
                                    @if($order->discount_amount)
                                        {{$order->discount_amount}}/-
                                    @else
                                       <span>0.00/-</span>
                                    @endif
                                </td>
                                <td>@if($order->created_at==null)
                                       <span class="warning">No time set</span>
                                    @else
                                    {{Carbon\Carbon::parse($order->created_at)->diffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    @if($order->order_status == 'Approved')
                                        <span class="btn btn-primary btn-xs">Approved</span>
                                    @elseif($order->order_status == 'Processing')
                                             <span class="btn btn-info btn-xs">Processing</span>
                                    @elseif($order->order_status == 'Delivered')
                                        <span class="btn btn-success btn-xs">Delivered</span>
                                    @elseif($order->order_status == 'Returned')
                                        <span class="btn btn-danger btn-xs">Returned</span>
                                    @else
                                        <span class="btn btn-warning btn-xs">Pending</span>
                                    @endif
                                </td>
                                <td>{{$order->payment_type}}</td>
                                <td>
                                    <a href="{{route('view-order-details',['id'=>$order->id])}}" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-zoom-in" title="view Order Details"></span></a>
                                    <a href="{{route('view-order-invoice',['id'=>$order->id])}}" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-zoom-out" title="order Invoice"></span></a>
                                    <a href="{{route('download-order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-download" title="Download Invoice"></span></a>
                                    <a href="{{url('/order/destroy/'.$order->id)}}" class="btn btn-danger btn-xs"  onClick="return confirm('Are sure want to delete?')"; > <span class="glyphicon glyphicon-trash" title="Delete Order"></span></a>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info ">order</button>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu ">
                                            <ul>
                                                @if($order->order_status == 'pending')
                                                    <a class="dropdown-item btn btn-primary btn-xs" href="{{url('/order/approved/'.$order->id)}}">Approved</a>
                                                    <a class="dropdown-item btn btn-info btn-xs" href="{{url('/order/processing/'.$order->id)}}">Processing</a>
                                                    <a class="dropdown-item btn btn-success btn-xs" href="{{url('/order/delivered/'.$order->id)}}">Delivered</a>
                                                    <a class="dropdown-item btn btn-danger btn-xs" href="{{url('/order/returned/'.$order->id)}}">Returned</a>
                                                @elseif($order->order_status == 'Approved')
                                                    <a class="dropdown-item btn btn-warning btn-xs" href="{{url('/order/pending/'.$order->id)}}">Pending</a>
                                                    <a class="dropdown-item btn btn-info btn-xs" href="{{url('/order/processing/'.$order->id)}}">Processing</a>
                                                    <a class="dropdown-item btn btn-success btn-xs" href="{{url('/order/delivered/'.$order->id)}}">Delivered</a>
                                                    <a class="dropdown-item btn btn-danger btn-xs" href="{{url('/order/returned/'.$order->id)}}">Returned</a>
                                                @elseif($order->order_status == 'Processing')
                                                    <a class="dropdown-item btn btn-warning btn-xs" href="{{url('/order/pending/'.$order->id)}}">Pending</a>
                                                    <a class="dropdown-item btn btn-primary btn-xs" href="{{url('/order/approved/'.$order->id)}}">Approved</a>
                                                    <a class="dropdown-item btn btn-success btn-xs" href="{{url('/order/delivered/'.$order->id)}}">Delivered</a>
                                                    <a class="dropdown-item btn btn-danger btn-xs" href="{{url('/order/returned/'.$order->id)}}">Returned</a>
                                                @elseif($order->order_status == 'Delivered')
                                                    <a class="dropdown-item btn btn-warning btn-xs" href="{{url('/order/pending/'.$order->id)}}">Pending</a>
                                                    <a class="dropdown-item btn btn-primary btn-xs" href="{{url('/order/approved/'.$order->id)}}">Approved</a>
                                                    <a class="dropdown-item btn btn-info btn-xs" href="{{url('/order/processing/'.$order->id)}}">Processing</a>
                                                    <a class="dropdown-item btn btn-danger btn-xs" href="{{url('/order/returned/'.$order->id)}}">Returned</a>
                                                @elseif($order->order_status == 'Returned')
                                                    <a class="dropdown-item btn btn-warning btn-xs" href="{{url('/order/pending/'.$order->id)}}">Pending</a>
                                                    <a class="dropdown-item btn btn-primary btn-xs" href="{{url('/order/approved/'.$order->id)}}">Approved</a>
                                                    <a class="dropdown-item btn btn-info btn-xs" href="{{url('/order/processing/'.$order->id)}}">Processing</a>
                                                    <a class="dropdown-item btn btn-success btn-xs" href="{{url('/order/delivered/'.$order->id)}}">Delivered</a>
                                                @else
                                                    <span class="text-danger">Sorry!!</span>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </Table>
                </div>
            </div>
        </div>
    </div>
@endsection
