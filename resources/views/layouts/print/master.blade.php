<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    @include('layouts.print.assets.css')
</head>
<body>

<!--Main-->
<main >
    <table class="table table-striped text-center ">
        <thead>
        <tr>
            <th class="text-center">کارگزار</th>
            <th class="text-center">مشتری</th>
            <th class="text-center">مبلغ خرید</th>
            <th class="text-center"> مبلغ فروش</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center">متن تستی</td>
            <td class="text-center">متن تستی</td>
            <td class="text-center">متن تستی</td>
            <td class="text-center">متن تستی</td>
        </tr>
        </tbody>
    </table>
</main>
<!--/Main-->

@include('layouts.app.assets.js')
</body>
</html>