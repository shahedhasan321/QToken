<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>QueueToken</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app">
    <header class="app-header">
        <a class="app-header__logo" href="{{route('home')}}">QueueT</a>
        <h1 style="color: rgb(3, 253, 253)">Token Display</h1>
    </header>
    <main class='app-display'>
    <div class='row'>
    <div class=" col-lg-10 col-md-12">
        <table class="table table-bordered" style="margin-left: 50px;text-align: center">
            <thead style="color: Orange">
            <tr>
                <th><h2>#</h2></th>
                <th><h3>Token No</h3></th>
                <th><h3>Counter</h3></th>
            </tr>
            </thead>
            @php
             $count=1;
            @endphp
            <tbody style="color: Yellow">
                @foreach ($tokens as $token)
                <tr>
                    <td><h4>{{$count}}</h4></td>
                    <td><h4>{{$token->token_no ?? '--'}}</h4></td>
                    <td><h4>{{$token->counter->counter_no ?? '--'}}</h4></td>
                </tr>
                @php
                $count++;
                @endphp
                @endforeach
            </tbody>
        </table>
  </div>
  </div>
    </main>
  <!-- Essential javascripts for application to work-->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
@yield('extraJs')
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>
</html>
