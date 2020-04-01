@extends('../../layouts/admin')
@section('content')
<div class="app-title" >
    <div>
        <h1><i class="fa fa-bank"></i> Department</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  Add Dept</a></li>
    </ul>
</div>
    <div class="col-md-7">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Add New Department</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('store.dept')}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Department name" name="dept_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="4" placeholder="About Department" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" value="active">Active
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" value="inactive" >Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('extraJs')
    <script type="text/javascript" src="{{asset('js/plugins/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript">
    @if(Session::has('message'))
      var alertType = "{{Session::get('alert_type')}}";
      switch(alertType){
      	case 'success':
          $.notify({
      		message: "{{Session::get('message')}}",
      		icon: 'fa fa-check'
      	},{
      		type: "success"
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

