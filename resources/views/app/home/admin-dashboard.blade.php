@extends('layouts.app.master')

@section('title', 'داشبورد')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons">dashboard</i> داشبورد
        </li>
    </ol>
@endsection

@section('content')
    <div class="row clearfix">
        @include('app.home.Admin.counts.index')
    </div>

    <div class="row clearfix">
        <!-- Pie Chart -->
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2> نمودار میله ای ورودی های هر ماه</h2>
                </div>
                <div class="body">
                    <canvas id="bar_chart" height="150"
                            data-total-purchased-amount="{{ 1}}"
                            data-total-paid-amount="{{ 1}}"
                            data-total-unpaid-amount="{{ 1}}"
                    >
                    </canvas>

                    {{--<p>--}}
                        {{--<canvas width="20" height="20" class="bg-pink"></canvas>--}}
                        {{--<span style="margin-right: 10px;"> جمع کل خرید از کارگزاران</span>--}}
                    {{--</p>--}}

                    {{--<p>--}}
                        {{--<canvas width="20" height="20" class="bg-amber"></canvas>--}}
                        {{--<span style="margin-right: 10px;">  پرداخت شده</span>--}}
                    {{--</p>--}}

                    {{--<p>--}}
                        {{--<canvas width="20" height="20" class="bg-cyan"></canvas>--}}
                        {{--<span style="margin-right: 10px;">  پرداخت نشده</span>--}}
                    {{--</p>--}}
                </div>
            </div>
        </div>
        <!-- #END# Pie Chart -->
    </div>



@endsection

@section('js')
    <!-- ChartJs -->
    <script src="{{URL::asset("/admin-dashboard/plugins/chartjs/Chart.bundle.js")}}"></script>

    <script>
        Chart.defaults.global.defaultFontFamily = 'yekan , aria';
        $(window).bind('load', function () {

            // new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
             new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
            // new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
            new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
        });

        function getChartJs(type) {
            var config = null;

            var $pieChartEl = $("#pie_chart");

            var totalPurchasedAmount = $pieChartEl.attr('data-total-purchased-amount');
            var totalPaidAmount = $pieChartEl.attr('data-total-paid-amount');
            var totalUnpaidAmount = $pieChartEl.attr('data-total-unpaid-amount');

            var pieChartDatas = [totalPurchasedAmount, totalPaidAmount, totalUnpaidAmount];


            if (type === 'bar') {
                config = {
                    type: 'bar',
                    data: {
                        labels: [
                            "فروردین",
                            "اردیبهشت",
                            "خرداد",
                            "تیر",
                            "مرداد",
                            "شهریور",
                            "مهر",
                            "آبان",
                            "آذر",
                            "دی",
                            "بهمن",
                            "اسفند",
                        ],
                        datasets: [{
                            label: "دومین مخزن داده",
                            data: [100, 48, 40, 19, 86, 27, 90],
                            backgroundColor: 'rgba(0, 188, 212, 0.8)'
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }

                }
            }
            return config;
        }
    </script>
@endsection