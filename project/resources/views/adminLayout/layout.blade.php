<!DOCTYPE html>
<html lang="en">


<head>
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>ScoutiN | {{ Auth::user()->checkRole() }} </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}" />
    <link href="{{ asset('admin/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    {{-- swite --}}
    <link href="{{ asset('admin/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('admin/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="{{ asset('website/css/toastr.css') }}">
  <link href="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <link href="{{asset('admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

  <!---service---->

    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/forms/switches.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/editors/markdown/simplemde.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('admin/assets/css/components/custom-list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{asset('admin/plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/font-icons/fontawesome/css/fontawesome.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">



    <style>
      .create-coupen .rounded-pills-icon .nav-pills .nav-link.active, .rounded-pills-icon .nav-pills .show>.nav-link {
    box-shadow: 0px 5px 15px 0px rgb(0 0 0 / 30%);
    background-color: #009688;
}

 .create-coupen  .nav-pills .nav-link.active,  .create-coupen  .nav-pills .show>.nav-link {
    
       color: #fff !important;
    box-shadow: inset 0px 0px 0px 3px white;
    border: 2px solid #131e09;
}


 .create-coupen  .nav-pills .nav-link {
    color: #fff !important;
    border: 3px solid #fff;
     border-radius: .25rem;
    width: 150px;
    height: 130px;
    padding: 30px;
  
}

 .create-coupen  .nav-pills .nav-link h5 {
    color: #fff !important;
  
  
}


.note-toolbar {
   border-bottom: 1px solid #d6d6d6;
}

.note-toolbar .btn{
    box-shadow: none !important;
}
</style>
<!--end service-->
</head>

<body>

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    @include('adminLayout.navbar')

    <!-- page content -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        @include('adminLayout.sidebar')
        @yield('content')


        @include('adminLayout.footer')

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('website/js/toastr.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
    <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/plugins/highlight/highlight.pack.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard/dash_1.js') }}"></script>
    <!-- <script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script> -->
    <!--<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>-->
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script src="{{ asset('admin/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
    @include('adminPanel.alert.view')



 @yield('page-js')

    @include('adminLayout.script')

   

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session()->has('message'))

        <script>
            $(document).ready(function() {
                // alert("{{ session('message') }}");
                Swal.fire("{{ session('message') }}")
            });
        </script>

    @endif
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 09:29:27 GMT -->

</html>