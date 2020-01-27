<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>111</title>

    <link rel="stylesheet" href="{{URL::asset('/bootstrap/bootstrap.min.css')}}">
    <script src="{{URL::asset('/bootstrap/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/bootstrap/bootstrap.min.js')}}"></script>

    <style>
        .to, .subject {
            font-size: 16px;
            font-weight: bold;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="row text-right" style="border: 3px solid black; direction: rtl;">
        <div id="header" class="col-md-12" style="border-bottom: 2px solid black">هدر</div>
        <div id="body" class="col-md-12">
            <div class="to">
                به: {{ $to ?? '' }}
            </div>

            <div class="from">
                از: {{ $from ?? '' }}
            </div>

            <div class="subject">
                <span>موضوع: </span>
                <span>{{ $subject = 'استعلام' }}</span>
            </div>
            <br>

            <div class="text" style="font-size: 14px!important;">
                <p>
                    سلام علیکم،<br>
                    <span>با احترام خلاصه پرونده ناوی وظیفه: </span>
                    <span style="font-weight: bold;">{{$soldier->first_name . ' ' . $soldier->last_name}}</span>
                    <span> فرزند: </span>
                    <span style="font-weight: bold;">{{$soldier->father_name}}</span>
                    <span> با شماره شناسنامه: </span>
                    <span style="font-weight: bold;">{{ $soldier->national_code }}</span>
                    <span> به شرح زیر جهت اطلاع و اقدام لازم بحضورتان ارسال می گردد</span>
                </p>
            </div>

            <br>

            <h5 style="font-size:14px; font-weight: bold">
                <span>تاریخ شروع خدمت: </span>
                <span>{{ $soldier->martialInfo ? $soldier->martialInfo->start_date : '' }}</span>
            </h5>

            <h5>
                <span style="font-size:14px; font-weight: bold">مرخصی استتحقاقی استفاده شده: </span>
                <span>{{ $deservedLeaves }}</span>
                <span>روز</span>
            </h5>

            <h5>
                <span style="font-size:14px; font-weight: bold">مرخصی تشویقی استفاده شده: </span>
                <span>{{ $bonusLeaves }}</span>
                <span>روز</span>
            </h5>

            <h5>
                <span style="font-size:14px; font-weight: bold">مدت کسر خدمت: </span>
                <span>{{ $totalShortage }}</span>
                <span>روز</span>
            </h5>

            <h5>
                <span style="font-size:14px; font-weight: bold"> خلاء خدمت: </span>
                <span>{{ $totalVoids }}</span>
                <span>روز</span>
            </h5>

            <h5>
                <span style="font-size:14px; font-weight: bold"> خلاء خدمت: </span>
                <span>{{ $totalExtraDuties }}</span>
                <span>روز</span>
            <h5>

            <h5 style="font-size:14px; font-weight: bold">
                <span> تاریخ پایان خدمت: </span>
                <span>{{ $soldier->martialInfo ? $soldier->martialInfo->end_date : '' }}</span>
            <h5>
        </div>
    </div>
</div>
</body>
</html>

{{--<!----}}
<div class="body">
</div>
