@extends('layouts/officer')
@section('content')

<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> {{$title}}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role }} /  {{$title}}</a></li>
    </ul>
</div>
<div class="tile mb-4">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12">
            <h2 class="mb-3 line-head" id="buttons"> Call New Token</h2>
            </div>

            <div class="col-lg-4 col-md-8" >
                <p class="bs-component" style="margin: 30px">
                    <a href="{{route('current.token')}}">
                        <button class="btn btn-info btn-ex-lg" type="button"><i class="fa fa-slack" aria-hidden="true" style="font-size:50px"></i><br> Manual Call</button>
                    </a>
                </p>
            </div>

            <div class="col-lg-4 col-md-8">
                <p class="bs-component" style="margin: 30px">
                    <a href="{{route('call.auto')}}">
                        <button class="btn btn-primary btn-ex-lg" type="button"><i class="fa fa-play" aria-hidden="true" style="font-size:50px"></i><br>  Auto Call  </button>
                    </a>
                </p>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Line Chart</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Bar Chart</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
        </div>
      </div>
    </div>
</div>

@endsection

@section('extraJs')
<script type="text/javascript" src="{{asset('js/plugins/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/chart.js')}}"></script>
    <script type="text/javascript">

        $('#demoNotify').click(function(){
      	$.notify({
      		title: "Update Complete : ",
      		message: "Something cool is just updated!",
      		icon: 'fa fa-check'
      	},{
      		type: "info"
      	});
      });
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Red"
      	},
      	{
      		value: 50,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Green"
      	},
      	{
      		value: 100,
      		color: "#FDB45C",
      		highlight: "#FFC870",
      		label: "Yellow"
      	}
      ]

      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);

      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);

      var ctxr = $("#radarChartDemo").get(0).getContext("2d");
      var radarChart = new Chart(ctxr).Radar(data);

      var ctxpo = $("#polarChartDemo").get(0).getContext("2d");
      var polarChart = new Chart(ctxpo).PolarArea(pdata);

      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);

      var ctxd = $("#doughnutChartDemo").get(0).getContext("2d");
      var doughnutChart = new Chart(ctxd).Doughnut(pdata);
    </script>

@endsection
