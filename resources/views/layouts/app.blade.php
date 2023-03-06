<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/point-of-sales.css') }}">

    <title>Hello, world!</title>
</head>
<body>

<div class="wrapper">
    @yield('sidebar')

    <div id="content">
        @yield('navbar')
        @yield('content')
    </div>



</div>


</body>


<script src="{{asset('bootstrap-5.0.2/js/bootstrap.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</html>
