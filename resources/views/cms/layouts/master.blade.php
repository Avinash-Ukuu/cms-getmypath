<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Get My Path | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
     <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
     <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/toastr/toastr.min.css') }}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @yield('headerLinks')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('cms.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
       @include('cms.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2026-2027 <a href="javascript:void(0)" target="_blank">Adminlte3</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('assets/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminlte/dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('assets/adminlte/dist/js/pages/dashboard.js') }}"></script>
     <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/adminlte/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    @yield('footerScript')
    <script>

        if ("{{ session()->has('success') }}") {
            let message = "{{ session()->get('success') }}";
            toastr.success(message);
        }

        if ("{{ session()->has('error') }}") {
            let message = "{{ session()->get('error') }}";
            toastr.error(message);
        }

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        function confirmBox(submitBtnTarget) {
            let result = confirm("Want to delete?");
            if (result) {
                $(submitBtnTarget).closest("form").submit();
            }

        }

        $(document).ready(function() {
            $('#summernote').summernote();

            $('.select2').select2({
                theme: "bootstrap4",
                allowClear: true
            });
        });
    </script>
</body>

</html>
