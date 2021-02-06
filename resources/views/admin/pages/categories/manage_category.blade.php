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
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($categories as $category)
                        <tr>
                            <td >{{$i++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_description}}</td>
                            <td>{{ $category->pub_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                @if($category->pub_status == 1)
                                     <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-arrow-up"></span></a>
                                @else
                                    <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-arrow-down"></span></a>
                                @endif
                                <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span></a>
                                <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger btn-xs"  onClick="return confirm('Are sure want to delete?')"; > <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </Table>
                </div>
            </div>
        </div>
    </div>
@endsection
