@extends('../../layouts/index')
@section('content')
    <div class="col-md-8">
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
                        <span><b>{{ Session::get('message')}}</b></span>
                    </div>
                </div>
            </div>
        @endif
        <div class="tile">
            <h3 class="tile-title">New User</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('user.store')}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3">Full Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Exp: A001" name="user_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email" placeholder="Exp: A001" name="user_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Mobile No:</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">+880</span></div>
                                <input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount" name="user_mobile">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="control-label col-md-3" for="exampleInputPassword1">Password</label>
                        <div class="col-md-8">
                            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Enter Password" name="user_password">
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="control-label col-md-3" for="exampleSelect1">User Type</label>
                        <div class="col-md-8">
                            <select class="form-control" id="exampleSelect1" name="user_role">
                                <option value=" ">Select Option</option>
                                <option value="officer">Officer</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Counter</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
