<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chandlee News Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/datatables.min.css') }}">
    <!-- Summernote Editor -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    {{-- <script src="{{ asset('backend/') }}/assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ asset('backend/') }}/assets/js/popper.min.js"></script>
     <link rel="stylesheet" href="{{ asset('backend/assets/css/summernote-bs4.min.css') }}"> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/') }}/assets/css/style.css">
    <!-- Toastr CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.min.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/') }}/assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link rel="shortcut icon" href="{{ asset('backend/') }}/assets/css/custom.css" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.body.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.body.header')
        <!-- partial -->
        <div class="main-panel">
            @section('admin')
            @show
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.body.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('backend/') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('backend/') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('backend/') }}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('backend/') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('backend/') }}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('backend/') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('backend/') }}/assets/js/misc.js"></script>
    <script src="{{ asset('backend/') }}/assets/js/settings.js"></script>
    <script src="{{ asset('backend/') }}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('backend/') }}/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <!-- Toastr JS -->
	<script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('message'))
         let type = "{{ Session::get('alert-type', 'info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

              case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/summernote-bs4.min.css') }}">
    <script src="{{ asset('backend/') }}/assets/js/summernote-bs4.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 200
        });
        $('#summernote1').summernote({
            height: 200
        });
        $('#summernote2').summernote({
            height: 100
        });
        $('#summernote3').summernote({
            height: 100
        });
    </script>

    <!-- Datatable -->
    <script src="{{ asset('backend/assets/js/datatables.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('backend/assets/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

  </body>
</html>
