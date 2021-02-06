@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-10 col-sm-offset-1 ">
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
                <div class="panel panel-default " style="margin-top: 10px">
                <div class="panel-body ">
                    <Table class="table table-bordered table-responsive table-primary table-hover text-center">
                        <tr class="bg-info text-center">
                            <th>Sl.</th>
                            <th>Coupon Name</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($coupons as $coupon)
                            <tr>
                                <td >{{$i++}}</td>
                                <td>{{$coupon->coupon_name}}</td>
                                <td>{{$coupon->discount}}%</td>
                                <td>{{ $coupon->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    @if($coupon->status == 1)
                                        <a href="{{route('unpublished-coupon',['id'=>$coupon->id])}}" class="btn btn-info btn-xs" title="Published"> <span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('published-coupon',['id'=>$coupon->id])}}" class="btn btn-warning btn-xs" title="Unpublished"> <span class="glyphicon glyphicon-arrow-down"></span></a>
                                    @endif
                                    <a href="{{route('edit-coupon',['id'=>$coupon->id])}}" class="btn btn-success btn-xs" title="Edit" > <span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="{{route('delete-coupon',['id'=>$coupon->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are sure want to delete?')"; title="Delete" > <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </Table>
                </div>
            </div>
        </div>
    </div>
@endsection
