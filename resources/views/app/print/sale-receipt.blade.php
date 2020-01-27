<!doctype html>
<html lang="en">
<head>

    <style>
        @CHARSET "UTF-8";

        body {
            font-family: 'useKashida';
        }

        /*Invoice StyleSheet(css 3)*/
        body{
            font:12px tahoma;
        }
        a,a:visited{text-decoration:none;color:#ff0000;}
        a:hover{text-decoration:underline;color:#5b3535;}
        input{font:12px tahoma;}
        .mwh_mainwrapper{
            font:12px tahoma;
            direction:rtl;
            text-align:right;
            width:800px;
            margin: 0px auto;
            border:1px solid #cdcdcd;
            line-height:19px;
            padding: 0px 0px 10px 0px;
        }
        img{border:0px;}
        .mwh_secondwrapper{margin: 0px auto;}
        table{margin: 0px auto;}
        td{
            vertical-align:top;
        }
        .mwh_mainwrapper .mwh_sep1{
            width:100%;
            height:1px;
            background:#cdcdcd;
            margin-bottom:5px;
            margin-top:-5px;
        }
        div.error{
            background: #f58c8c url('../images/alert.png') no-repeat 258px 5px;
            padding: 8px 28px 8px 8px;
            font:bold 11px tahoma;
            color:#b92e2e;
            width: 250px;
            margin: 5px 5px;
            border-radius: 3px;
            border:1px #8b2015 solid;
        }


        table.mwh_box1{
            background:#ffffff;
            margin:0px auto;
            border-collapse:collapse;

        }
        table.mwh_box1 th.theader, .theader{
            background:#f1f1f1;
            color:#000000;
            font:bold 12px tahoma;
            /*padding:9px 2px 6px 3px;*/
            text-align:center;
            font-family:tahoma;
            height:25px;
            border:1px solid #c8c8c8;
        }
        table.mwh_box1 td.tbody{
            padding: 5px 5px;
            vertical-align:top;
            width:281px;

            border:1px solid #c8c8c8;
            border-top:0px;
        }
        table.mwh_box1 td a,a:visited{
            text-decoration:none;
            color:#5f0909;
        }
        table.mwh_box2{
            background:#ffffff;
            direction:rtl;
            text-align:right;
            width:100%;
            border:1px solid #c8c8c8;
            border-collapse:separate;
            border-spacing: 5px 5px;
        }
        table.mwh_box2 td{
            padding: 5px 5px;
            text-align:center;


        }
        table.mwh_box3{
            background:#ffffff;
            /*margin: 0px auto;*/
            border-collapse:collapse;
            border:1px solid #c8c8c8;
        }
        table.mwh_box3 th.theader{
            background:#f1f1f1;
            color:#000000;
            font:bold 12px tahoma;
            /*padding:9px 2px 6px 3px;*/
            text-align:center;
            font-family:tahoma;
            height:25px;
            border-left:1px solid #c8c8c8;
            border-bottom:1px solid #c8c8c8;

        }
        table.mwh_box3 td{
            vertical-align:middle;
            border-left:1px solid #c8c8c8;
            border-bottom:1px solid #c8c8c8;
            padding: 2px  5px;

        }
        table.mwh_box4{
            background:#ffffff;
            /*margin:0px 3px 0px 0px;*/
            border-collapse:collapse;
            border:1px solid #c8c8c8;
        }
        table.mwh_box4 th{
            background:#ffffff;
            color:#000000;
            font:bold 12px tahoma;
            /*padding:9px 2px 6px 3px;*/
            text-align:center;
            font-family:tahoma;
            height:25px;
            border-left:1px solid #c8c8c8;
            border-bottom:1px solid #c8c8c8;
            padding: 0px 2px;

        }
        table.mwh_box4 td{
            vertical-align:middle;
            border-left:1px solid #c8c8c8;
            border-bottom:1px solid #c8c8c8;


        }
        .mwh_sep2{
            background:#f2f2f2;
            height:1px;
            width:100%;
        }
        #more_dialog{
            font: 12px tahoma;
            text-align:right;
            direction:rtl;
        }
        .unpaid {
            font-size: 13px;
            color: #FF0000;
            font-weight: bold;
        }
        .paid {
            font-size: 13px;
            color: #779500;
            font-weight: bold;
        }

        .refunded {
            font-size: 13px;
            color: #224488;
            font-weight: bold;
        }

        .cancelled {
            font-size: 13px;
            color: #5f5f5f;
            font-weight: bold;
        }

        .collections {
            font-size: 13px;
            color: #ffcc00;
            font-weight: bold;
        }

        .creditbox {
            border: 1px dashed #cc0000;
            font-weight: bold;
            background-color: #FBEEEB;
            text-align: center;
            width: 550px;
            padding: 10px;
            color: #cc0000;
            margin-left: auto;
            margin-right: auto;
            text-align:right;
            font-size:12px;
        }


        .header, .header .logo {
            /*position: absolute;*/
        }

        .header .logo {
            position: absolute;
            top: 150px;
        }

        .logo__slogan {
            display: block;
            font-size: .85em;
            font-weight:bold;
            font-weight: 400;
            color: #000000;
            margin-top: -25px;
            margin-right: 92px;
        }



        .header-background {
            background: rgba(255,255,255,.3);
            height: 200px;
            width: 800px;
            position: absolute;
            display: block;
        }

        #textName, #textFatherName, #textBirthday, #textJob, #textAddress, #textPhoneNumber, #textPostCode, #textPassengerCount {
            font-weight: bold;
            /*text-decoration: underline;*/
        }
    </style>

    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

