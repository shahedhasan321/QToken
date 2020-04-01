@extends('../../layouts/admin')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i>User</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  Add User</a></li>
    </ul>
    </div>
    <div class="col-md-6">
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
            <div class="col-md-6 col-md-offset-2">
                <span> {{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Register Department</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('counter.update',['id'=>$counter->id])}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3">Counter Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  name="counter_no" value="{{$counter->counter_no}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="4" name="description">{{$counter->description}}</textarea>
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
                                <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
