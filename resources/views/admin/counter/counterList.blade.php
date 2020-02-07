@extends('../../index');
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
                    <th>Counter No</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created_At</th>
                    <th>Updated_At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($counter_list as $counter)
                    <tr class="table-info">
                        <td>{{$counter->id}}</td>
                        <td>{{$counter->counter_no}}</td>
                        <td>{{substr($counter->description,0,25)}}</td>
                        <td>
                            @if($counter->status=='active')
                                <span class="badge badge-success">{{$counter->status}}</span>
                            @else
                                <span class="badge badge-secondary">{{$counter->status}}</span>
                            @endif
                        </td>
                        <td>{{$counter->created_at->format('d M')}}</td>
                        <td>{{$counter->updated_at->format('d M ')}}</td>
                        <td><div class="btn-group">
                                <a class="btn btn-primary" href="{{route('counter.edit',['id'=>$counter->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                <a class="btn btn-primary" href="{{route('counter.delete',['id'=>$counter->id])}}"><i class="fa fa-lg fa-trash"></i></a>
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
