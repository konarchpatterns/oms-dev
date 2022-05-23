@extends('layouts.appnew', ['activePage' => 'dashboard', 'title' => 'OMSV4', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
<style type="text/css">
   


.clock {
  position: absolute;
  
  border-radius: 50%;
  background: #eee;
  border: 0.2em solid #d0d0d0;
  box-shadow: 0 1.2em 0 -1em white, 0 -0.1em 0.3em 0 #fff, 0 0 0 0.6em #e7e7e7, 0 0.6em 1.2em 0 rgba(0, 0, 0, 0.5), inset 0 0.5em 1em 0 rgba(0, 0, 0, 0.3), inset 0 0 8em 0 rgba(0, 0, 0, 0.2);
}

.clock:before {
  display: block;
  content: "";
  position: absolute;
  background: #f1a432;
  z-index: -1;
  box-shadow: inset 0 -0.2em 0.2em 0 rgba(0, 0, 0, 0.2), inset 0 0.2em 2em 0 #fff;
}

.clock:after {
  display: block;
  content: "";
  position: absolute;
  height: inherit;
  width: inherit;
  background: transparent;
 
  box-shadow: inset 12em 14em 0 -10em rgba(255, 255, 255, 0.25);
  z-index: 4;
}
.clock .clock-hour {
  position: absolute;
 
 
  background: transparent;
  box-shadow: 0 -1em 0 -0.1em #383838, 0 1em 0 -0.1em #383838;
 
}


.clock-second {
  position: absolute;
 
  background: radial-gradient(ellipse at center, #ffd322 0%, #fbc900 100%);
  
  z-index: 3;
}

.clock-hour {
 
  box-shadow: inset 0 0 0 0.16em #303030, inset 0 -4.2em 0 0 #303030, -0.2em -0.2em 0.4em 0 rgba(0, 0, 0, 0.2);
}



</style>

    <div class="content">
        <div class="container-fluid">

        
        </div>
          
        <div id="app" class="container-fluid">
           <!-- removed on 09-09-20 by prashant as instructed of not looking good by kulind sir  <div  class="card">
             <div class="row">
                  <div class="col-sm-3"><h5> Indian Time</h5>
                       <Clock></Clock>
                  </div>
                    <div class="col-sm-3"> <h5>US Time</h5>
                       <USClock></USClock>
                  </div>
                   <div class="col-sm-3"> <h5>EST</h5>
                       <ESTClock></ESTClock>
                  </div>
                   <div class="col-sm-3"> <h5>Australia</h5>
                       <AUSClock></AUSClock>
                  </div>

                 
             </div>
        
        </div> -->
         
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                       
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Order Completed Status') }}</h4>
                            <p class="card-category">{{ __('For the Month of Mar-2020') }}</p>
                            
                       
                        </div>
                        <div class="card-body ">
                          <!--   <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Bounce') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Unsubscribe') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                            </div> -->
                            <chart-pie-component></chart-pie-component>
   
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Order Status') }}</h4>
                            <p class="card-category">{{ __('Current Year') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- <div id="chartHours" class="ct-chart"></div>
                         -->
                               <chart-area-component></chart-area-component>
   

                         </div>
                        <!-- <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row">
               <!--  <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2020 Orders') }}</h4>
                            <p class="card-category">{{ __('Vector, Digitizing, Photoshop') }}</p>
                        </div>
                        <div class="card-body ">
                            <div  class="ct-chart">
            
                                                    <chart-component></chart-component>
   

                            </div>
                        </div>
                    
                    </div>
                </div> -->
             <!--<div class="col-md-6"> 
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Tasks') }}</h4>
                            <p class="card-category">{{ __('Backend development') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Sign contract for "What are conference organizers afraid of?"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Lines From Great Russian Literature? Or E-mails From My Boss?') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Create 4 Invisible User Experiences you Never Knew About') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Read "Following makes Medium better"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Unfollow 5 enemies from twitter') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
          -->
		  </div>
        </div>
    </div>
@endsection

@push('js')

 <link href= 
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'> 
      
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" > 
    </script> 
      
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" > 
    </script> 

    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js

//alert('hello');

            demo.initDashboardPageCharts();

            demo.showNotification();

        });

        $(window).resize(function() {
                 window_width = $(window).width();

                $sidebar_wrapper = $('.sidebar-wrapper');

                if ($(window).width() <= 991) {
                         $sidebar_wrapper.find('.navbar-form').remove();
            $sidebar_wrapper.find('.nav-mobile-menu').remove();




                        }
        });

    </script>

      <script type="text/javascript">
        $(document).ready(function()    
            {   
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
                      $(".ui-datepicker-calendar").hide();
                      $("#ui-datepicker-div").position({
                           my: "center top",
                            at: "center bottom",
                             of: $(this)
                       });  
                    });
            });
</script>
@endpush