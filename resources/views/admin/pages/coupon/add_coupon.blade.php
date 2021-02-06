@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2 ">
            <div class="panel panel-default " style="margin-top: 50px">
                <div class="panel-body ">
                    <form action="{{ route('/new-coupon') }}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-4">Coupon name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="coupon_name">
                                <span class="text-danger"> {{ $errors->has('coupon_name') ? $errors->first('coupon_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4"> Discount</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="discount">
                                <span class="text-danger"> {{ $errors->has('discount') ? $errors->first('discount') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-md-8 ">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save coupon" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

