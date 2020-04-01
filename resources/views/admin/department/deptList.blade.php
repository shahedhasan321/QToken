@extends('../../layouts/admin')
@section('content')
<div class="app-title" >
    <div>
        <h1><i class="fa fa-bank"></i> Department </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  Department</a></li>
    </ul>
</div>
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="tile-title">Department List</h3>
                </div>
                <div class="col-md-2">
                        <a class="btn btn-info" href="{{route('new.dept')}}"><i class="fa fa-lg fa-plus"></i>Add New</a>
                </div>
            </div>
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
                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update" href="{{route('edit.dept',['id'=>$dept->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                            <a class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"href="{{route('delete.dept',['id'=>$dept->id])}}"><i class="fa fa-lg fa-trash"></i></a>
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
