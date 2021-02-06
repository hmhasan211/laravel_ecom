@extends('admin.master')
@push('style')
    <link rel='stylesheet' type='text/css' href="{{asset('admin')}}/css_invoice/style.css" >
    <link rel='stylesheet' type='text/css' href='{{asset('admin')}}/css_invoice/print.css' media="print" />
@endpush
@section('content')
    <div class="row" >
        <div class="col-sm-12">
            <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <div id="page-wrap">

                        <textarea id="header">INVOICE</textarea>

                        <div id="identity">
                <textarea id="address">
                {{ $customer->first_name.' '.$customer->last_name}}
                {{$customer->address}}
                {{$customer->email_address}}
                {{$customer->phone_number}}
                </textarea>

                            <div id="logo">

                                <img id="image" src="{{asset('admin')}}/images_invoice/super_market.png" alt="logo" />
                            </div>

                        </div>

                        <div style="clear:both"></div>

                        <div id="customer">

            <textarea id="customer-title">Super Market.
c/o Hamid Hasan</textarea>

                            <table id="meta">
                                <tr>
                                    <td class="meta-head">Invoice #</td>
                                    <td><textarea>#sm00{{$order->id}}</textarea></td>
                                </tr>
                                <tr>

                                    <td class="meta-head">Date</td>
                                    <td><textarea id="date">{{$order->created_at}}</textarea></td>
                                </tr>
                                <tr>
                                    <td class="meta-head">Amount Due</td>
                                    <td><div class="due">Tk.{{$order->product_price}}</div></td>
                                </tr>

                            </table>

                        </div>

                        <table id="items">
                            <tr>
                                <th>Sl.</th>
                                <th>Product Name</th>
                                <th>Unit Cost</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            @php($sum = 0)
                            @foreach($orderDetails as $orderDetail)
                            <tr class="item-row"class="table table-bordered">
                                <td>{{$loop->index+1}}</td>
                                <td class="item-name"><div><textarea>{{$orderDetail->product->product_name}}</textarea></div></td>
                                <td><textarea class="cost">{{$orderDetail->product_price}}</textarea></td>
                                <td><textarea class="qty">{{$orderDetail->product_quantity}}</textarea></td>
                                <td><span class="price">{{ $total = $orderDetail->product_price*$orderDetail->product_quantity}}</span></td>
                            </tr>
                                @php ($sum = $sum + $total)
                            @endforeach

                            <tr id="hiderow">
                                <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row"></a></td>
                            </tr>

                            <tr >
                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line">Subtotal:</td>
                                <td class="total-value"><div id="subtotal">Tk.{{$sum}}/-</div></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line">Discount:</td>
                                <td class="total-value"><div id="total">
                                        @if($order->discount_amount)
                                            Tk.{{$order->discount_amount }}/-
                                        @else
                                            Tk.0.00/-
                                            @endif
                                    </div></td>
                            </tr>


                            <tr>
                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line balance">Total Amount:</td>
                                <td class="total-value balance"><div class="due">Tk.{{$sum - $order->discount_amount}}/-</div></td>
                            </tr>

                        </table>

                        <div id="terms">
                            <h5>Terms</h5>
                            <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type='text/javascript' src='{{asset('admin')}}/js_invoice/example.js'></script>
@endpush
