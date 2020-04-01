@extends('../layouts/admin')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i>Token</h1>
        <p>Total Number of token including their information</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  {{$title}}</a></li>
    </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="tile-title">Current Token List</h3>
                </div>
                <div class=" row col-md-4">
                    <h3>Processing Time: </h3>&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3 id="demo">0</h3>&nbsp;&nbsp;
                    <h4>Sec</h4>

                </div>
            </div><hr>
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
                                <a class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Start" onclick="clock(); document.getElementById('demo').innerHTML='0';" href="#"><i class="fa fa-lg fa-play"></i></a>
                                <a class="btn btn-sm btn-secondary" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Stop" onclick="clearInterval(myTimer);" href="#"><i class="fa fa-lg fa-stop"></i></a>
                                <a class="btn btn-sm btn-success" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Complete" href="{{route('status',['id'=>$token->id,'status'=>'complete'])}}"><i class="fa fa-lg fa-check"></i></a>
                                <a class="btn btn-sm btn-info" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print" href="#"><i class="fa fa-lg fa-print"></i></a>
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

<script type="text/javascript">
    var myTimer;
   function clock() {
     myTimer = setInterval(myClock, 1000);
     var c = 0;

     function myClock() {
       document.getElementById("demo").innerHTML = ++c;
     }
   }
</script>



@endsection
