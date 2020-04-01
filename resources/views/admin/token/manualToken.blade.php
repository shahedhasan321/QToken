@extends('../layouts/admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> {{$title}} </h1>
        <p>Total Number of token including their information</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  {{$title}}</a></li>
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
            <h3 class="tile-title">Create New Token</h3>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('store' )}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3"><h5>Name:</h5></label>
                        <div class="col-md-8">
                            <input class="form-control form-control-lg" type="text" placeholder="Client name" name="client_name">
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group row">
                        <label class="control-label col-md-3"><h5>Mobile:</h5></label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">+880</span></div>
                                <input class="form-control form-control-lg" type="text" placeholder="Mobile Number" name="mobile_number">
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group row">
                        <label class="control-label col-md-3" for="exampleSelect1"><h5>Department:</h5></label>
                        <div class="col-md-8">
                            <select class="form-control form-control-lg" id="exampleSelect1" name="dept_id">
                                <option value="">Select Department</option>
                                @foreach ($dept as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      &nbsp;&nbsp;&nbsp;

                      <div class="form-group row">
                        <label class="control-label col-md-3" for="exampleSelect1"><h5>Counter:</h5></label>
                        <div class="col-md-8">
                            <select class="form-control form-control-lg" id="exampleSelect1" name="counter_id">
                                <option value="">Select Counter</option>
                                @foreach ($counter as $row)
                                    <option value="{{$row->id}}">{{$row->counter_no}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      &nbsp;&nbsp;
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('extraJs')
    <script type="text/javascript" src="{{asset('js/plugins/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript">
    @if(Session::has('message'))
      var alertType = "{{Session::get('type')}}";
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

