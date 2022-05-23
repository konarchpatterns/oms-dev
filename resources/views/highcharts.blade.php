@extends('layouts.dashboard_orders')

 
@section('style')

<style type="text/css">

  .modal {
    overflow-y: auto !important;
}
  
/*.modal-dialog{
    overflow-y: initial !important;
}
*/

.modal-body{
    max-height: calc(100vh - 200px) !important;
    overflow-y: auto  !important;
    /*background: #00bfa5 ;
    background:    #44703c   ; removed on 12/04/17  
    background: transparent !important ;  */
    scrollbar-face-color: #414340;
            scrollbar-shadow-color: #cccccc;
            scrollbar-highlight-color: #cccccc;
            scrollbar-3dlight-color: #cccccc;
            scrollbar-darkshadow-color: #cccccc;
            scrollbar-track-color: #cccccc;
            scrollbar-arrow-color: #000000;
}

/*  added above on  09/06/20 */

.ui-dialog .ui-dialog-titlebar-close {
  color: blue;
  background: white;
}


select.ostatus > option[value=""] {
    display: none;
}

label {
  font-weight: 600;
}

.form-control {
   font-weight: 600;
   font-size: 14px;

}

table#laraorder tbody tr {
        background: transparent; 
    }

table#laraorder tbody tr.selected {
    background-color: #e57373 !important;
    }


/*  css above added on  26/05/20 */

  .table>thead>tr>th
{
  text-transform: capitalize !important;
 
}

  .table>thead>tr>th>input
{
   box-sizing: border-box;
  /*border: 2px solid orange;*/
}

div.row1 {
  padding-top: 20px;
    height: 40px;
    vertical-align: middle;
}
/* css added above  on 15 */
  /* css added on 15/04/20 */
   
.fstat_1   {
   /*background: #00695c; */
   background:  #9c9391; 
   color: black;

  /* color: white !important; removed as background now white on 02/05/17 */
   text-align: center;
   /*border: 0px;  removed for paralled testing on 08/02/17
   padding: 0px !important;*/
           
  }

.btn-success {
  color: orange !important;
}

.quotecolor {
  background: #0a17ec !important;
  color: white;
}

.allotedcolor {
  background: black !important;
  color: white;
}

.revisioncolor {
    background: #FA7C7C !important;
    color: black !important;
}

.unapprovedcolor {
    background: #FFAC5C !important;
    color: black !important;
}

.complaincolor {
    background: #FF0000 !important;
    color: white !important;
}

.followupcolor {
   background:  #E5ff28 !important ;
   color:  black !important;
}

.onholdcolor {
    background: #A606C8 !important;
    color: white !important;
}

.cancelcolor {
    background: #C9303F !important;
    color: white !important;
}



.qcpendingcolor {
  background: #FA4193 !important;
  color: black !important;
}

.completedcolor {
  background: #41E329 !important;
  color: black !important;
}

.qcokcolor {
  background: #DED641 !important;
  color: black !important;
}


.requotecolor {
  background: #4bc2f9 !important;
  color: #0a17ec !important;
}

.noresponsecolor {
  background: #FFFE0B !important;
  color: black !important;
}

.approvedcolor {
  background: #00F0E1 !important ;
  color: black !important ;
}


.class_black {
   color: black !important;
}


.error {
   color: red;
}



#rev_mistake {
     height: 40px  !important;
     width: 200px !important;
}

.foo   {
   color: blue;
   background: #006064 !important;
}

/* superscript css */
sup {
    vertical-align: super;
    font-size: smaller;
    color: blue !important;
    padding-top: 5px;
    margin-left: -10px;
}
/* superscript css */

table.dataTable tbody th,
table.dataTable tbody td {
    white-space: nowrap;
}


   /* css added on 15/04/20 */

   /*    TABLE CSS  DONE ON 28-02-2020 */ 

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

/*body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em !important;
 }
*/


h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }



/*    TABLE CSS  DONE ON 28-02-2020 */

     /*  .table .thead-light th {
 
  color: #401500;
 
  background-color: #FFDDCC;
 
  border-color: #792700;
 
}

.container {
  padding-left: 15px !important;
  padding-right: 15px !important;
  width: 100% !important ;
} */

