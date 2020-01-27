@extends('layouts.app.master')

@section('title', 'ویرایش اطلاعات کانتر')

@section('css')
    <link href="{{ URL::asset('css/persian-datepicker-0.4.5.min.css') }}" rel="stylesheet">
@endsection

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li>
            <a href="{{ route('admin.counters.index') }}">
                <i class="material-icons">people</i> کانترها
            </a>
        </li>

        <li class="active">
            <i class="material-icons">playlist_add</i> ویرایش اطلاعات کانتر
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
            ویرایش اطلاعات کانتر
            @endslot

            @slot('body')
            <form action="{{ route('admin.counters.update', ['counter' => $counter->id]) }}" method="post">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="username" class="form-control" name="username" value="{{ $counter->username }}">
                        <label for="username" class="form-label"> نام کاربری</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" id="password" class="form-control" name="password" >
                        <label for="password" class="form-label"> رمز عبور </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" >
                        <label for="password_confirmation" class="form-label"> تکرار رمز عبور </label>
                    </div>
                </div>

                <div id="cities" class="form-group form-float">
                    <label for="branch" class="form-label">شعبه </label>
                    <select id="branch" class="form-control show-tick" name="branch">
                        <option value=""> -- لطفا انتخاب کنید -- </option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $counter->branch->id === $branch->id ? 'selected' : null }}>
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="personal_code" class="form-control" name="personal_code" value="{{ $counter->personal_code }}">
                        <label for="personal_code" class="form-label"> کد پرسنلی </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="first_name" class="form-control" name="first_name" value="{{ $counter->details->first_name }}">
                        <label for="first_name" class="form-label"> نام </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $counter->details->last_name }}">
                        <label for="last_name" class="form-label"> نام خانوادگی </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="father_name" class="form-control" name="father_name" value="{{ $counter->details->father_name }}">
                        <label for="father_name" class="form-label"> نام پدر </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="national_code" class="form-control" name="national_code" value="{{ $counter->details->national_code }}">
                        <label for="national_code" class="form-label"> کد ملی </label>
                    </div>
                </div>


                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="birthday" class="form-control datePicker" name="birthday">
                        <label for="birthday" class="form-label"> تاریخ تولد </label>
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
    <script>
        $(window).bind('load', function () {
            var baseUrl = window.location.origin;

            $("#province").on('change', function () {
                var provinceId = $(this).val();

                window.location= baseUrl + '/branches/create?province=' + provinceId;
            });
        })
    </script>

    <script src="{{ URL::asset('js/persian-date-0.1.8.min.js') }}"></script>
    <script src="{{ URL::asset('js/persian-datepicker-0.4.5.min.js') }}"></script>

    <script>
        $(window).bind('load',function () {
            var datePickerInput =  $('.datePicker');
            datePickerInput.pDatepicker({
                persianDigit: true,
                viewMode: false,
                position: "auto",
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
                onShow: function (self) {},
                onHide: function (self) {},
                onSelect: function (unixDate) {
                    return this;
                },
                navigator: {
                    enabled: true,
                    text: {
                        btnNextText: ">",
                        btnPrevText: "<"
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
                    showSeconds: true,
                    showMeridian: true,
                    scrollEnabled: true
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
            datePickerInput.attr('placeholder', '1396-04-13');

            $('.tooltipster').tooltipster({
                side: 'left'
            });
        });
    </script>
@endsection
