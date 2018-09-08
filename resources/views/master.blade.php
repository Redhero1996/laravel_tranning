<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title') </title>

    <!-- Material Design fonts -->
    {{-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700"> --}}
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-material-design.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/ripples.min.css') !!}">

</head>
<body>

@include('partials.navbar')

@yield('content')

<script src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('js/ripples.min.js') !!}"></script>
<script src="{!! asset('js/material.min.js') !!}"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>

</html