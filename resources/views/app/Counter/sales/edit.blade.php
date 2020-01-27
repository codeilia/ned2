@extends('layouts.app.master')

@section('title', 'ویرایش قرارداد فروش')

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

        <li>
            <a href="{{ route('counter.sales.index') }}">
                <i class="material-icons">border_color</i> قرارداد ها
            </a>
        </li>

        <li class="active">
            <i class="material-icons">note_add</i> ویرایش قرارداد فروش
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <p class="col-lg-12 col-md-10 col-sm-12 col-xs-12 alert alert-warning">فیلد هایی که دارای علامت <span class="font-bold font-32">*</span> هستند پر کردنشان الزامیست</p>
    <div class="row">

        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
            <form action="{{ route('counter.sales.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                @component('layouts.app.components.basic-simple-card')
                @slot('title')
                اطلاعات فروش
                @endslot

                @slot('body')

                <div class="form-group form-float">
                    <span class="font-24 col-red">*</span>
                    <label for="provider" class="form-label">کارگزار </label>
                    <select id="provider" class="form-control show-tick" name="provider">
                        <option value=""> -- لطفا انتخاب کنید -- </option>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}" {{ $sale->provider->id == $provider->id ? 'selected' : '' }}>
                                {{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-float">
                    <span class="font-24 col-red">*</span>
                    <div class="form-line">
                        <input type="text" id="purchase_amount" class="form-control" name="purchase_amount" value="{{ $sale->purchase_amount }}">
                        <label for="purchase_amount" class="form-label"> مبلغ خرید </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <span class="font-24 col-red">*</span>
                    <div class="form-line">
                        <input type="text" id="selling_amount" class="form-control" name="selling_amount" value="{{ $sale->selling_amount }}">
                        <label for="selling_amount" class="form-label"> مبلغ فروش </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="discount_amount" class="form-control" name="discount_amount" value="{{ $sale->discount_amount }}">
                        <label for="discount_amount" class="form-label"> مبلغ تخفیف </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <span class="font-24 col-red">*</span>
                    {{--<span class="font-bold">تصویر فیش پرداختی</span>--}}
                    {{--<input type="text" id="receipt_pic" class="form-control" name="receipt_pic">--}}

                    <label for="service_type" class="form-label">تصویر فیش پرداختی </label>
                    <input id="receipt_pic" name="receipt_pic" type="file" multiple />
                </div>

                <div class="form-group form-float">
                    <span class="font-24 col-red">*</span>
                    <label for="service_type" class="form-label">نوع خدمت </label>
                    <select id="service_type" class="form-control show-tick" name="service_type" onchange="showRelatedForm(this.value)">
                        <option value=""> -- لطفا انتخاب کنید -- </option>
                        <option value="1" {{ $service == 1 ? 'selected' : '' }}> بلیط هواپیما </option>
                        <option value="2" {{ $service == 2 ? 'selected' : '' }}> بلیط قطار </option>
                        <option value="3" {{ $service == 3 ? 'selected' : '' }}> تور پکیج آژانس های همکار </option>
                        <option value="4" {{ $service == 4 ? 'selected' : '' }}> خدمات اخذ ویزا </option>
                        <option value="5" {{ $service == 5 ? 'selected' : '' }}> خدمات بیمه مسافر </option>
                        <option value="6" {{ $service == 6 ? 'selected' : '' }}> پیکاپ </option>
                        <option value="7" {{ $service == 7 ? 'selected' : '' }}> هتل </option>
                        <option value="8" {{ $service == 8 ? 'selected' : '' }}> دارالترجمه </option>
                        <option value="9" {{ $service == 9 ? 'selected' : '' }}> ترانسفر در اختیار </option>
                    </select>
                </div>

                <div id="service_form">
                    @include('app.forms.service-form')
                </div>

                <br>
                @endslot
                @endcomponent


                @component('layouts.app.components.basic-simple-card')
                @slot('title')
                اطلاعات سند قرارداد
                @endslot

                @slot('body')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="document_number" class="form-control" name="document_number" value="{{ $sale->contract->document_number }}">
                                <label for="document_number" class="form-label"> شماره سند </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="document_date" class="form-control datePicker" name="document_date" value="{{ $sale->contract->document_date }}">
                                <label for="document_date" class="form-label"> تاریخ سند </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="document_name" class="form-control" name="document_name" value="{{ $sale->contract->document_name }}">
                                <label for="document_name" class="form-label"> نام سند </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="contract_b_date" class="form-control datePicker" name="contract_b_date" value="{{ CustomDateTime::toJalali($sale->contract->contract_b_date) }}">
                                <label for="contract_b_date" class="form-label"> از تاریخ </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="contract_e_date" class="form-control datePicker" name="contract_e_date" value="{{ CustomDateTime::toJalali($sale->contract->contract_e_date) }}">
                                <label for="contract_e_date" class="form-label"> تا تاریخ </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="services_amount" class="form-control" name="services_amount" value="{{ $sale->contract->services_amount }}">
                                <label for="services_amount" class="form-label"> مبلغ خدمات </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="total_amount" class="form-control" name="total_amount" value="{{ $sale->contract->total_amount }}">
                                <label for="total_amount" class="form-label"> مبلغ کلی فروش </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="contract_type" class="form-control" name="contract_type" value="{{ $sale->contract->contract_type }}">
                                <label for="contract_type" class="form-label"> نوع قرارداد </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="currency" class="form-control" name="currency" value="{{ $sale->contract->currency }}">
                                <label for="currency" class="form-label"> ارز </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="currency_sum" class="form-control" name="currency_sum" value="{{ $sale->contract->currency_sum }}">
                                <label for="currency_sum" class="form-label"> جمع مبلغ ارزی </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="total_currency_amount" class="form-control" name="total_currency_amount" value="{{ $sale->contract->total_currency_amount }}">
                                <label for="total_currency_amount" class="form-label"> مبلغ ارزی کل </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="customer_code" class="form-control" name="customer_code" value="{{ $sale->contract->customer_code }}">
                                <label for="customer_code" class="form-label"> کد مشتری </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <span class="font-24 col-red">*</span>
                        <div class="form-group form-float">
                            <input type="checkbox" id="credit" name="credit"  value="{{ $sale->contract->credit }}">
                            <label for="credit" class="form-label"> اعتباری </label>
                        </div>
                    </div>
                </div>
                @endslot
                @endcomponent


                @component('layouts.app.components.basic-simple-card')
                @slot('title')
                مشخصات مشتری
                @endslot

                @slot('description')
                <span class="col-orange">مشتری اول مشتری اصلی و مشتری های بعدی که اضافه میکنید مشتری های فرعیِ وابسته به مشتری اصلی هستند</span>
                @endslot

                @slot('button')
                <button type="button" style="margin: 0 !important;" id="add-customer" class="btn btn-primary m-t-15 waves-effect">
                    <i class="material-icons" style="font-size: 1.5em">add</i>
                    <span>افزودن مشتری </span>
                </button>
                @endslot

                @slot('body')
                <div class="row" id="customer-inf">
                    <div class="col-md-2">
                        <span class="font-24 col-red">*</span>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="passenger_code.0" class="form-control" name="passenger_code[]" value="{{ $sale->customer->passenger_code }}">
                                <label for="passenger_code.0" class="form-label"> کد مسافر </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="first_name.0" class="form-control" name="first_name[]" value="{{ $sale->customer->first_name }}">
                                <label for="first_name.0" class="form-label"> نام </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="last_name.0" class="form-control" name="last_name[]" value="{{ $sale->customer->last_name }}">
                                <label for="last_name.0" class="form-label"> نام خانوادگی </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="phone_number.0" class="form-control" name="phone_number[]" value="{{ $sale->customer->phone_number }}">
                                <label for="phone_number.0" class="form-label"> شماره تماس </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group form-float">
                            <span class="font-24 col-red">*</span>
                            <div class="form-line">
                                <input type="text" id="national_code.0" class="form-control" name="national_code[]" value="{{ $sale->customer->national_code }}">
                                <label for="national_code.0" class="form-label"> کد ملی </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="e_first_name.0" class="form-control" name="e_first_name[]" value="{{ $sale->customer->e_first_name }}">
                                <label for="e_first_name.0" class="form-label"> نام انگلیسی </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="e_last_name.0" class="form-control" name="e_last_name[]" value="{{ $sale->customer->e_last_name }}">
                                <label for="e_last_name.0" class="form-label"> نام خانوادگی انگلیسی </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="father_name.0" class="form-control" name="father_name[]" value="{{ $sale->customer->father_name }}">
                                <label for="father_name.0" class="form-label"> نام پدر </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="email.0" class="form-control" name="email[]" value="{{ $sale->customer->email }}">
                                <label for="email.0" class="form-label"> ایمیل </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="birthday.0" class="form-control datePicker" name="birthday[]" value="{{ CustomDateTime::toJalali($sale->customer->birthday) }}">
                                <label for="birthday.0" class="form-label"> تاریخ تولد </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="passport_number.0" class="form-control" name="passport_number[]" value="{{ $sale->customer->passport_number }}">
                                <label for="passport_number.0" class="form-label"> شماره پاسپورت </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="passport_expire_date.0" class="form-control datePicker" name="passport_expire_date[]" value="{{ CustomDateTime::toJalali($sale->customer->passport_expire_date) }}">
                                <label for="passport_expire_date.0" class="form-label"> تاریخ انقضای پاسپورت </label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="border-top: 5px solid #eee;">

                <button type="submit" class="btn btn-primary m-t-15 waves-effect ">ثبت</button>
                <br>
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