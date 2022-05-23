<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/frontend/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/theme.css')}}">
    
    

    <link href="{{asset('favicon.ico')}}" rel="icon" type="image/png" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <title>@yield('pagetitle')</title>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{asset('js/frontend/bootstrap.min.js')}}"></script>


    


   <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"> </script> 
    <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>  -->
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"> </script>
    <script src="https://cdn.rawgit.com/jeffreydwalter/ColReorderWithResize/4e91eab461130c7b8686684f59c3f50e71ecf8a4/ColReorderWithResize.js"></script>
    
    <!--<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>-->

    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('js/frontend/dataTables.colResize.js')}}"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/smasala/ColResize/v2.6.0/examples/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/frontend/dataTables.colResize.css')}}" /> 
     <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/smasala/ColResize/v2.6.0/examples/style.css">-->








    

</head> 