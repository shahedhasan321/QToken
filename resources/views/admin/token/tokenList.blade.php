@extends('../layouts/admin')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> {{$title}}</h1>
        <p>Total Number of token including their information</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  {{$title}}</a></li>
    </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Token List</h3>
            <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
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
                    <th>Updated_At</th>
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
                        <td style="text-align:center">
                            @if($token->status=='pending')
                                 <span class="badge badge-pill badge-warning">{{$token->status}}</span>
                            @elseif($token->status=='complete')
                                 <span class="badge badge-pill badge-success">{{$token->status}}</span>
                            @elseif($token->status=='in-process')
                                 <span class="badge badge-pill badge-danger">{{$token->status}}</span>
                            @elseif($token->status=='stop')
                                 <span class="badge badge-pill badge-secondary">{{$token->status}}</span>
                            @endif
                        </td>
                        <td>{{$token->created_at->format('d M')}}<br>{{$token->created_at->format('h:i a')}}</td>
                            @if($token->status!='pending' && $token->status!='in-process')
                            <td>{{$token->created_at->format('d M')}}<br>{{$token->updated_at->format('h:i a')}}</td>
                            @else
                            <td></td>
                            @endif
                        <td style="text-align:center"><div class="btn-group">
                                <a class="btn btn-sm btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete',['id'=>$token->id])}}"><i class="fa fa-lg fa-trash"></i></a>
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

@section('extraJs')
 <!-- Data table plugin-->
 <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
 <script type="text/javascript">$('#sampleTable').DataTable();</script>
 <script type="text/javascript" src="{{asset('js/plugins/bootstrap-notify.min.js')}}"></script>
 <script type="text/javascript">
    @if(Session::has('message'))
       var alertType = "{{Session::get('type')}}";
       switch(alertType){
           case 'info':
           $.notify({
               message: "{{Session::get('message')}}",
               icon: 'fa fa-check'
           },{
               type: "info"
           });
           break;
         case 'danger':
           $.notify({
               message: "{{Session::get('message')}}",
               icon: 'fa fa-times-circle-o'
           },{
               type: "danger"
           });
           break;

       }
     @endif

 </script>
@endsection
