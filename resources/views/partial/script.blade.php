<script src="{{ asset('patternscrmdesign/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<!-- toastr script  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script src="{{ asset('patternscrmdesign/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('patternscrmdesign/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('patternscrmdesign/assets/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->

<!--  Chartist Plugin  -->
<script src="{{ asset('patternscrmdesign/assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('patternscrmdesign/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('patternscrmdesign/assets/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('patternscrmdesign/assets/js/demo.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/pagination/input.js"></script>
 <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script>

	
//  New FUNCTIONALITY IMPLEMENTED FOR DELAYED ORDERS ON 21/06/18 BELOW

$(document).on("click", ".delayorderv", function(e){
  
        $("#ModalDelayed").modal('show');

        //$("#search").val($value);
        $("#table3 tbody").html('<h2>Please wait ... </h2>');
        $value = "" ;
    
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ URL::to('delayedordersv') }}",
            data: {"search": $value},
            success:function(data)
                  {
                    console.log(data);
                    $("#table3 tbody").html(data);
                  }
        
        });
 
});

$('.nav li .fa-caret-down').click(function(){
    $(this).parent().toggleClass('active');
    $(".sub-menu").toggle();
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