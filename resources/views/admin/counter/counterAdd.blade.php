@extends('../../layouts/index')
@section('content')
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
            <h3 class="tile-title">Register Department</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('counter.store')}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3">Counter Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Exp: A001" name="counter_no">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="4" placeholder="About Counter" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input active" type="radio" name="status" value="active">Active
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
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Counter</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{route('counter.new')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
