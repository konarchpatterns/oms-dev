<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('patternscrmdesign/assets/img/rsz_2logo125_opt.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('patternscrmdesign/assets/img/rsz_2logo125_opt.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Patterns CRM</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> -->
    <!-- CSS Files -->
	 <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">-->
	 
    
    <link href="{{ asset('patternscrmdesign/assets/css/bootstrap.min.css') }}" rel="stylesheet" /> 
    
    <link href="{{ asset('patternscrmdesign/assets/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css"> 
   <!--  toastr css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->

  <link href="{{ asset('patternscrmdesign/assets/css/demo.css')}}" rel="stylesheet" />
	
	  <link rel="stylesheet"  href="{{ asset('css/bootstrap4.css') }}"  type="text/css" href=""> 
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
  
   <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" >

   <link rel="stylesheet"  href="{{ asset('css/test.css') }}"  type="text/css" href=""> 
   
    
  
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style type="text/css">


p {
  color: white !important;
}

.sub-menu li.sub-sidebar-brand
{
  display: none;
  float: right;
  display: inline-block;
  padding-left: 40px;
  
}

li {
  list-style: none;
}

ul.sub-menu { display:none;  list-style:none;}


.nav li.active ul.sub-menu { display:block; }

.fa-caret-down {
  float: right;
  /*padding-right: 8px;*/
}



/* added code above on 090620 */


.a,
body>.navbar-collapse {
   
    width: 60px;---------imp
   
}
.a.sidebar .nav li .nav-link{
  margin: 5px 0px;
}
.tooltip-inner {
    max-width: 200px;
    padding: 3px 8px;
    color: black;
    font-weight: bold;
    text-align: center;
    background-color:#549087;
    border-radius: .25rem;
}
/*.tooltip.bs-tooltip-auto[x-placement^=top] .arrow::before, .tooltip.bs-tooltip-top .arrow::before {
    margin-left: -3px;
    content: "";
    border-width: 5px 5px 0;
    border-top-color: #549087;
}
.tooltip.bs-tooltip-auto[x-placement^=left] .arrow::before, .tooltip.bs-tooltip-left .arrow::before {
    right: 0;
    margin-top: -3px;
    content: "";
    border-width: 5px 0 5px 5px;
    border-left-color: #549087;
}*/
.b{
  
  width: calc(100% - 61px);
}
.cc{
  display: none;
}
.dd{
   display: none;
}
.logo1{
  margin: 10px 10px;
   border-bottom: 1px solid rgba(255, 255, 255, 0.2);
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
.form-control3 {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 1px;
    color: #565656;
     padding: 3px 0px 3px 3px;
    height:30px;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.btnback {
  background-color:#4fc1db;
  border: none;
  color: white;
  padding: 7px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 0px 0px;
  cursor: pointer;
  border-radius: 10px;
}
  input[type=text],input[type=email]{
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
/*  height: 30px;*/
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #DDDDDD;
}

/* select.form-control{
   max-height: 30px;
 }*/
input[type=text]:focus, input[type=email]:focus,textarea:focus {
  box-shadow: 0 0 10px rgba(232, 126, 4, 1);
  padding: 3px 0px 3px 3px;
 /* margin: 5px 1px 3px 0px;*/
  border: 1px solid rgba(232, 126, 4, 1);
}

/*
table.dataTable thead th {
  background-color:#565759;
   text-align-last: center;
    color: white;
}

  .dataTables_filter > label{
    color: white;
  }
   
  .dataTables_length > label{
    color: white;
  }
table.dataTable td  {
  border: 1px solid #ddd;
  padding: 8px;
}*/



/*
h5{
color: white;

}

.card{
  background-color:  #565759;
  border-color: white;

}

.ts{
 text-shadow: 1px 2px 5px black;
}

.card label{
color: white;
 font-size: 13px;
     margin-bottom: 0px;

    
  text-transform: capitalize;
      
}
/*

 .jumbotron {
 
     padding: 1px 1px 1px 1px;
     background-color: #565759;
 
}*/

.rightdiv{
    float: right;
  }
#more {display: none;}
/*notification css*/
.unreadnoti{
 background-color: #FFE4AE;font-size: 13px; word-wrap: break-all;color: black; text-align: justify;padding-top: 04px;padding-bottom: 04px;padding-left: 07px;padding-right: 07px;border-top: 2px solid #9FA296;font-weight: 500;
 
}
.readnoti{
 background-color: white;font-size: 13px; word-wrap: break-all;color:black; text-align: justify;padding-top: 04px;padding-bottom: 04px;padding-left: 07px;padding-right: 07px;border-top: 2px solid #9FA296;font-weight: 500;
}

/* added extra css on 08-05-20*/
/*select, input[type="text"]{
      width:100%;
      box-sizing:border-box;
    }
*/

</style>
    @yield('style')
</head>

<body>
    <div class="wrapper">
        <!--sidebar -->
         @include('partial.sidebar')
             <!--End sidebar -->
        <div class="main-panel" id="bbb">
           
             @include('partial.navbar')
           
            <!--<div class="content">
                <div class="container-fluid "> 
                   <div id="result"></div> -->
                   <!--content -->
                    @yield('content')
                   <!--End content 
                  </div>
                  </div>
			     </div>-->
        </div>
</body>
<!--   Core JS Files   -->

 @include('partial.script')
 <script type="text/javascript">
  

$(document).ready(function () {
 //set unreadnotification value  
  $("#notificationvalue").text({{Auth::user()->unreadNotifications->count()}});
 //stop to prevent dropdownbox click on notification  
  jQuery('.stopdropdownclose').on('click', function (e) {
      e.stopPropagation();
  });
  //click on notification take notification id so mark as read
  $(".ddddd").on('click',function(){
  var id=this.id;
  var obj=$(this);
   $.ajax({
                type: "post",
                url: "{{route('read.readnotificationmessage')}}",
                data: {
                             "_token": "{{ csrf_token() }}",
                             "notificationid":id,
                       },
                 
                 success: function(data){  

                   $(obj).removeClass('unreadnoti');
                   $(obj).removeClass('ddddd');
                   $(obj).addClass("readnoti");
                   if(data == 0){

                      $("#notificationvalue").remove()
                   }
                   else{

                      $("#notificationvalue").text(data);
                   }

                 },
  });

});
//this ajax run and if any task for user it shows task of user
        $.ajax({
                type: "post",
                url: "{{route('show.notificationmessage')}}",
                data: {
                             "_token": "{{ csrf_token() }}",
                             "userid":{{auth()->user()->id}},
                       },
                 
                 success: function(data){  
                  var data2=data.min-300;
                  data1 = data2*1000;
                  var datamin=-30000;
                  var datamax=-1;
                  var data9 = -29999;
                  if(data1 > datamin  && data1 < datamax){
                     var myVar = setInterval(myTimer ,data1);    
                     function myTimer() {       
                       swal({
                               title:"One "+data.type+" for you.",
                               text: "Title : "+data.title+".",
                               icon: "info",
                               buttons: true,                       
                       })
                       clearInterval(myVar);
                     }
                  }
                 },
                   
        });



  // var sidebarvalue = localStorage.getItem("lastname");
  // if(sidebarvalue == "min"){
  // $(' #aaa ').addClass('a');
  //         $(' #bbb ').addClass('b');
  //         $('#largesidebar').removeClass('cc');
  //         $('#changesidebar').addClass('cc');
  //          $('#logocahange').removeClass('logo');
  //         $('#logocahange').addClass('logo1');
  //   }
  //  else{
  //  $(' #aaa ').removeClass('a');
  //          $(' #bbb ').removeClass('b');  
  //           $('#largesidebar').addClass('cc');
  //         $('#changesidebar').removeClass('cc');  
  //          $('#logocahange').addClass('logo');
  //         $('#logocahange').removeClass('logo1');
  //  }

     
      $('#changesidebar').click(function() {
          $(' #aaa ').addClass('a');
          $(' #bbb ').addClass('b');
          $('#largesidebar').removeClass('cc');
          $('#changesidebar').addClass('cc');
           $('#logocahange').removeClass('logo');
          $('#logocahange').addClass('logo1');

        localStorage.setItem("lastname", "min");

      });
      $('#largesidebar').click(function() {
          $(' #aaa ').removeClass('a');
           $(' #bbb ').removeClass('b');  
            $('#largesidebar').addClass('cc');
          $('#changesidebar').removeClass('cc');  
           $('#logocahange').addClass('logo');
          $('#logocahange').removeClass('logo1');
        localStorage.setItem("lastname", "max");
      });
});

</script>
 @yield('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</html>
