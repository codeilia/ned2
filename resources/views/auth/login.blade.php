<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ورود به پنل مدیریت</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{URL::asset('admin-dashboard/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{URL::asset('admin-dashboard/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{URL::asset('admin-dashboard/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{URL::asset('admin-dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-dashboard/css/rtl.css')}}" rel="stylesheet">
</head>

<body class="login-page">
@if (session('error'))
    <div class="alert alert-success text-center">
        {{ session('error') }}
    </div>
@endif
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">علی<b>بابا</b></a>
        <small>سامانه مدیریت فروش شرکت علی بابا</small>
    </div>
    <div class="card">
        <div class="body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="msg">مشخصات خود را وارد کنید</div>
                <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                        <input type="text" class="form-control" name="username" placeholder="ایمیل" required autofocus>
                    </div>
                </div>
                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <input type="password" class="form-control" name="password" placeholder="رمز عبور" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5" dir="rtl">
                        <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme"> مرا به خاطر بسپار </label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">ورود</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6 align-right">
                        <a href="{{ route('password.request') }}"> فراموشی رمز عبور </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{URL::asset('admin-dashboard/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{URL::asset('admin-dashboard/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{URL::asset('admin-dashboard/plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{URL::asset('admin-dashboard/plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{URL::asset('admin-dashboard/js/admin.js')}}"></script>
<script src="{{URL::asset('admin-dashboard/js/pages/examples/sign-in.js')}}"></script>
</body>

</html>
