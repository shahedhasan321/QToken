@extends('../../layouts/index')
@section('content')
    @if(Session::has('message'))
    <div class="col-lg-12">
        <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <span><b>{{ Session::get('message') }}</b></span>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Department List</h3>
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Dept. Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created_At</th>
                    <th>Updated_At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dept_list as $dept)
                <tr class="table-info">
                    <td>{{$dept->id}}</td>
                    <td>{{$dept->name}}</td>
                    <td>{{substr($dept->description,0,25)}}</td>
                    <td>
                        @if($dept->status=='active')
                            <span class="badge badge-success">{{$dept->status}}</span>
                        @else
                            <span class="badge badge-secondary">{{$dept->status}}</span>
                        @endif
                    </td>
                    <td>{{$dept->created_at->format('d M')}}</td>
                    <td>{{$dept->updated_at->format('d M ')}}</td>
                    <td><div class="btn-group">
                            <a class="btn btn-primary" href="{{route('edit.dept',['id'=>$dept->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{route('delete.dept',['id'=>$dept->id])}}"><i class="fa fa-lg fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
