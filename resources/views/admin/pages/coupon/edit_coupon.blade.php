@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2 ">

            <div class="panel panel-default " style="margin-top: 50px">
                <div class="panel-body ">
                    <form action="{{ route('update-coupon') }}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-4">Coupon name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="coupon_name" value="{{$coupons->coupon_name}}">
                                <input type="hidden" class="form-control" name="coupon_id" value="{{$coupons->id}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4">Discount</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="discount" value="{{$coupons->discount}}">
                                <input type="hidden" class="form-control" name="coupon_id" value="{{$coupons->id}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Publicatin Status</label>
                            <div class="col-md-8 radio">
                                <label > <input type="radio" name="pub_status" {{$coupons->pub_status==1 ?'checked':''}} value="1" checked>Published</label>
                                <label > <input type="radio" name="pub_status" {{$coupons->pub_status==0 ?'checked':''}} value="0" >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-md-8 ">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Coupon" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
