@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <h3 class="text-center text-success">Order Info</h3>
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr>
                            <td>Order No</td>
                            <td>SM#{{$order->id}}</td>
                        </tr>

                        <tr>
                            <td>Order Total</td>
                            <td>{{$order->product_price}}</td>
                        </tr>

                        <tr>
                            <td>Discount</td>
                            <td>{{$order->discount_amount}}</td>
                        </tr>
                        <tr>
                            <td>Order status</td>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        <tr>
                            <td>Order Date</td>
                            <td>{{$order->created_at}}</td>
                        </tr>

                    </Table>
                </div>
            </div>
        </div>
    </div>
    {{--customer info--}}
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <h3 class="text-center text-success">Customer Info</h3>
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr>
                            <td>Customer name</td>
                            <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$customer->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>{{$customer->email_address}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$customer->address}}</td>
                        </tr>

                    </Table>
                </div>
            </div>
        </div>
    </div>

{{--shipping info--}}
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <h3 class="text-center text-success">Shipping Info</h3>
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr>
                            <td>Full name</td>
                            <td>{{$shipping->full_name}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$shipping->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>{{$shipping->email_address}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$shipping->address}}</td>
                        </tr>

                    </Table>
                </div>
            </div>
        </div>
    </div>

{{--    payment--}}
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <h3 class="text-center text-success">Payment Info</h3>
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr>
                            <td>Payment Type</td>
                            <td>{{$payment->payment_type}}</td>
                        </tr>
                        <tr>
                            <td>Payment Status</td>
                            <td>{{$payment->payment_status}}</td>
                        </tr>

                    </Table>
                </div>
            </div>
        </div>
    </div>

    <div class="row" >
        <div class="col-sm-12">
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <h3>Product Info</h3>
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr class="bg-info text-center">
                            <th>Sl.</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total per Product</th>
                        </tr>
                        @if($orderDetails)
                        @foreach($orderDetails as $sl=>$ord)
                        <tr>
                            <td>{{++$sl}}</td>
                            <td>{{$ord->product->product_name}}</td>
                            <td>Tk.{{$ord->product_price}}</td>
                            <td>{{$ord->product_quantity}}</td>
                            <td>Tk.{{$ord->product_quantity*$ord->product_price}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </Table>
                </div>
            </div>
        </div>
    </div>
@endsection

