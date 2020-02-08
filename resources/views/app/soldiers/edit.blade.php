@extends('layouts.app.master')

@section('title', 'ویرایش اطلاعات شخصی سرباز')

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
            <i class="material-icons">note_add</i> ویرایش اطلاعات شخصی سرباز
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <p class="col-lg-12 col-md-10 col-sm-12 col-xs-12 alert alert-warning">فیلد هایی که دارای علامت <span class="font-bold font-32">*</span> هستند پر کردنشان الزامیست</p>
    <div class="row">

        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
            <form action="{{ route('soldiers.update', ['soldier' => $soldier->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @component('layouts.app.components.basic-simple-card')
                @slot('title')
                اطلاعات فردی سرباز
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <input name="archive" type="checkbox" class="filled-in" id="archive" {{$soldier->archive ? 'checked' : ''}}>
                    <label for="archive">بایگانی</label>
                @endslot

                @slot('body')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <label for="document_code" class="form-label">شماره پرونده </label>
                                    <select id="document_code" class="form-control show-tick" name="document_code" data-live-search="true">
                                        <option value=""> -- لطفا انتخاب کنید -- </option>
                                        @foreach($nonReservedCodes as $code)
                                            <option value="{{ $code }}">
                                                {{ $code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="document_status" class="form-control" name="document_status" value="{{ $soldier->document_status }}">
                                        <label for="document_status" class="form-label"> وضعیت پرونده</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="first_name" class="form-control" name="first_name" value="{{ $soldier->first_name }}">
                                        <label for="first_name" class="form-label"> نام </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $soldier->last_name }}">
                                        <label for="last_name" class="form-label"> نام خانوادگی </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="father_name" class="form-control" name="father_name" value="{{ $soldier->father_name }}">
                                        <label for="father_name" class="form-label"> نام پدر</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="national_code" class="form-control" name="national_code" value="{{ $soldier->national_code }}">
                                        <label for="national_code" class="form-label"> کد ملی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="birthday" class="form-control" name="birthday" value="{{ $soldier->birthday }}">
                                        <label for="birthday" class="form-label"> تاریخ تولد</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="issue_place" class="form-control" name="issue_place" value="{{ $soldier->issue_place }}">
                                        <label for="issue_place" class="form-label"> محل صدور</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="religion" class="form-control" name="religion" value="{{ $soldier->religion  }}">
                                        <label for="religion" class="form-label"> دین/مذهب</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                        @php
                                            if ($soldier->married === 'متاهل')
                                            $married = 'checked';
                                            else $married = '';
                                        @endphp
                                        <div class="form-group form-float">
                                            <input type="checkbox" id="married" class="filled-in" name="married" {{$married}}>
                                            <label for="married" class="form-label"> متاهل؟</label>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="educations" class="form-control" name="educations" value="{{ $soldier->educations }}">
                                        <label for="educations" class="form-label"> تحصیلات</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="height" class="form-control" name="height" value="{{ $soldier->height }}">
                                        <label for="height" class="form-label"> قد</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="weight" class="form-control" name="weight" value="{{ $soldier->weight }}">
                                        <label for="weight" class="form-label"> وزن</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="study_field" class="form-control" name="study_field" value="{{ $soldier->study_field }}">
                                        <label for="study_field" class="form-label"> رشته تحصیلی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="expertise" class="form-control" name="expertise" value="{{ $soldier->expertise }}">
                                        <label for="expertise" class="form-label"> تخصص</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="province" class="form-control" name="province" value="{{ $soldier->province }}">
                                        <label for="province" class="form-label"> استان محل سکونت</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="blood_type" class="form-control" name="blood_type" value="{{ $soldier->blood_type }}">
                                        <label for="blood_type" class="form-label"> گروه خونی</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="post_code" class="form-control" name="post_code" value="{{ $soldier->post_code }}">
                                        <label for="post_code" class="form-label"> کد پستی</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" name="address" value="{{ $soldier->address }}">
                                        <label for="address" class="form-label"> آدرس</label>
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