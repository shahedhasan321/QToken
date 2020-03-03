@extends('layouts/staff')
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
    <div class="tile mb-4">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="mb-3 line-head" id="buttons">Token Create</h2>
            </div>
          </div>
        </div>
    <div class="col-lg-8">
        <p class="bs-component" style="margin-bottom: 25px;">
            <a href="{{route('token.manual')}}">
                <button class="btn btn-primary btn-lg btn-block" type="button"> Manual Token</button>
            </a>
        </p>

        <p class="bs-component" style="margin-bottom: 25px;">
            <button class="btn btn-outline-primary btn-lg btn-block" type="button"> Auto Token</button>
        </p>

        <p class="bs-component" style="margin-bottom: 25px;">
            <button class="btn btn-outline-info btn-lg btn-block" type="button">Block level button</button>
        </p>

        <p class="bs-component" style="margin-bottom: 25px;">
            <button class="btn btn-outline-danger btn-lg btn-block" type="button">Block level button</button>
        </p>
    </div>
    </div>
</div>

@endsection