th.dt-center.fstat {
  text-align: center !important;
  padding-left: 20px !important;
}

td.fstat {
        font-style:italic;
        text-align: center; 
       /* background:#FFAF33;*/
    }

  .table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
   /* border-top: 0; */
       empty-cells: hide;
}  

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td  {
  /*line-height: 0.1px !important;*/
  padding: 0 !important;
  padding-top: 0 !important ;
  padding-bottom: 0 !important ; 
  padding-right: 0 !important;
   border-color:  blue !important;
}

table#laraorder td, th {
   position: relative;
  vertical-align: middle;
  text-align: center !important;
  overflow: hidden !important;
  text-overflow: ellipsis !important;
  clear: both;
  border-collapse: collapse;
    word-wrap: break-word;
   max-width: 200px ;
   height: 100% !important;
  white-space: nowrap ;  
 
 
  
}


    .dataTables_scroll{
    overflow:auto;
    position:relative;
} 
    /*  NEW CSS ON 11-05-20 to fix fixed column  alignment */

.dataTables_length>label {
  color: black;
}

.dataTables_length>label{
  color: black;
}

select.custom-select.custom-select-sm.form-control.form-control-sm
{
  color:black !important;
  height: calc(2.8125rem + 2px) !important;
}

td.editdtl {
   padding-top: 10px;
}

/*
 input[type=search] {
  width: 100%;
  height: 50%;
  padding: 12px 20px;
  margin: 8px 0;t
  box-sizing: border-box;
  border: 2px solid black;
}*/


div.dataTables_scroll{
   width: 100% !important;
}


.dataTables_length {
    padding-left: 50px !important;

}


 
div.DTFC_RightHeadBlocker {
 
   background-color: #e9ecef;
   
   }
   
/*  removed as  dashboard_orders included and main div container-fluid inserted
div.dtfc_scrollwrapper {
      margin-left: -30px;

}*/

div#laraorder_filter {
   margin-left: -10px !important;
   left: -10px;
}

td>span>ul
{
  padding-top: 10px !important;
}

input.acti {
  width: 0% !important;
  visibility: hidden;

}

/*input.orde, .bill, .file, .stat {
  width: 100px;
}*/

div.mycustom {
  position: relative;
  top: -10px;
  left: -10px;
  width: 100%;

}

.table>thead {
  height: 10% ;
}

.table>thead>tr>th.dt-center {
  float: center !important;
  text-align: center !important;
  
}


   </style> 

@endsection

@section('content')
<!-- below code added as glyph symbol not displayed -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

             
<body>
     

@if(isset($rights))
   
  

  @foreach ($rights as $key)
         
    <?php 
   
        $var[] = $key; 
      
    ?>
   

  @endforeach

@endif

<div class="content">
  
    <div class="container-fluid">
      
  <div class="card">
     <div class="card-body">
  <div class="row col-md-6 col-md-offset-4">
      <label for="month">Select Month: </label>
                    
                <input type="text" id="monthyear" name="monthyear" value='' class="monthPicker" />
                <input type="hidden" name="mont" class="mont" value="">
                <input type="hidden" name="myear" class="myear" value="">

                      <button onclick="piefilter()" >Press Enter</button>
                
              
  </div>

  <div class="row">
    <div class="col-md-6">
         <div  id="chartcontainer3" class="chartjvm2" style="width: 800px; height: 400px; margin: 0 auto">
                      
        </div>
    
     </div>
 
    <div class="col-md-6">
         <div  id="chartcontainer2" class="chartjvm1" style="width: 800px; height: 400px; margin: 0 auto">
                      
        </div>
    
     </div>
         

     <div class="col-md-6">
         <div  id="chartcontainer1" class="chartjvm" style="width: 800px; height: 400px; margin: 0 auto">
                      
        </div>
    
     </div>
     
  </div>
  
  </div>
</div>

  </div>
</div>

   
</body>
   

@endsection

@section('script')


 <link href= 
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'> 
      
   <!--  <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" > 
    </script> 
    -->   
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" > 
    </script> 

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>

