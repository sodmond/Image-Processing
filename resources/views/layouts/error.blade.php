<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pet Food Selector') }}</title>

    <link href="{{ asset('/img/favicon.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style type="text/css">
        @font-face {
            font-family: "Museo";
            src: url("{{ asset('Museo-500.otf') }}");
        }
        a { color: rgba(255, 153, 102, 1.0) }
        a:hover { color: rgba(255, 153, 102, 0.64) }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid text-center py-4">
            <a href="{{ url('/') }}" class="text-decoration-none">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="max-width:280px;"><br>
                <!--span class="h1 text-white fw-200">Pet Food Selector</span-->
            </a>
        </div>

        <div class="container p-4 rounded text-center">
            @yield('content')
        </div>

        <footer class="py-4 mt-4 text-center">
            
        </footer>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('custom-scripts')
    {{--{!! htmlScriptTagJsApi() !!}--}}
</body>
</html>
