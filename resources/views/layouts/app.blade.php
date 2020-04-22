<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PinWeb</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/08da7bafd3.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        

        .rounded-conrners {
            border-radius: 20px;
            border: none;
        }

        .preview {
            border: none;
        }
        
        .preview:hover {
            border-style: solid;
            border-width: medium;
            border-color: #FF4136;
        }



        .avatar {
            /* vertical-align: middle; */
            width: 38.55px;
            height: 38.55px;
            border-radius: 50%;
        }

        /* Add responsiveness - will automatically display the navbar vertically instead of horizontally on screens less than 500 pixels */
        @media screen and (max-width: 500px) {
        .nav-pc {
            display: none;
        }

        }    
    
    </style>
</head>
<body>
    <div id="app">
        @include('common.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
</body>
</html>
