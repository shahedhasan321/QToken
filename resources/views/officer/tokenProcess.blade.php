@extends('layouts/officer')
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
<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Token Process</h3><hr>
        <div class="row">
        <div class="col-md-3" >
            <h3>Token No.</h3>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="card mb-3 text-white bg-primary" style="text-align:center; margin-right:20px">
                <div class="card-body">
                <blockquote class="card-blockquote">
                    <h2 style="font-size: 60px;">{{$token->token_no}}</h2>
                </blockquote>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <h3>Token Information</h3>&nbsp;&nbsp;&nbsp;&nbsp;
            <h6>Client Name:    &nbsp;&nbsp;<i>{{$token->client->name}}</i></h6>
            <h6>Client Mobile No:  &nbsp;<i>{{$token->client->phone}}</i></h6>
            <h6>Created AT:    &nbsp;&nbsp;<i>{{$token->client->created_at}}</i></h6>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<hr>

            <div class="bs-component" >
                <button class="btn btn-primary btn-lg" type="button" style="margin:5px; width: 140px"><i class="fa fa-play-circle" aria-hidden="true"></i>Start</button>
                <button class="btn btn-success btn-lg" type="button" style="margin:5px; width: 140px"><i class="fa fa-check" aria-hidden="true"></i>Complete</button>
                <button class="btn btn-secondary btn-lg" type="button" style="margin:5px; width: 140px"><i class="fa fa-stop-circle" aria-hidden="true"></i>Stop</button>
                <button class="btn btn-info btn-lg" type="button" style="margin:5px; width: 140px"><i class="fa fa-google-wallet" aria-hidden="true"></i>Recall</button>
              </div>
        </div>
    </div>
    </div>
</div>
@endsection
