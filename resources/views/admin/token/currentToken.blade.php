@extends('../layouts/admin')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Token List</h1>
        <p>Total Number of token including their information</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Token /  TokenList</a></li>
    </ul>
    </div>
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
            <h3 class="tile-title">Current Token List</h3>
            <div class="table-responsive">
            <table class="table" style="text-align:center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Token No</th>
                    <th>Dept</th>
                    <th>Counter No</th>
                    <th>Client Name</th>
                    <th>Client Mobile No</th>
                    <th>Token Status</th>
                    <th>Created_At</th>
                    &nbsp;&nbsp;
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $count=1;
                @endphp
                @foreach($token_list as $token)
                    <tr class="table-success">
                        <td>{{$count}}</td>
                        <td>{{$token->token_no}}</td>
                        <td>{{$token->department->name}}</td>
                        <td>{{$token->counter->counter_no}}</td>
                        <td>{{$token->client->name}}</td>
                        <td>{{$token->client->phone}}</td>
                        <td>
                            @if($token->status=='pending')
                                 <span class="badge badge-pill badge-warning">{{$token->status}}</span>
                            @endif
                        </td>
                        <td>{{$token->created_at->format('d M')}}<br>{{$token->created_at->format('h:i a')}}</td>
                        <td><div class="btn-group">
                                <a class="btn btn-sm btn-danger" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Start" href="{{route('status',['id'=>$token->id,'status'=>'in-process'])}}"><i class="fa fa-lg fa-play"></i></a>
                                <a class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Complete" href="{{route('status',['id'=>$token->id,'status'=>'complete'])}}"><i class="fa fa-lg fa-check"></i></a>
                                <a class="btn btn-sm btn-secondary" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Stop" href="{{route('status',['id'=>$token->id,'status'=>'stop'])}}"><i class="fa fa-lg fa-stop"></i></a>
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
</div>
    <div class="clearfix"></div>
@endsection
