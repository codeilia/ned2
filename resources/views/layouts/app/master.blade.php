<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    {{--<!-- Google Fonts -->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">--}}

    @include('layouts.app.assets.css')
</head>
<body class="theme-red">
    @include('layouts.app.partials.header')
    @include('layouts.app.partials.side')

    <!--Main-->
    <main >
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>@yield('content-heading')</h2>
                </div>

                @yield('content')

            </div>
        </section>
    </main>
    <!--/Main-->

    @include('layouts.app.assets.js')
</body>
</html>