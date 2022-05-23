<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    @include('components.admin_head')
    <style type="text/css">

    </style>
    <body class="hold-transition sidebar-mini skin-blue ">

        <div class="wrapper">
  <div class="loading hide">Loading&#8230;</div>
            <!-- <div class="se-pre-con"></div> -->
            <!-- Navbar -->
          
             <!--End sidebar -->
        <div class="main-panel" id="bbb">
           
            <div class="content">
                <div class="container-fluid "> 
                  <!-- <div id="result"></div> -->
                   <!--content -->
                    @yield('content')
                   <!--End content -->
                </div>
            </div>
            </div>
 

           
        </div>
        <!-- jQuery -->
        <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('adminlte/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap -->
        <script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('adminlte/plugins/knob/jquery.knob.js')}}"></script>
        <!-- InputMask -->
        <script src="{{asset('adminlte/plugins/input-mask/jquery.inputmask.js')}}"></script>
        <script src="{{asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
        <script src="{{asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('adminlte/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js')}}"></script>
        <!-- datepicker -->
        <!--<script src="{{asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>-->
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>-->

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

        <!-- Slimscroll -->
        <script src="{{asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <!-- iCheck 1.0.1 -->
        <script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('adminlte/plugins/fastclick/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
        <!-- Sweet Alert-->
        <script src="{{asset('sweetalert/sweetalert2.min.js')}}"></script>
        <!-- Fileinput js-->
        <script src="{{asset('js/fileinput.min.js')}}"></script>
        <!-- form validation-->
        <script src="{{ asset('js/jquery.validate.js')}}"></script>
        <!--<script src="{{asset('js/jquery.form_validation.js')}}"></script> -->
        <!-- custom js-->
        <script src="{{asset('js/jquery.custom.js')}}"></script>
        <script src="{{asset('js/colorpicker.js')}}"></script>
        <script>
            var site_path = '{{url("/")}}/Admin';
            var site_lang = '{{ \App::getLocale() }}';
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

             $('input').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });

        </script>

        @yield('pagescript')

    </body>
</html>
