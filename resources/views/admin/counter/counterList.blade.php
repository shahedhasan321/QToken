@extends('../../layouts/admin')
@section('content')
<div class="app-title" >
    <div>
        <h1><i class="fa fa-bank"></i> Counter</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} / Counter List</a></li>
    </ul>
</div>
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="tile-title">Counter List</h3>
                </div>
                <div class="col-md-2">
                        <a class="btn btn-info" href="{{route('counter.new')}}"><i class="fa fa-lg fa-plus"></i>Add New</a>
                </div>
            </div>
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
                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update" href="{{route('counter.edit',['id'=>$counter->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                <a class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('counter.delete',['id'=>$counter->id])}}"><i class="fa fa-lg fa-trash"></i></a>
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

@section('extraJs')
    <script type="text/javascript" src="{{asset('js/plugins/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript">
    @if(Session::has('message'))
      var alertType = "{{Session::get('alert_type')}}";
      switch(alertType){
      	case 'info':
          $.notify({
      		message: "{{Session::get('message')}}",
      		icon: 'fa fa-check'
      	},{
      		type: "info"
      	});
          break;
        case 'danger':
          $.notify({
      		message: "{{Session::get('message')}}",
      		icon: 'fa fa-times-circle-o'
      	},{
      		type: "danger"
      	});
          break;

      }
    @endif
    </script>

@endsection
