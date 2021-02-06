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
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($brands as $brand)
                            <tr>
                                <td >{{$i++}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td>{{$brand->brand_description}}</td>
                                <td>{{ $brand->pub_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    @if($brand->pub_status == 1)
                                        <a href="{{route('unpublished-brand',['id'=>$brand->id])}}" class="btn btn-info btn-xs" title="Published"> <span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('published-brand',['id'=>$brand->id])}}" class="btn btn-warning btn-xs" title="Unpublished"> <span class="glyphicon glyphicon-arrow-down"></span></a>
                                    @endif
                                    <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-success btn-xs" title="Edit" > <span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="{{route('delete-brand',['id'=>$brand->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are sure want to delete?')"; title="Delete" > <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </Table>
                </div>
            </div>
        </div>
    </div>
@endsection
