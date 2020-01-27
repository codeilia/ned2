@extends('layouts.app.master')

@section('title', 'آمار کانتر')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <i class="material-icons rtlIcon">device_hub</i> شعب
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">insert_chart</i>آمار کانتر
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    {{-- TODO: Check for empty model here--}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('layouts.app.components.basic-simple-card')
            @slot('title')
            آمار فروش کانتر  {{ $counter->details->first_name . ' ' . $counter->details->last_name }}
            @endslot

            @slot('body')
            <h4>آمار کل فروش کانتر</h4>
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center">نام کانتر</th>
                    <th class="text-center">کد پرسنلی کانتر</th>
                    <th class="text-center">مبلغ کل خرید</th>
                    <th class="text-center">مبلغ کل فروش</th>
                    <th class="text-center">مبلغ کل حاشیه سود</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center"> {{ $counter->details->first_name }} </td>
                    <td class="text-center">{{ $counter->personal_code }}</td>
                    <td class="text-center" id="purchaseAmount">{{ $counter->saleStat->purchase_amount }}</td>
                    <td class="text-center" id="sellingAmount">{{ $counter->saleStat->selling_amount }}</td>
                    <td class="text-center" id="profit">{{ $counter->saleStat->profit }}</td>
                </tr>
                </tbody>
            </table>

            <br><hr style="border-top: 5px solid #eee;"><br>


            <h4>آمار تک تک فروش های کانتر</h4>
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center">مبلغ خرید</th>
                    <th class="text-center">مبلغ فروش</th>
                    <th class="text-center">مبلغ تخفیف</th>
                    <th class="text-center">مبلغ کلی فروش</th>
                    <th class="text-center">حاشیه سود</th>
                </tr>
                </thead>
                <tbody>
                @foreach($counter->sales as $sale)
                    <tr>
                        <td class="text-center">
                            {{ $sale->purchase_amount }}
                        </td>
                        <td class="text-center">
                            {{ $sale->selling_amount }}
                        </td>
                        <td class="text-center" id="purchaseAmount">
                            {{ (int) $sale->discount }}
                        </td>
                        <td class="text-center" id="sellingAmount">
                            {{ $sale->contract->total_amount }}
                        </td>
                        <td class="text-center" id="profit">
                            {{ (int) ($sale->selling_amount - $sale->purchase_amount - (int) $sale->discount) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endslot
            @endcomponent
        </div>
    </div>

    <div class="row clearfix">
        <!-- Pie Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2> نمودار آمار فروش شعبه {{$counter->name}}</h2>
                </div>
                <div class="body">
                    <canvas id="pie_chart" height="150"></canvas>

                    <p>
                        <canvas width="20" height="20" class="bg-pink"></canvas>
                        <span style="margin-right: 10px;"> جمع کل خرید از کارگزاران</span>
                    </p>

                    <p>
                        <canvas width="20" height="20" class="bg-amber"></canvas>
                        <span style="margin-right: 10px;">  پرداخت شده</span>
                    </p>

                    <p>
                        <canvas width="20" height="20" class="bg-cyan"></canvas>
                        <span style="margin-right: 10px;">  پرداخت نشده</span>
                    </p>
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
            // new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
            // new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
            new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
        });

        function getChartJs(type) {
            var config = null;

            var purchaseAmount = $("#purchaseAmount").text();
            var sellingAmount = $("#sellingAmount").text();
            var profit = $("#profit").text();

            var pieChartDatas = [purchaseAmount, sellingAmount, profit];


            config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: pieChartDatas,
                        backgroundColor: [
                            "rgb(233, 30, 99)",
                            "rgb(255, 193, 7)",
                            "rgb(0, 188, 212)"
                        ]
                    }],
                    labels: [
                        "جمع کل خرید",
                        "جمع کل فروش",
                        "حمع کل حاشیه سود"
                    ]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }


            return config;
        }
    </script>
@endsection