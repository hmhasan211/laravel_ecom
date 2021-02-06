@extends('admin.master')
@section('content')
    <div class="row" >
        <div class="col-sm-8 col-sm-offset-2 ">
            <div class="panel panel-default " style="margin-top: 50px">
                <div class="panel-body ">
                    <form action="{{route('/new-category')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-4">Category name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="category_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Category Description</label>
                            <div class="col-md-8">
                                <textarea name="category_description" class="form-control" ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Publicatin Status</label>
                            <div class="col-md-8 radio">
                                <label > <input type="radio" name="pub_status" value="1" checked>Published</label>
                                <label > <input type="radio" name="pub_status" value="0" >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-md-8 ">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Category" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