<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
  $(function () {


  $(".monthPicker").datepicker({
                       dateFormat: 'MM yy',
                        changeMonth: true,
                          changeYear: true,
                         showButtonPanel: true,

                         onClose: function(dateText, inst) {
                                  var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                 var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                 //alert(month);
                                  $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
                                  $(".mont").val(month);
                                  $(".myear").val(year);
                        }
                    });

                $(".monthPicker").focus(function () {
                      $(".monthPicker").val('');
                      $(".ui-datepicker-calendar").hide();
                      $("#ui-datepicker-div").position({
                           my: "center top",
                            at: "center bottom",
                             of: $(this)
                       });  
                    });

  
  var json = {};
// added below from https://blueflame-software.com/stacked-column-chart-with-data-from-mysql-using-highcharts/

//alert('hello');

var options = {
chart: {
renderTo: 'chartcontainer2',
type: 'line',
marginRight: 130,
marginBottom: 25
},
title: {
text: 'Monthwise File Price',
x: -20 //center
},
subtitle: {
text: '',
x: -20
},
xAxis: {
categories: []
},
yAxis: {
title: {
text: 'File Price'
},
plotLines: [{
value: 0,
width: 1,
color: '#808080'
}]
},
tooltip: {
formatter: function() {
      return '&lt;b&gt;'+ this.series.name +'&lt;/b&gt;&lt;br/&gt;'+
          this.x +': '+ this.y;
}
},
legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'top',
x: -10,
y: 100,
borderWidth: 0
},
plotOptions: {
column: {
stacking: 'normal',
dataLabels: {
enabled: true,
color: (Highcharts.theme) || 'white'
}
}
},
series: [ ]
}

  
  options.series[0] =  {"name":"Vector", "data": {!! $orders2 !!} } ;
  options.series[1] =  {"name":"Digitizing", "data": {!! $orders3 !!} } ;
  options.series[2] =  {"name":"Photoshop", "data": {!! $orders4 !!} } ;

  var xAxis = {
      categories: {!! $orders1 !!}
   };
 
  options.xAxis = xAxis ;
  json.options = options;

        $(".chartjvm").highcharts(options);
        
    
  });


function piefilter() {

   var  mm =  $(".mont").val();
  //alert(P'click pie');


var options1 = {
        title: {
text: 'File Price Percentage'
},
  tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'Price: <b>{point.y}</b><br/>' +
            'File count: <b>{point.z}</b><br/>'
    },

  chart: {
            renderTo: 'chartcontainer3',
            type: 'variablepie'
        },
        series: [{   minPointSize: 10,
        innerSize: '40%',
        zMin: 100,
        zMax: 9000,
        name: 'File Type',
      }]
};

  


 
  var options = {
        title: {
text: 'Profit Comparision'
},
tooltip: {
formatter: function() {
return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
}
},
plotOptions: {
pie: {
allowPointSelect: true,
cursor: 'pointer',
dataLabels: {
enabled: true,
color: '#000000',
connectorColor: '#000000',
formatter: function() {
return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
}
}
}
},

        chart: {
            renderTo: 'chartcontainer2',
            type: 'pie'
        },
        series: [{}]
    };
    
    var allprice = [];
    var allprice1 = [];
    var url =  "http://omsv4.com/api/curr_mnth_piedata?month=" + mm;
    $.getJSON(url,  function(response) {
          //var  obj = response.data;
            console.log(response);
             
            if (response.error == 'no data') {
               $("#chartcontainer2").append("<h2> No Data </h2>");
               $("#chartcontainer3").append("<h2> No Data </h2>");
            }                 
            else {
            //    data.forEach(element => {
               allprice.push({ name: 'Vector', y: response.vect} );
               allprice.push({name: 'Digitizing', y: response.digi} );
               allprice.push({ name: 'Photoshop', y: response.photo });
          
                allprice1.push({ name: 'Vector',  y: response.vect , z: response.vectcount } );
               allprice1.push({name: 'Digitizing', y: response.digi, z: response.digicount });
               allprice1.push({ name: 'Photoshop', y: response.photo, z: response.photocount });
          
               options.series[0].data = allprice;
               options1.series[0].data = allprice1;
               var chart = new Highcharts.Chart(options);
               var chart1 = new Highcharts.Chart(options1);
           }
    });
}
  
 
</script>

@endsection

