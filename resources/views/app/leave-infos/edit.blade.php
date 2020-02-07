@extends('layouts.app.master')

@section('title', 'ثبت یا ویرایش اطلاعات مرخصی')

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
            <i class="material-icons">note_add</i> ویرایش اطلاعات مرخصی
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <p class="col-lg-12 col-md-10 col-sm-12 col-xs-12 alert alert-warning">فیلد هایی که دارای علامت <span class="font-bold font-32">*</span> هستند پر کردنشان الزامیست</p>
    <div class="row" id="app">

        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
            <form action="{{ route('leaveInfos.update', ['soldier' => $soldier->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @component('layouts.app.components.basic-simple-card')
                    @slot('title')
                        اطلاعات مرخصی
                    @endslot

                    @slot('body')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="living_city" class="form-control" name="living_city" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->living_city : null}}">
                                        <label for="living_city" class="form-label"> شهر محل سکونت </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="distance" class="form-control" name="distance" value="{{ $soldier->leaveInfo ?  $soldier->leaveInfo->distance : null}}">
                                        <label for="distance" class="form-label"> مسافت </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="marriage_vacation_leave" class="form-control" name="marriage_vacation_leave" value="{{$soldier->leaveInfo ? $soldier->leaveInfo->marriage_vacation_leave : null }}">
                                        <label for="marriage_vacation_leave" class="form-label"> مرخصی تاهل</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="parents_die_vacation_leave" class="form-control" name="parents_die_vacation_leave" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->parents_die_vacation_leave : null}}">
                                        <label for="parents_die_vacation_leave" class="form-label">مرخصی فوت والدین</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="deserved" class="form-control" name="deserved" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->deserved : null }}">
                                        <label for="deserved" class="form-label"> استحقاقی</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="bonus" class="form-control" name="bonus" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->bonus : null}}">
                                        <label for="bonus" class="form-label"> تشویقی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="extra_bonus" class="form-control" name="extra_bonus" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->extra_bonus : null}}">
                                        <label for="extra_bonus" class="form-label"> تشویقی خارج از سقف</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="estelaji" class="form-control" name="estelaji" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->estelaji : null}}">
                                        <label for="estelaji" class="form-label"> استعلاجی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" id="emergency" class="form-control" name="emergency" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->emergency : null}}">
                                            <label for="emergency" class="form-label"> اظطراری</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" id="torahi" class="form-control" name="torahi" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->torahi : null}}">
                                            <label for="torahi" class="form-label"> توراهی</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="total" class="form-control" name="total" value="{{ $soldier->leaveInfo ? $soldier->leaveInfo->total : null}}">
                                        <label for="total" class="form-label"> جمع کل</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">ثبت</button>
                    @endslot
                @endcomponent
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/persian-date-0.1.8.min.js') }}"></script>
    <script src="{{ URL::asset('js/persian-datepicker-0.4.5.min.js') }}"></script>
    <script src="{{ URL::asset('admin-dashboard/plugins/dropzone/dropzone.js') }}"></script>

    <script>
        // var $total = $("#total");
        // var total = Number($total.val());
        //
        // var $bonus = $("#bonus");
        // var bonus = Number($bonus.val());
        //
        // var $deserved = $("#deserved");
        // var deserved = Number($deserved.val());
        //
        // var $emergency = $("#emergency");
        // var emergency = Number($emergency.val());
        //
        // var $estelaji = $("#estelaji");
        // var estelaji = Number($estelaji.val());
        //
        // var $torahi = $("#torahi");
        // var torahi = Number($estelaji.val())
        //
        // var $parents_die_vacation_leave = $("#parents_die_vacation_leave");
        // var parents_die_vacation_leave = Number($parents_die_vacation_leave.val());
        //
        // var $marriage_vacation_leave = $("#marriage_vacation_leave");
        // var marriage_vacation_leave = Number($marriage_vacation_leave.val());
        //
        // var $distance = $("#distance");
        // var distance = Number($distance.val());
        //
        // $total.val( deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave);


        $(window).bind('load',function () {
            // $bonus.keyup(function () {
            //     bonus = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            // });
            //
            // $deserved.keyup(function () {
            //     deserved = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $emergency.keyup(function () {
            //     emergency = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $estelaji.keyup(function () {
            //    estelaji = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $torahi.keyup(function () {
            //     torahi = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $parents_die_vacation_leave.keyup(function () {
            //     parents_die_vacation_leave = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $marriage_vacation_leave.keyup(function () {
            //     marriage_vacation_leave = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $marriage_vacation_leave.keyup(function () {
            //     marriage_vacation_leave = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     // $total.toggleClass('focused');
            // });
            //
            // $distance.keyup(function () {
            //     distance = Number($(this).val());
            //     total = torahi + estelaji + emergency + deserved + bonus + parents_die_vacation_leave + marriage_vacation_leave;
            //     $total.val(total);
            //     $total.parent(".form-line").addClass('focused');
            //     $total.val(total);
            //     // $total.toggleClass('focused');
            // });

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
                    enabled: true,
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
            datePickerInput.attr('placeholder', '1396-04-13')
        });
    </script>
@endsection