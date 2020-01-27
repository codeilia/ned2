@extends('layouts.app.master')

@section('title', 'ثبت سرباز جدید')

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
            <i class="material-icons">playlist_add</i> ثبت سرباز جدید
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
            ثبت شعبه جدید در سیستم
            @endslot

            @slot('body')
            <form action="{{ route('soldiers.store') }}" method="post">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="document_code" class="form-control" name="document_code" value="{{ old('document_code') }}">
                                <label for="document_code" class="form-label"> شماره پرونده</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="document_status" class="form-control" name="document_status" value="{{ old('document_status') }}">
                                <label for="document_status" class="form-label"> وضعیت پرونده</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                <label for="first_name" class="form-label"> نام </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                <label for="last_name" class="form-label"> نام خانوادگی </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="father_name" class="form-control" name="father_name" value="{{ old('father_name') }}">
                                <label for="father_name" class="form-label"> نام پدر</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="national_code" class="form-control" name="national_code" value="{{ old('national_code') }}">
                                <label for="national_code" class="form-label"> کد ملی</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="birthday" class="form-control datePicker" name="birthday" value="{{ old('birthday') }}">
                                <label for="birthday" class="form-label"> تاریخ تولد</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="issue_place" class="form-control" name="issue_place" value="{{ old('issue_place') }}">
                                <label for="issue_place" class="form-label"> محل صدور</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                                <input name="married" type="checkbox" class="filled-in" id="married">
                                <label for="married">متاهل</label>
                                {{--<input type="text" id="married" class="form-control" name="married" value="{{ old('married') }}">--}}
                                {{--<label for="married" class="form-label"> متاهل</label>--}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="educations" class="form-control" name="educations" value="{{ old('educations') }}">
                                <label for="educations" class="form-label"> تحصیلات</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="height" class="form-control" name="height" value="{{ old('height') }}">
                                <label for="height" class="form-label"> قد</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="weight" class="form-control" name="weight" value="{{ old('weight') }}">
                                <label for="weight" class="form-label"> وزن</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="study_field" class="form-control" name="study_field" value="{{ old('study_field') }}">
                                <label for="study_field" class="form-label"> رشته تحصیلی</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="expertise" class="form-control" name="expertise" value="{{ old('expertise') }}">
                                <label for="expertise" class="form-label"> تخصص</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="province" class="form-control" name="province" value="{{ old('province') }}">
                                <label for="province" class="form-label"> استان محل سکونت</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="blood_type" class="form-control" name="blood_type" value="{{ old('blood_type') }}">
                                <label for="blood_type" class="form-label"> گروه خونی</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="post_code" class="form-control" name="post_code" value="{{ old('post_code') }}">
                                <label for="post_code" class="form-label"> کد پستی</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="address" class="form-control" name="address" value="{{ old('address') }}">
                                <label for="address" class="form-label"> آدرس</label>
                            </div>
                        </div>
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