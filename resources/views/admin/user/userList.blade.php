@extends('../../layouts/admin')
@section('content')
    @if(Session::has('message'))
        <div class="col-lg-12">
            <div class="bs-component">
                <div class="alert alert-dismissible alert-info">
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
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Created_At</th>
                    <th>Updated_At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $count=1;
                @endphp
                @foreach($user_list as $user)
                    <tr class="table-success">
                        <td>{{$count}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->created_at->format('d M')}}</td>
                        <td>{{$user->updated_at->format('d M')}}</td>
                        <td><div class="btn-group">
                                <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-edit"></i></a>
                                <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @php
                    $count++;
                    @endphp
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
