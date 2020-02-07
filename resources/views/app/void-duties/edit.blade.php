@extends('layouts.app.master')

@section('title', 'ویرایش خلاء خدمت')

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
            <i class="material-icons">note_add</i> ویرایش اضافه خدمت
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <p class="col-lg-12 col-md-10 col-sm-12 col-xs-12 alert alert-warning">فیلد هایی که دارای علامت <span class="font-bold font-32">*</span> هستند پر کردنشان الزامیست</p>
    <div class="row">

        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
                @component('layouts.app.components.basic-simple-card')
                @slot('title')
                ویرایش اضافه خدمت
                @endslot

                @slot('body')
                    <form action="{{ route('extraDuties.update', ['extraDuty' => $extraDuty->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row" style="margin-top: 2rem">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="days" class="form-control" name="days" value="{{ $extraDuty->days }}">
                                        <label for="days" class="form-label"> تعاد روز</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="reason" class="form-control" name="reason" value="{{ $extraDuty->reason }}">
                                        <label for="reason" class="form-label"> علت</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            var datePickerInput =  $('.datePicker');
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
                onShow: function (self) {},
                onHide: function (self) {},
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
            datePickerInput.attr('placeholder', '1396-04-13');

//            $('.tooltipster').tooltipster({
//                side: 'left'
//            });


            // add customer

            var elementCount = 0;
            $("#add-customer").click(function () {
                var $customerInf = $("#customer-inf");
                var html = $customerInf.clone();
                html = html.attr('id', 'customer-inf' + elementCount);

                elementCount += 1;
                $(html).find('input[name="passenger_code[]"]').attr('id', 'passenger_code' + elementCount);
                $(html).find('input[name="first_name[]"]').attr('id', 'first_name' + elementCount);
                $(html).find('input[name="last_name[]"]').attr('id', 'last_name' + elementCount);
                $(html).find('input[name="e_first_name[]"]').attr('id', 'e_first_name' + elementCount);
                $(html).find('input[name="e_last_name[]"]').attr('id', 'e_last_name' + elementCount);
                $(html).find('input[name="father_name[]"]').attr('id', 'father_name' + elementCount);
                $(html).find('input[name="phone_number[]"]').attr('id', 'phone_number' + elementCount);
                $(html).find('input[name="email[]"]').attr('id', 'email' + elementCount);
                $(html).find('input[name="birthday[]"]').attr('id', 'birthday' + elementCount);
                $(html).find('input[name="national_code[]"]').attr('id', 'national_code' + elementCount);
                $(html).find('input[name="passport_number[]"]').attr('id', 'passport_number' + elementCount);
                $(html).find('input[name="passport_expire_date[]"]').attr('id', 'passport_expire_date' + elementCount);


                $customerInf.after(html);
                $(html).before('<hr style="border-top: 5px solid #eee;">')

            });

            var baseUrl = window.location.origin;

        });

        function showRelatedForm(formId) {
            var baseUrl = window.location.origin;

            console.log(baseUrl + '/api/sales/forms/' + formId);

//            $.ajax({
//                url: baseUrl + '/api/sales/forms/' + formId,
//                heders: {"Access-Control-Allow-Origin": "*"},
//                type: 'GET',
//                success: function (data) {
//                    $("#service_form").html(data);
//                    window.recalc();
//                }
//            });

            window.location = baseUrl + '/counter/sales/create?service=' + formId;
        }
    </script>
@endsection