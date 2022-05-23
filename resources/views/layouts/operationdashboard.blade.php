 <!-- 
 =========================================================
 Light Bootstrap Dashboard PRO - v2.0.1
 =========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard-pro
 Copyright 2019 Creative Tim (https://www.creative-tim.com)

 Coded by Creative Tim

 =========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 19 Jun 2020 17:07:40 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('patternscrmdesign/assets/img/rsz_2logo125_opt.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('patternscrmdesign/assets/img/rsz_2logo125_opt.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Patterns</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Canonical SEO -->

    <!--  Social tags      -->
  
    <!-- Open Graph data -->
   
    <!--     Fonts and icons     -->
   
    
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/css/light-bootstrap-dashboard790f.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Tag Manager -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" >
   <!--  toastr css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <link href="{{ asset('assets/choice.css') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css"> 
    <!-- End Google Tag Manager -->
  
      @php
         
         $d=\App\User::select('color','ext')->where('id',Auth::user()->id)->get() ;
         $sidecolor="";
         $temcolor="hh";
      
           foreach($d as $v){
              $sidecolor=$v->color;
              $sidebarm=$v->ext;
       }
       if($sidecolor == "black"){
           $temcolor='black';
       }
       elseif($sidecolor == "azure"){
            $temcolor="#23CCEF";
       }
       elseif($sidecolor == "green"){
             $temcolor='green';
       }
       elseif($sidecolor == "orange"){
              $temcolor='orange';
       }
       elseif($sidecolor == "red"){
              $temcolor='red';
       }
       else{
              $temcolor='purple';
       }
     
        @endphp
    <style type="text/css">
        .rightdiv{
    float: right;
  }

.temcolor1{
    border-color: {{$temcolor}};

}
.buttonnav{
    background-color: {{$temcolor}};
}
table#dashboardtab  td{
  color: black;
  text-align: center;
  border:1px {{$temcolor}} solid;
  border-right: none;
  border-left: none;
 
}
table#roles th {

  text-align: center;
 /* border: 1px solid {{$temcolor}};*/


}
table#roles  td{
    text-align: center;
    border: 1px solid {{$temcolor}};

  
}
  .form-control2 {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
    color: #565656;
     padding: 3px 0px 3px 3px;
    height:70px;

    -webkit-box-shadow: none;
    box-shadow: none;
}
   @media (max-width:700px){
    
         .form-control3 {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
    color: #565656;
    padding: 3px 0px 3px 3px;
  
    -webkit-box-shadow: none;
    box-shadow: none;
}

    }
    @media (min-width:1000px){
        .form-control3 {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
    color: #565656;
    padding: 3px 0px 3px 3px;
    width: 120%;
    -webkit-box-shadow: none;
    box-shadow: none;
}
    }
    @media (max-width:700px){
    
         .form-control4 {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
    color: #565656;
    padding: 3px 0px 3px 3px;
  
    -webkit-box-shadow: none;
    box-shadow: none;
}

    }
    @media (min-width:1000px){
        .form-control4 {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
    color: #565656;
    padding: 3px 0px 3px 3px;
    width: 100%;
    -webkit-box-shadow: none;
    box-shadow: none;
}
    }
    .main-panel {
                background: none;
    
    }
   .bodycolorclass{

        background: rgba(203, 203, 210, 0.15);

    }
     .fixed-plugin {
        width:40px;
        top:120px;
     }
     .bg-mean-fruit{background-image:linear-gradient(120deg, #fccb90 0%, #d57eeb 100%) !important}
.bg-malibu-beach{background-image:linear-gradient(to right, #4facfe 0%, #00f2fe 100%) !important}
.bg-happy-green{background-image:linear-gradient(to bottom, #00b09b, #96c93d) !important}
.bg-arielle-smile{background-image:radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%) !important}

table.dataTable thead .sorting {
     background-image: none;
}
table.dataTable thead .sorting_desc {
     background-image: none;
}
     .ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
  border-radius:1%;
  height: 25px;
    width:35px;
}
.sidebar .logo a.logo-mini {
    float: left;
    width: 46px;
    text-align: center;
    margin-left: 20px;
    margin-right: 5px;
    position: relative;
}
.sidebar .logo .simple-text {
    text-transform: initial;
    padding: 5px 0px;
    display: inline-block;
    font-size: 1.125rem;
    font-weight: 400;
    line-height: 30px;
    white-space: nowrap;
    color: #FFFFFF;
  /*  overflow: hidden;*/
}
    </style>
      @yield('style')
    </head>

    <body class="bodycolorclass {{$sidebarm}}">
        
      
      <!-- Google Tag Manager (noscript) -->
 
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        <div class="sidebar" data-color="{{$sidecolor}}" data-image="{{asset('assets/img/sidebar-2.jpg')}}" >
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                     <a href="#" class="simple-text logo-mini">
                        <img src="{{asset('patternscrmdesign/assets/img/logo-dark.png')}}">
                    </a>
                    <a href="#" class="simple-text logo-normal">
                        Patterns
                    </a>
                </div>
                <div class="user">
                    <div class="photo">
                        <img src="" />
                    </div>
                    <div class="info ">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span style="text-transform: capitalize;">{{Auth::user()->name}}
                            <b class="caret"></b>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a class="profile-dropdown" href="{{route('user.showprofile')}}">
                                        <span class="sidebar-mini">CP</span>
                                        <span class="sidebar-normal">Change Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    
                @permission('show.virtual.assistant')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('workseat.viewworkseat')}}">
                            <i class="fa fa-user"></i>
                            <p>
                                Virtual Assistant
                             
                            </p>
                        </a>
                    </li>
                @endpermission
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg temcolor1">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebarcos" class="btn btn-round btn-icon d-none d-lg-block" style="background-color: {{$temcolor}}">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                   
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation ">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                       
                        <ul class="navbar-nav">
                      
                         
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fa fa fa-list-ul" style="font-size:20px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                     <a class="dropdown-item" href="#">
                                        <i class="fa fa-envelope-o" style="font-size:15px"></i>  Messages
                                    </a>
                                     <a  class="dropdown-item" href="{{ route('logout') }}"
                                       id="logoutsession">
                                        <i class="fa fa-power-off" style="font-size:15px"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf

                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
           
                <div class="container-fluid">
                  
                 
                                    @yield('content')     
                                         
                </div>
                                   
                                    <!-- <footer class="footer">
                                        <div class="container">
                                            <nav>
                                                <ul class="footer-menu">
                                                    <li>
                                                        <a href="#">
                                                            Home
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Company
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Portfolio
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Blog
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p class="copyright text-center">
                                                    ©
                                                    <script>
                                                        document.write(new Date().getFullYear())
                                                    </script>
                                                    <a href="">Creative Tim</a>, made with love for a better web
                                                </p>
                                            </nav>
                                        </div>
                                    </footer> -->
                                </div>
                            </div>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="fa fa-cog fa-1x"> </i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header-title"> Sidebar Style</li>
                                        <li class="adjustments-line">
                                            <a href="javascript:void(0)" class="switch-trigger">
                                                <p>Background Image</p>
                                                <label class="switch-image">
                                                    <input type="checkbox" data-toggle="switch" checked="" data-on-color="info" data-off-color="info">
                                                    <span class="toggle"></span>
                                                </label>
                                                <div class="clearfix"></div>
                                            </a>
                                        </li>
                                       
                                 
                                        <li class="adjustments-line">
                                            <a href="javascript:void(0)" class="switch-trigger background-color">
                                                <p>Filters</p>
                                                <div class="pull-right">
                                                    <span class="badge filter badge-black" data-color="black"></span>
                                                    <span class="badge filter badge-azure" data-color="azure"></span>
                                                    <span class="badge filter badge-green" data-color="green"></span>
                                                    <span class="badge filter badge-orange active" data-color="orange"></span>
                                                    <span class="badge filter badge-red" data-color="red"></span>
                                                    <span class="badge filter badge-purple" data-color="purple"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </a>
                                        </li>
                                        <li class="header-title">Sidebar Images</li>
                                        <li class="active">
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="{{asset('assets/img/sidebar-1.jpg')}}" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="{{asset('assets/img/sidebar-3.jpg')}}" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="{{asset('assets/img/sidebar-4.jpg')}}" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                                <img src="{{asset('assets/img/sidebar-5.jpg')}}" alt="" />
                                            </a>
                                        </li>   
                                    </ul>
                                </div>
                            </div>
                          
</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->

<!--  Chartist Plugin  -->
<script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!--  Share Plugin -->
<script src="{{asset('assets/js/plugins/jquery.sharrre.js')}}"></script>
<!--  jVector Map  -->
<script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->

<!--  DatetimePicker   -->
<!-- <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<!--  Sweet Alert  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{asset('assets/js/plugins/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<!-- <script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script> -->
<!--  jQueryValidate  -->
<script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/plugins/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/pagination/input.js"></script>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/light-bootstrap-dashboard790f.js')}}" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="{{asset('assets/choice.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#minimizeSidebarcos").on('click',function(){
        
         if ($("body").hasClass("sidebar-mini")){
                   $("body").removeClass("sidebar-mini");    
         }
         else{
                $("body").addClass("sidebar-mini");
         }
             $.ajax({
             type:"GET",
             url:'{{url('maxminsidebar')}}',
             success:function(data){
            
                 
            }
          });
        });

    $(".badge").on('click',function () {
        var new_color1= $(this).data('color');

    if(new_color1 == "azure"){

       $('.temcolor1').css('border-color','#23CCEF');
       $('#minimizeSidebarcos').css('background-color','#23CCEF');
       $('#roles th').css('border','1px solid #23CCEF');
       $('#roles td').css('border','1px solid #23CCEF');

    }
    else{
      $('.temcolor1').css('border-color',new_color1);
      $('#minimizeSidebarcos').css('background-color',new_color1);
       $('#roles th').css('border','1px solid '+new_color1+'');
       $('#roles td').css('border','1px solid '+new_color1+'');
    }
        $.ajax({
            type:"GET",
            url:'{{url('setcolortheme')}}',
            data: {new_color:new_color1},
            success:function(data){
                 
                 
            }
          });
    });
   
        


    });
</script>
<!-- Facebook Pixel Code Don't Delete -->
 @yield('script')


</html>