</head>
<body>
<div id="content" class="mwh_mainwrapper">
    <div class="header">
        <div class="header-background"></div>
        <div class="header-banner">
            <img src="/images/alibaba-hero-banner.jpg" width="800" height="200">
        </div>
        <div class="logo">
            <img src="/images/alibaba-logo.svg" width="100" height="50">
            <img src="/images/alibaba-logo-type.svg" style="padding-bottom: 25px; margin-right: -15px; color: #ffffff;">
            <h1 class="hidden-xs  hidden-sm logo__slogan">خرید
                <span>اینترنتی</span>
                بلیط هواپیما و قطار
            </h1>
        </div>
    </div>

    <div class="mwh_sep1"></div>
    <div class="mwh_secondwrapper">
        <table>
            <tbody>
            <tr>
                <td>
                    <table class="mwh_box2" style="border: 0;">
                        <tbody>
                        <tr>
                            <td>
                                <b>
                                    <span>قرارداد فروش</span>
                                    <span>
                                        @if($sale->salable_type === 'airplaneTicket')
                                            {{ 'بلیط هواپیما' }}
                                        @endif

                                        @if($sale->salable_type === 'trainTicket')
                                            {{ 'بلیط قطار' }}
                                        @endif

                                        @if($sale->salable_type === 'package')
                                            {{ 'تور پکیج آژانس های همکار' }}
                                        @endif

                                        @if($sale->salable_type === 'visaService')
                                            {{ 'خدمات ویزا' }}
                                        @endif

                                        @if($sale->salable_type === 'passengerInsurance')
                                            {{ 'خدمات بیمه مسافار' }}
                                        @endif

                                        @if($sale->salable_type === 'pickup')
                                            {{ 'پیکاپ' }}
                                        @endif

                                        @if($sale->salable_type === 'hotel')
                                            {{ 'رزرو هتل' }}
                                        @endif

                                        @if($sale->salable_type === 'translation')
                                            {{ 'ترجمه' }}
                                        @endif

                                            @if($sale->salable_type === 'transfer')
                                                {{ 'ترانسفر در اختیار' }}
                                            @endif
                                    </span>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left">
                                <p style="font-size: 10px">
                                    <span>شماره قرارداد: </span>
                                    <span>{{ $sale->contract->id }}</span>
                                </p>
                                <p style="font-size: 10px">
                                    <span>تاریخ قرارداد: </span>
                                    <span>&#65279;{{ '(' . CustomDateTime::toJalali($sale->contract->document_date) . ')'}}</span>
                                    <span>&#65279; {{ $sale->contract->document_date }} </span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="text-align: justify;">
                                    <span>این قرار داد بین آقا/خانم </span>
                                    <span id="textName">
                                        @if(! isset($sale->customer->first_name))
                                            {{ '______' }}
                                            @else
                                        <span>{{ $sale->customer->first_name . ' '}}</span>
                                        @endif

                                        @if(! isset($sale->customer->last_name))
                                            {{ '______' }}
                                        @else
                                            <span>{{ $sale->customer->last_name}}</span>
                                        @endif
                                    </span>

                                    <span >فرزند </span>
                                    <span id="textFatherName">
                                        @if(! isset($sale->customer->father_name))
                                            {{ '______' }}
                                             @else
                                            <span>{{ $sale->customer->father_name }}</span>
                                        @endif
                                    </span>

                                    <span>متولد </span>
                                    <span id="textBirthday">
                                        @if(! isset($sale->customer->birthday))
                                            {{ '______' }}
                                             @else
                                            <span>{{ CustomDateTime::toJalali($sale->customer->birthday) }}</span>
                                        @endif
                                    </span>

                                    <span> شغل </span>
                                    <span id="textJob">
                                        @if(! isset($sale->customer->job))
                                            {{ '______' }}
                                        @else
                                            <span>{{ $sale->customer->job }}</span>
                                        @endif
                                    </span>

                                    <span>شماره تماس </span>
                                    <span id="textPhoneNumber">
                                        @if(! isset($sale->customer->phone_number))
                                            {{ '______' }}
                                            @else
                                            <span>{{ $sale->customer->phone_number }}</span>
                                        @endif
                                    </span>

                                    <span>منفرد نمایندگی تام الاختیار از جانب افراد زیر (جدول شماره 1) جمعا به تعداد</span>
                                    <span id="textPassengerCount">
                                        {{ count($sale->customer) }}
                                    </span>

                                    <span>که از این پس "مسافر" نامیده میشود از یک طرف و شرکت خدمات مسافرتی و گردشگری به مجوز شماره 104577 مورخ 1396/10/28 که از این پس "کارگزار" نامیده میشود به منظور استفاده از خدمات برنامه گشت به شرح جدول زیر (جدول شماره 2) منعقد میگردد</span>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr style="height: 20px;"></tr>

            <tr>
                <td>
                    <table class="mwh_box1">
                        <tbody>
                        <tr>
                            <th class="theader" style="width: 1000px">
                                <span>مشخصات مسافر</span>
                                <div class="mwh_sep2"></div>
                            </th>

                        </tr>
                        <tr>
                            <table class="mwh_box4">
                                <thead>
                                <tr>
                                    <th width="50px">ردیف</th>
                                    <th width="200px">نام و نام خانوادگی فارسی</th>
                                    <th width="200px">نام و نام خانوادگی انگلیسی</th>
                                    <th width="200px">شماره پاسپورت</th>
                                    <th width="200px">شماره تماس</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="50px" style="text-align:center">1</td>
                                    <td width="200px" style="text-align:center">
                                        <span>{{ $sale->customer->first_name }}</span>
                                        <span> {{ $sale->customer->last_name }} </span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        <span>{{ $sale->customer->e_first_name }}</span>
                                        <span> {{ $sale->customer->e_last_name }} </span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->customer->passport_number }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->customer->phone_number }}
                                    </td>
                                </tr>
                                @foreach($sale->customer->subCustomers as $index => $subCustomer)
                                <tr>
                                    <td width="50px" style="text-align:center">{{ $index + 2 }}</td>
                                    <td width="200px" style="text-align:center">
                                        <span>{{ $subCustomer->first_name }}</span>
                                        <span> {{ $subCustomer->last_name }} </span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $subCustomer->passport_number }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $subCustomer->passport_number }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $subCustomer->phone_number }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td style="font-weight:bold; text-align: center;" colspan="2">هزینه ریالی</td>
                                    <td style="font-weight:bold;text-align:center;color:#ff0000;">{{ $sale->contract->total_amount }}</td>
                                    <td style="font-weight:bold; text-align: center;">هزینه ارزی</td>
                                    <td style="font-weight:bold;text-align:center;color:#ff0000;">{{ $sale->contract->currency_sum }} $</td>
                                </tr>
                                </tfoot>
                            </table>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <br><br>

            <tr>
                <td>
                    @if($sale->salable_type === 'airplaneTicket')
                        @include('app.print.airplane-ticket')
                    @endif

                    @if($sale->salable_type === 'trainTicket')
                        @include('app.print.train-ticket')
                    @endif

                    @if($sale->salable_type === 'package')
                        @include('app.print.package')
                    @endif

                    @if($sale->salable_type === 'visaService')
                        @include('app.print.visa-service')
                    @endif

                    @if($sale->salable_type === 'passengerInsurance')
                        @include('app.print.passenger-insurance')
                    @endif

                    @if($sale->salable_type === 'pickup')
                        @include('app.print.pickup')
                    @endif

                    @if($sale->salable_type === 'hotel')
                        @include('app.print.hotel')
                    @endif
                </td>
            </tr>

            <br><br>

            <tr>
                <td>
                    <table class="mwh_box1">
                        <tbody>
                        <tr>
                            <th class="theader" style="width: 1000px">
                                <span>اطلاعات قرارداد</span>
                                <div class="mwh_sep2"></div>
                            </th>
                        </tr>
                        <tr>
                            <table class="mwh_box4">
                                <thead>
                                <tr>
                                    <th width="50px">شماره سند</th>
                                    <th width="200px">نام سند</th>
                                    <th width="200px">تاریخ سند</th>
                                    <th width="200px">از تاریخ</th>
                                    <th width="200px">تا تاریخ</th>
                                    <th width="200px">تعداد شب</th>
                                    <th width="200px">تعداد روز</th>
                                    <th width="200px">مبلغ خدمات</th>
                                    <th width="200px">جمع مبلغ ارزی</th>
                                    <th width="200px">مبلغ کلی فروش</th>
                                    <th width="200px">ارز</th>
                                    <th width="200px">مبلغ ارزی کل</th>
                                    <th width="200px">اعتباری</th>
                                    <th width="200px">کد مشتری</th>
                                    <th width="200px">نوع قرارداد</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="50px" style="text-align:center">
                                        {{ $sale->contract->document_number }}
                                    </td>
                                    <td width="50px" style="text-align:center">
                                        {{ $sale->contract->document_name }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ CustomDateTime::toJalali($sale->contract->document_date) }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ CustomDateTime::toJalali($sale->contract->contract_b_date) }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ CustomDateTime::toJalali($sale->contract->contract_e_date) }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->nights }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->days }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->services_amount }}
                                        <span> ریال</span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->currency_sum }}
                                        <span> دلار</span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->total_amount }}
                                        <span> ریال</span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->currency }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->total_currency_amount }}
                                        <span> دلار</span>
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->credit == '0' ? 'خیر' : 'بله' }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->customer_code }}
                                    </td>
                                    <td width="200px" style="text-align:center">
                                        {{ $sale->contract->contract_type }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
        </table>

        <br>

        <table class="mwh_box1">
            <tbody>
            <tr>
                <th class="theader" style="width: 1000px">
                    <span>توضیحات</span>
                    <div class="mwh_sep2"></div>
                </th>

            </tr>
            <tr>
                <table class="mwh_box4">
                    <tbody>
                    <tr>
                        <td width="800px" style="text-align:center">
                            <p>{{ $sale->contract->description }} </p>
                        </td>
                    </tr>
                </table>
            </tr>
            </tbody>
        </table>

        <br><br>
    </div>
    <p align="center">
        <a href="/" style="color:#ff0000;">بازگشت به ناحیه کاربری</a>
    |   <button onclick="window.print()" type="button" id="cmd" style="color:#ff0000;">چاپ سند</button>
    </p>
</div>
</body>
</html>