<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/frontend/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/theme.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Bootstrap sweetalert -->
    <link rel="stylesheet" href="{{asset('sweetalert/sweetalert2.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/select2.css')}}">
    <!--<link rel="stylesheet" type="text/css" href="{{asset('css/frontend/flexigrid.css')}}"> -->
    <link href="{{asset('favicon.ico')}}" rel="icon" type="image/png" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css')}}">
    <title>@yield('pagetitle')</title>
    <!-- Flexi grid Starts  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/flexigrid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/loader.css')}}">
   <!-- <script type="text/javascript" src="{{asset('js/frontend/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontend/flexigrid.js')}}"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="{{asset('js/frontend/custom.js')}}"></script>

    <!--<script src="https://code.jquery.com/jquery-1.4.js"></script>-->
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.js"></script>
    <script type="text/javascript" src="{{asset('js/frontend/flexigrid.js')}}"></script>
    <script src="{{asset('js/frontend/bootstrap.min.js')}}"></script>
   
</head>
