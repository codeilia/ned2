@extends('layouts.app.master')

@section('title', 'ثبت مرخصی')

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
            <i class="material-icons">playlist_add</i> ثبت مرخصی
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
            ثبت مرخصی
            @endslot

            @slot('body')
            <form action="{{ route('leaves.store') }}" method="post">
                {{ csrf_field() }}

                <div class="row" style="margin-top: 20px">
                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="days" class="form-control" name="days" value="{{ old('days') }}">
                                <label for="days" class="form-label"> تعداد روز</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" style="bottom: 2.5rem;">
                        <div class="form-group form-float">
                            <label for="type" class="form-label">نوع مرخصی </label>
                            <select id="type" class="form-control show-tick" name="type" data-live-search="true">
                                <option value=""> -- لطفا انتخاب کنید -- </option>
                                @foreach(\App\Nedsa\Constants::LEAVE_TYPE as $leaveType)
                                    <option value="{{ $leaveType['code']}}">
                                        {{ $leaveType['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4" style="bottom: 2.5rem;">
                        <div class="form-group form-float">
                            <label for="soldier" class="form-label">سرباز </label>
                            <select id="soldier" class="form-control show-tick" name="soldier" data-live-search="true">
                                <option value=""> -- لطفا انتخاب کنید -- </option>
                                @foreach($soldiers as $soldier)
                                    <option value="{{ $soldier->id }}" {{ $soldier->id == $selectedSoldier ? 'selected' : '' }}>
                                        {{ $soldier->first_name }} {{ $soldier->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="from" class="form-control datePicker" name="from" value="{{ old('from') }}">
                                <label for="from" class="form-label"> از تاریخ</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="to" class="form-control datePicker" name="to" value="{{ old('to') }}">
                                <label for="to" class="form-label"> تا تاریخ</label>
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
    </script>
@endsection