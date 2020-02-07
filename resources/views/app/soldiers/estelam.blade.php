@extends('layouts.app.master')

@section('title', 'لیست سربازها')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> استعلام
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
                    استعلام
                @endslot

                @slot('body')
                    <table class="table table-bordered table-striped table-hover dataTable" id="searchableTable">
                        <thead>
                        <tr>
                            {{--<th class="text-center">ردیف</th>--}}
                            <th class="text-center">نام</th>
                            <th class="text-center">نام خانوادگی</th>
                            <th class="text-center">نام پدر</th>
                            <th class="text-center">کد ملی</th>
                            <th class="text-center">تاریخ اعزام خدمت</th>
                            <th class="text-center">تاریخ پایان خدمت</th>
                            <th class="text-center">تاریخ پایان خدمت محاسبه شده</th>
                            <th class="text-center">مرخصی استحقاقی</th>
                            <th class="text-center">مرخصی اظطراری</th>
                            <th class="text-center">مرخصی تشویقی</th>
                            <th class="text-center"> تشویقی خارج از سقف</th>
                            <th class="text-center">مرخصی استعلاجی</th>
                            <th class="text-center">غیبت</th>
                            <th class="text-center">اضافه خدمت</th>
                            <th class="text-center">خلاء خدمتی</th>
                            <th class="text-center">کسری</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"> {{ $soldier->first_name }} </td>
                                <td class="text-center"> {{ $soldier->last_name }} </td>
                                <td class="text-center"> {{ $soldier->father_name }} </td>
                                <td class="text-center"> {{ $soldier->national_code }} </td>
                                <td class="text-center"> {{ \App\Helpers\CustomDateTime::toJalali($soldier->martialInfo->sent_date) }} </td>
                                <td class="text-center"> {{ \App\Helpers\CustomDateTime::toJalali($soldier->endDutyDate) }} </td>
                                <td class="text-center" style="direction: ltr;">{{ \App\Helpers\CustomDateTime::toJalali($soldier->actualEndDutyDate) }}</td>
                                <td class="text-center">
                                    <span>{{ $soldier->usedDeserved }}</span>
                                    <span> مانده:‌ </span>
                                    <span> {{ $soldier->remainingDeserved }} </span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $soldier->usedEmergency }}</span>
                                    <span> مانده:‌ </span>
                                    <span> {{ $soldier->remainingEmergency }} </span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $soldier->usedBonus }}</span>
                                    <span> مانده:‌ </span>
                                    <span> {{ $soldier->RemainingBonus }} </span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $soldier->usedExtraBonus }}</span>
                                    <span> مانده:‌ </span>
                                    <span> {{ $soldier->RemainingExtraBonus }} </span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $soldier->usedEstelaji  }}</span>
                                    <span> مانده:‌ </span>
                                    <span> {{ $soldier->remainingEstelaji }} </span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $totalAbsences }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $totalExtraDuty }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $totalVoid }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $totalShortages }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endslot
            @endcomponent

            @component('layouts.app.components.paginator')
                @slot('data')
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    <script>
        //Exportable table
        $('.searchable').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            buttons: [
                'excel'
            ]
        });
    </script>
@endsection