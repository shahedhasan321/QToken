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
        <h3 class="tile-title">Token List</h3>
        <div class="col-lg-3">
            <a href="{{route('token.process')}}">
                <div class="card mb-3 text-white bg-primary">
                    <div class="card-body " style="text-align:center">
                    <blockquote class="card-blockquote">
                        <h1><i class="fa fa-play" aria-hidden="true" style="font-size: 70px;" > </i></h1><br>
                        <h4>Call New Token</i></h4>
                    </blockquote>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

