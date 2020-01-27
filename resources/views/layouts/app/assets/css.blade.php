<!--Main CSS-->

<!-- Bootstrap Core Css -->
<link href="{{URL::asset("/adminBSB/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
<link href="{{URL::asset("/adminBSB/plugins/sweetalert/sweetalert.css")}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{URL::asset("/adminBSB/plugins/node-waves/waves.min.css")}}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{URL::asset("/adminBSB/plugins/animate-css/animate.min.css")}}" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="{{URL::asset('adminBSB/plugins/waitme/waitMe.css')}}" rel="stylesheet" />


<!-- Morris Chart Css-->
<link href="{{URL::asset("/adminBSB/plugins/morrisjs/morris.css")}}" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="{{URL::asset("adminBSB/plugins/bootstrap-select/css/bootstrap-select.css")}}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{URL::asset("/adminBSB/css/style.css")}}" rel="stylesheet">
<link href="{{URL::asset("/adminBSB/css/rtl.css")}}" rel="stylesheet">

<!-- adminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{URL::asset("/adminBSB/css/themes/all-themes.min.css")}}" rel="stylesheet" />

<link href="{{URL::asset("/adminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet" />
<!-- JQuery DataTable Css -->



<style>
    ul.pagination li{
        float: right !important;
    }

    ul.pagination {
        margin: 0 !important;
        padding: 0 !important;
    }
</style>
<!-- Custom Additional CSS -->
@yield('css')