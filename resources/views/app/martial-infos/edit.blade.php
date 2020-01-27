@extends('layouts.app.master')

@section('title', 'ثبت یا ویرایش اطلاعات نظامی')

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
            <i class="material-icons">note_add</i> ویرایش اطلاعات نظامی
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <p class="col-lg-12 col-md-10 col-sm-12 col-xs-12 alert alert-warning">فیلد هایی که دارای علامت <span class="font-bold font-32">*</span> هستند پر کردنشان الزامیست</p>
    <div class="row">

        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
            <form action="{{ route('martialInfos.update', ['soldier' => $soldier->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @component('layouts.app.components.basic-simple-card')
                    @slot('title')
                        اطلاعات نظامی
                    @endslot

                    @slot('body')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <label for="unit_id" class="form-label">سرباز </label>
                                    <select id="unit_id" class="form-control show-tick" name="unit_id" data-live-search="true">
                                        <option value=""> -- لطفا انتخاب کنید -- </option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $unit->id == $selectedUnit ? 'selected' : '' }}>
                                                {{ $unit->title }} - ({{ $unit->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="sent_zone" class="form-control" name="sent_zone" value="{{ $soldier->martial_info ? $soldier->martialInfo->sent_zone : null}}">
                                        <label for="sent_zone" class="form-label"> حوزه اعزام</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="sent_date" class="form-control" name="sent_date" value="{{ $soldier->martial_info ? $soldier->martialInfo->sent_date : null}}">
                                        <label for="sent_date" class="form-label"> تاریخ اعزام </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="end_date" class="form-control" name="end_date" value="{{ $soldier->martial_info ? $soldier->martialInfo->end_date : null}}">
                                        <label for="end_date" class="form-label"> تاریخ پایان خدمت </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="start_date" class="form-control" name="start_date" value="{{ $soldier->martial_info ? $soldier->martialInfo->start_date : null}}">
                                        <label for="start_date" class="form-label"> تاریخ شروع به کار</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="personal_code" class="form-control" name="personal_code" value="{{ $soldier->martial_info ? $soldier->martialInfo->personal_code : null}}">
                                        <label for="personal_code" class="form-label"> کد پرسنلی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="degree" class="form-control" name="degree" value="{{ $soldier->martial_info ? $soldier->martialInfo->degree : null}}">
                                        <label for="degree" class="form-label"> درجه</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="term" class="form-control" name="term" value="{{ $soldier->martial_info ? $soldier->martialInfo->term  : null}}">
                                        <label for="term" class="form-label"> دوره</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="health_code" class="form-control" name="health_code" value="{{ $soldier->martial_info ? $soldier->martialInfo->health_code : null}}">
                                        <label for="health_code" class="form-label"> کد سلامت</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="legal_duty_time" class="form-control" name="legal_duty_time" value="{{ $soldier->martial_info ? $soldier->martialInfo->legal_duty_time : null}}">
                                        <label for="legal_duty_time" class="form-label"> مدت قانونی خدمت</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tosieh_code" class="form-control" name="tosieh_code" value="{{ $soldier->martial_info ? $soldier->martialInfo->tosieh_code : null}}">
                                        <label for="tosieh_code" class="form-label"> کد توصیه</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="category" class="form-control" name="category" value="{{ $soldier->martial_info ? $soldier->martialInfo->category : null}}">
                                        <label for="category" class="form-label"> رسته خدمتی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    @php
                                    if ($soldier->martialInfo)
                                    $native = $soldier->martialInfo->native ? 'checked' : '';
                                    @endphp
                                    <input type="checkbox" id="native" class="filled-in" name="native" {{$native}}>
                                    <label for="native" class="form-label"> بومی؟</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="training_camp" class="form-control" name="training_camp" value="{{ $soldier->martial_info ? $soldier->martialInfo->training_camp : null}}">
                                        <label for="training_camp" class="form-label"> مرکز آموزش</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="green_card" class="form-control" name="green_card" value="{{ $soldier->martial_info ? $soldier->martialInfo->green_card : null}}">
                                        <label for="green_card" class="form-label"> کفایت از آموزش</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="previous_duty_place_state" class="form-control" name="previous_duty_place_state" value="{{ $soldier->martial_info ? $soldier->martialInfo->previous_duty_place_state : null}}">
                                        <label for="previous_duty_place_state" class="form-label">وضعیت محل خدمت قبلی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="previous_intro_date" class="form-control" name="previous_intro_date" value="{{ $soldier->martial_info ? $soldier->martialInfo->previous_intro_date : null}}">
                                        <label for="previous_intro_date" class="form-label"> تاریخ معرفی از رده قبلی</label>
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