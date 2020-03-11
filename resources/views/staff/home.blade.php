@extends('layouts/staff')
@section('content')
  <div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> {{$title}}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  {{$title}}</a></li>
    </ul>
    </div>
    <div class="tile mb-4">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                <h2 class="mb-3 line-head" id="buttons"> Create New Token</h2>
                </div>

                <div class="col-lg-3 col-md-6" >
                    <p class="bs-component" style="margin: 25px">
                        <a data-toggle="modal" data-target="#modalRegisterForm">
                            <button class="btn btn-info btn-ex-lg" type="button"><i class="fa fa-slack" aria-hidden="true" style="font-size:50px"></i><br> Manual Token</button>
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <p class="bs-component" style="margin: 25px">
                        <a href="#">
                            <button class="btn btn-primary btn-ex-lg" type="button"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:50px"></i><br>  Auto Token  </button>
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <p class="bs-component" style="margin: 25px">
                        <a href="{{route('current.list')}}">
                            <button class="btn btn-danger btn-ex-lg" type="button"><i class="fa fa-list" aria-hidden="true" style="font-size:50px"></i><br>  Token List  </button>
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <p class="bs-component" style="margin: 25px">
                        <a href="{{route('token.display')}}">
                            <button class="btn btn-secondary btn-ex-lg" type="button"><i class="fa fa-television" aria-hidden="true" style="font-size:50px"></i><br>  Display  </button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
 </div>
<!------token Create ----------->
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Create New Token</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="margin-left:50px">
        <form id="tokenForm" class="form-horizontal" action="{{route('token.store')}}" method="post" >
            @csrf
            <div class="form-group row">
                <label class="col-form col-md-3">Name</label>
                <div class="col-md-8">
                    <input class="form-control " type="text" placeholder="Client name" name="client_name">
                </div>
            </div>
            &nbsp;
            <div class="form-group row">
                <label class="col-form col-md-3">Mobile</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="017 ** *** ***" name="mobile_number">
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="form-group row">
                <label class="col-form col-md-3" for="exampleSelect1">Department</label>
                <div class="col-md-8">
                    <select class="form-control " id="exampleSelect1" name="dept_id">
                        <option value="">Select Department</option>
                                @foreach ($department as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                    </select>
                </div>
            </div>
            &nbsp;

            <div class="form-group row">
                <label class="col-form col-md-3" for="exampleSelect1">Counter</label>
                <div class="col-md-8">
                    <select class="form-control  " id="exampleSelect1" name="counter_id">
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
                        <button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-plus"></i>Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-lg btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection
