@extends('../layouts/staff')

@section('content')
<div class="app-title" >
    <div>
        <h1><i class="fa fa-dashboard"></i> {{ $title}} </h1>
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
        <div class="tile">
            <h3 class="tile-title">Create New Token</h3><hr><br>
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('token.store' )}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-form-label-lg col-md-3">Name</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-lg" type="text" placeholder="Client name" name="client_name">
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group row">
                        <label class="col-form-label col-form-label-lg col-md-3">Mobile</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">+880</span></div>
                                <input class="form-control form-control-lg" type="text" placeholder="Mobile Number" name="mobile_number">
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group row">
                        <label class="col-form-label col-form-label-lg col-md-3" for="exampleSelect1">Department</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-lg" id="exampleSelect1" name="dept_id">
                                <option value="">Select Department</option>
                                @foreach ($dept as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      &nbsp;

                      <div class="form-group row">
                        <label class="col-form-label col-form-label-lg col-md-3" for="exampleSelect1">Counter</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-lg " id="exampleSelect1" name="counter_id">
                                <option value="">Select Counter</option>
                                @foreach ($counter as $row)
                                    <option value="{{$row->id}}">{{$row->counter_no}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      &nbsp;&nbsp;
                    <div class="tile-footer" style="text-align:center">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-3">
                                <button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-plus"></i>Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
