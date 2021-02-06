@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2 ">
            <div class="panel panel-default " style="margin-top: 50px">
                <div class="panel-body ">
                    <form action="{{ route('/new-brand') }}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-4">Brand name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="brand_name">
                               <span class="text-danger"> {{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Brand Description</label>
                            <div class="col-md-8">
                                <textarea name="brand_description" class="form-control" ></textarea>
                                <span class="text-danger"> {{ $errors->has('brand_description') ? $errors->first('brand_description') : '' }}</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Publicatin Status</label>
                            <div class="col-md-8 radio">
                                <label > <input type="radio" name="pub_status" value="1" checked>Published</label>
                                <label > <input type="radio" name="pub_status" value="0">Unpublished</label> <br>
                                <span class="text-danger"> {{ $errors->has('pub_status') ? $errors->first('pub_status') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-md-8 ">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Brand" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
