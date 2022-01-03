@include('inc.function')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>DAL Dashboard </title>
  <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
  <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('assets/js/loader.js')}}"></script>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->

  <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />


  <link href="{{asset('assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />

  <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin/table/datatable/dt-global_style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}">
  <!-- END PAGE LEVEL CUSTOM STYLES -->

  <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->


    @include('admin.layouts.navbar')



    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>



        @include('admin.layouts.sidebar')


        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">

           @yield('content')

        </div>
        <!--  END CONTENT PART  -->

    </div>
    @include('admin.layouts.status')

    <!-- END MAIN CONTAINER -->

    @include('admin.layouts.scripts')

</body>
</html>
