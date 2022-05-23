<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{__('Mangoapp')}}</title>

    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ asset('adminlte/dist/css/AdminLTE.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('adminlte/plugins/iCheck/square/blue.css')}}" rel="stylesheet">
    <script src="{{ asset('adminlte/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Validate -->
    <script src="{{ asset('js/jquery.validate.js')}}"></script>
    <!-- Custom css and script -->
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.custom.js')}}"></script>
</head>  