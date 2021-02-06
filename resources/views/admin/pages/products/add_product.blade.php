@extends('admin.master')

@section('content')
    <div class="row" >
        <div class="col-sm-10 col-sm-offset-1 ">
           @if(Session::has('msg')){{ Session::get('msg') }} @endif
            <div class="panel panel-default " style="margin-top: 50px">
                <div class="panel-body ">
                    <form action="{{ route('/new-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-3">Category name</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control" >
                                    <option >---Select Category---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> {{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Brand name</label>
                            <div class="col-md-9">
                                <select name="brand_id" class="form-control" >
                                    <option >---Select Brand---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid  @enderror"  />
                                <span class="text-danger"> {{ $errors->has('product_name') ? $errors->first('product_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Price</label>
                            <div class="col-md-9">
                                <input type="number" name="product_price" class="form-control" />
                                <span class="text-danger"> {{ $errors->has('product_price') ? $errors->first('product_price') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Quantity</label>
                            <div class="col-md-9">
                                <input type="number" name="product_quantity" class="form-control" />
                                <span class="text-danger"> {{ $errors->has('product_quantity') ? $errors->first('product_quantity') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Short Description</label>
                            <div class="col-md-9">
                                <textarea name="short_description" class="form-control" ></textarea>
                                <span class="text-danger"> {{ $errors->has('short_description') ? $errors->first('short_description') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Long Description</label>
                            <div class="col-md-9">
                                <textarea name="long_description" id="editor" class="form-control" ></textarea>
                                <span class="text-danger"> {{ $errors->has('long_description') ? $errors->first('long_description') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" name="product_image" class="form-control"  />
                                <span class="text-danger"> {{ $errors->has('product_image') ? $errors->first('product_image') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Publicatin Status</label>
                            <div class="col-md-9 radio">
                                <label > <input type="radio" name="pub_status" value="1" checked>Published</label>
                                <label > <input type="radio" name="pub_status" value="0">Unpublished</label> <br>
                                <span class="text-danger"> {{ $errors->has('pub_status') ? $errors->first('pub_status') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3"></label>
                            <div class="col-md-9 ">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Product Info" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
