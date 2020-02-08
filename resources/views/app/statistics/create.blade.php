@extends('layouts.app.master')

@section('title', 'آمار تفکیکی سربازان')

@section('css')
    <link href="{{ URL::asset('css/persian-datepicker-0.4.5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin-dashboard/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons">playlist_add</i>آمار تفکیکی سربازان
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <div class="row">
        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
            @component('layouts.app.components.basic-simple-card')
            @slot('title')
            آمار تفکیکی سربازان
            @endslot

            @slot('body')
            <form action="{{ route('statistics.index') }}" method="get">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-2">
                        <input name="first_name" type="checkbox" class="filled-in" id="first_name">
                        <label for="first_name">نام</label>
                    </div>

                    <div class="col-md-2">
                        <input name="last_name" type="checkbox" class="filled-in" id="last_name">
                        <label for="last_name">نام خانوادگی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="national_code" type="checkbox" class="filled-in" id="national_code">
                        <label for="national_code">کد ملی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="father_name" type="checkbox" class="filled-in" id="father_name">
                        <label for="father_name">نام پدر</label>
                    </div>

                    <div class="col-md-2">
                        <input name="document_code" type="checkbox" class="filled-in" id="document_code">
                        <label for="document_code">شماره پرونده</label>
                    </div>

                    <div class="col-md-2">
                        <input name="document_status" type="checkbox" class="filled-in" id="document_status">
                        <label for="document_status">وضعیت پرونده</label>
                    </div>

                    <div class="col-md-2">
                        <input name="birthday" type="checkbox" class="filled-in" id="birthday">
                        <label for="birthday">تاریخ تولد</label>
                    </div>

                    <div class="col-md-2">
                        <input name="issue_place" type="checkbox" class="filled-in" id="issue_place">
                        <label for="issue_place">محل صدور</label>
                    </div>

                    <div class="col-md-2">
                        <input name="married" type="checkbox" class="filled-in" id="married">
                        <label for="married">وضعیت تاهل</label>
                    </div>

                    <div class="col-md-2">
                        <input name="religion" type="checkbox" class="filled-in" id="religion">
                        <label for="religion">مذهب</label>
                    </div>

                    <div class="col-md-2">
                        <input name="educations" type="checkbox" class="filled-in" id="educations">
                        <label for="educations">تحصیلات</label>
                    </div>

                    <div class="col-md-2">
                        <input name="married" type="checkbox" class="filled-in" id="married">
                        <label for="married">وضعیت تاهل</label>
                    </div>

                    <div class="col-md-2">
                        <input name="height" type="checkbox" class="filled-in" id="height">
                        <label for="height">قد</label>
                    </div>

                    <div class="col-md-2">
                        <input name="weight" type="checkbox" class="filled-in" id="weight">
                        <label for="weight">وزن</label>
                    </div>

                    <div class="col-md-2">
                        <input name="study_field" type="checkbox" class="filled-in" id="study_field">
                        <label for="study_field">رشته تحصیلی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="expertise" type="checkbox" class="filled-in" id="expertise">
                        <label for="expertise">تخصص</label>
                    </div>

                    <div class="col-md-2">
                        <input name="province" type="checkbox" class="filled-in" id="province">
                        <label for="province">استان سکونت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="blood_type" type="checkbox" class="filled-in" id="blood_type">
                        <label for="blood_type">گروه خون</label>
                    </div>

                    <div class="col-md-2">
                        <input name="post_code" type="checkbox" class="filled-in" id="post_code">
                        <label for="post_code">کد پستی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="archive" type="checkbox" class="filled-in" id="archive">
                        <label for="archive">بایگانی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="unit" type="checkbox" class="filled-in" id="unit">
                        <label for="unit">واحد/معاونت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="sent_zone" type="checkbox" class="filled-in" id="sent_zone">
                        <label for="sent_zone">حوزه اعزام</label>
                    </div>

                    <div class="col-md-2">
                        <input name="extraDuty" type="checkbox" class="filled-in" id="extraDuty">
                        <label for="extraDuty">اضافه خدمت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="sent_date" type="checkbox" class="filled-in" id="sent_date">
                        <label for="sent_date">تاریخ اعزام</label>
                    </div>

                    <div class="col-md-2">
                        <input name="end_date" type="checkbox" class="filled-in" id="end_date">
                        <label for="end_date">تاریخ پایان خدمت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="start_date" type="checkbox" class="filled-in" id="start_date">
                        <label for="start_date">تاریخ شروع خدمت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="actualEndDutyDate" type="checkbox" class="filled-in" id="actualEndDutyDate">
                        <label for="actualEndDutyDate">تاریخ محاسبه شده پایان خدمت</label>
                    </div>

                    {{--<div class="col-md-2">--}}
                        {{--<input name="lastLeave" type="checkbox" class="filled-in" id="lastLeave">--}}
                        {{--<label for="lastLeave">تاریخ شروع خدمت</label>--}}
                    {{--</div>--}}

                    <div class="col-md-2">
                        <input name="personal_code" type="checkbox" class="filled-in" id="personal_code">
                        <label for="personal_code">کد پرسنلی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="degree" type="checkbox" class="filled-in" id="degree">
                        <label for="degree">درجه</label>
                    </div>

                    <div class="col-md-2">
                        <input name="category" type="checkbox" class="filled-in" id="category">
                        <label for="category">رسته</label>
                    </div>

                    <div class="col-md-2">
                        <input name="term" type="checkbox" class="filled-in" id="term">
                        <label for="term">دوره</label>
                    </div>

                    <div class="col-md-2">
                        <input name="health_code" type="checkbox" class="filled-in" id="health_code">
                        <label for="health_code">کد سلامت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="tosieh_code" type="checkbox" class="filled-in" id="tosieh_code">
                        <label for="tosieh_code">وضعیت جسمانی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="mental_status" type="checkbox" class="filled-in" id="mental_status">
                        <label for="mental_status">وضعیت روانی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="legal_duty_time" type="checkbox" class="filled-in" id="legal_duty_time">
                        <label for="legal_duty_time">مدت قانونی خدمت</label>
                    </div>

                    <div class="col-md-2">
                        <input name="native" type="checkbox" class="filled-in" id="native">
                        <label for="native">بومی/غیربومی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="training_camp" type="checkbox" class="filled-in" id="training_camp">
                        <label for="training_camp">مرکز آموزشی</label>
                    </div>

                    <div class="col-md-2">
                        <input name="green_card" type="checkbox" class="filled-in" id="green_card">
                        <label for="green_card">کفایت از آموزش</label>
                    </div>

                    <div class="col-md-2">
                        <input name="previous_duty_place_state" type="checkbox" class="filled-in" id="previous_duty_place_state">
                        <label for="previous_duty_place_state">{{trans("nedsa.martialInfo.previous_duty_place_state")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="previous_intro_date" type="checkbox" class="filled-in" id="previous_intro_date">
                        <label for="previous_intro_date">{{trans("nedsa.martialInfo.previous_intro_date")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="living_city" type="checkbox" class="filled-in" id="living_city">
                        <label for="living_city">{{trans("nedsa.leaveInfo.living_city")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="distance" type="checkbox" class="filled-in" id="distance">
                        <label for="distance">{{trans("nedsa.leaveInfo.distance")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="marriage_vacation_leave" type="checkbox" class="filled-in" id="marriage_vacation_leave">
                        <label for="marriage_vacation_leave">{{trans("nedsa.leaveInfo.marriage_vacation_leave")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="parents_die_vacation_leave" type="checkbox" class="filled-in" id="parents_die_vacation_leave">
                        <label for="parents_die_vacation_leave">{{trans("nedsa.leaveInfo.parents_die_vacation_leave")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="deserved" type="checkbox" class="filled-in" id="deserved">
                        <label for="deserved">{{trans("nedsa.leaveInfo.deserved")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="bonus" type="checkbox" class="filled-in" id="bonus">
                        <label for="bonus">{{trans("nedsa.leaveInfo.bonus")}}</label>
                    </div>

                    <div class="col-md-2">
                        <input name="total" type="checkbox" class="filled-in" id="total">
                        <label for="total">{{trans("nedsa.leaveInfo.total")}}</label>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت</button>
            </form>
            @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/persian-date-0.1.8.min.js') }}"></script>

    <script src="{{ URL::asset('js/persian-datepicker-0.4.5.min.js') }}"></script>

    <script src="{{ URL::asset('admin-dashboard/plugins/dropzone/dropzone.js') }}"></script>

    <script>
        $(window).bind('load',function () {
            var datePickerInput = $('.datePicker');
            datePickerInput.pDatepicker({
                persianDigit: true,
                viewMode: false,
//                position: "auto",
                autoClose: false,
                format: false,
                observer: true,
                altField: false,
                inputDelay: 800,
                formatter: function (unixDate) {
                    var self = this;
                    var pdate = new persianDate(unixDate);
                    pdate.formatPersian = false;
                    return pdate.format(self.format);
                },
                altFormat: 'unix',
                altFieldFormatter: function (unixDate) {
                    var self = this;
                    var thisAltFormat = self.altFormat.toLowerCase();
                    if (thisAltFormat === "gregorian" | thisAltFormat === "g") {
                        return new Date(unixDate);
                    }
                    if (thisAltFormat === "unix" | thisAltFormat === "u") {
                        return unixDate;
                    } else {
                        return new persianDate(unixDate).format(self.altFormat);
                    }
                },
                onShow: function (self) {
                },
                onHide: function (self) {
                },
                onSelect: function (unixDate) {
                    return this;
                },
                navigator: {
                    enabled: true,
                    text: {
                        btnNextText: "<",
                        btnPrevText: ">"
                    },
                    onNext: function (navigator) {
                        //log("navigator next ");
                    },
                    onPrev: function (navigator) {
                        //log("navigator prev ");
                    },
                    onSwitch: function (state) {
                        // console.log("navigator switch ");
                    }
                },
                toolbox: {
                    enabled: true,

                    text: {
                        btnToday: "امروز"
                    },
                    onToday: function (toolbox) {
                        //log("toolbox today btn");
                    }
                },
                timePicker: {
                    enabled: false,
                    showSeconds: false,
                    showMeridian: false,
                    scrollEnabled: false
                },
                dayPicker: {
                    enabled: true,
                    scrollEnabled: true,
                    titleFormat: 'YYYY MMMM',
                    titleFormatter: function (year, month) {
                        if (this.datepicker.persianDigit == false) {
                            window.formatPersian = false;
                        }
                        var titleStr = new persianDate([year, month]).format(this.titleFormat);
                        window.formatPersian = true;
                        return titleStr
                    },
                    onSelect: function (selectedDayUnix) {
                        //log("daypicker month day :" + selectedDayUnix);
                    }

                },
                monthPicker: {
                    enabled: true,
                    scrollEnabled: true,
                    titleFormat: 'YYYY',
                    titleFormatter: function (unix) {
                        if (this.datepicker.persianDigit == false) {
                            window.formatPersian = false;
                        }
                        var titleStr = new persianDate(unix).format(this.titleFormat);
                        window.formatPersian = true;
                        return titleStr

                    },
                    onSelect: function (monthIndex) {
                        //log("daypicker select day :" + monthIndex);
                    }
                },
                yearPicker: {
                    enabled: true,
                    scrollEnabled: true,
                    titleFormat: 'YYYY',
                    titleFormatter: function (year) {
                        var remaining = parseInt(year / 12) * 12;
                        return remaining + "-" + (remaining + 11);
                    },
                    onSelect: function (monthIndex) {
                        //log("daypicker select Year :" + monthIndex);
                    }
                },
                onlyTimePicker: false,
                justSelectOnDate: false,
                minDate: false,
                maxDate: false

            });

            datePickerInput.val('');
            datePickerInput.attr('placeholder', '1398-10-13');
        })
    </script>
    {{--<script>--}}
        {{--$(window).bind('load', function () {--}}
            {{--var baseUrl = window.location.origin;--}}

            {{--$("#province").on('change', function () {--}}
                {{--var provinceId = $(this).val();--}}

                {{--window.location= baseUrl + '/admin/branches/create?province=' + provinceId;--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endsection