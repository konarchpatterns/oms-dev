<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/frontend/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/theme.css')}}">
    
    <!--<link rel="stylesheet" type="text/css" href="{{asset('css/frontend/flexigrid.css')}}">-->

    <link href="{{asset('favicon.ico')}}" rel="icon" type="image/png" >
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>-->

    <title>@yield('pagetitle')</title>

    
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{asset('js/frontend/bootstrap.min.js')}}"></script>-->



    <!-- Flexi grid Starts  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/flexigrid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/styleII.css')}}" />
    <script type="text/javascript" src="{{asset('js/frontend/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontend/flexigrid.js')}}"></script>
    

</head> 