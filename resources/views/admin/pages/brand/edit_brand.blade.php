@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2 ">
           
            <div class="panel panel-default " style="margin-top: 50px">
                <div class="panel-body ">
                    <form action="{{ route('update-brand') }}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-4">Brand name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="brand_name" value="{{$brands->brand_name}}">
                                <input type="hidden" class="form-control" name="brand_id" value="{{$brands->id}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Brand Description</label>
                            <div class="col-md-8">
                                <textarea name="brand_description" class="form-control" >{{$brands->brand_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Publicatin Status</label>
                            <div class="col-md-8 radio">
                                <label > <input type="radio" name="pub_status" {{$brands->pub_status==1 ?'checked':''}} value="1" checked>Published</label>
                                <label > <input type="radio" name="pub_status" {{$brands->pub_status==0 ?'checked':''}} value="0" >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-md-8 ">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Brand" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
