@extends('layouts.app.master')

@section('title', 'ثبت قرارداد فروش')

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
            <i class="material-icons">note_add</i> ثبت قرارداد فروش
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

                <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#sale_information" data-toggle="tab">اطلاعات فروش</a></li>
                        <li role="presentation"><a href="#contract_information" data-toggle="tab">اطلاعات سند قرارداد</a></li>
                        <li role="presentation"><a href="#customer_information" data-toggle="tab">مشخصات مشتری</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane animated flipInX active" id="sale_information">
                            @component('layouts.app.components.basic-simple-card')
                            @slot('title')
                            اطلاعات فروش
                            @endslot

                            @slot('body')

                            <div class="form-group form-float">
                                <span class="font-24 col-red">*</span>
                                <label for="service_type" class="form-label">
                                    <span>نوع خدمت </span>&nbsp;&nbsp;&nbsp;
                                    <button type="button" style="margin: 0 !important;" id="add-service" class="btn btn-sm btn-primary m-t-15 waves-effect">
                                        <i class="material-icons" style="font-size: 1em">add</i>
                                        <span style="font-size: .8em">افزودن </span>
                                    </button>
                                </label>
                                <select id="service_type" class="form-control show-tick" name="service_type" onchange="showRelatedForm(this)" multiple>
                                    <option value=""> -- لطفا انتخاب کنید -- </option>
                                    <option value="1"> بلیط هواپیما </option>
                                    <option value="2"> بلیط قطار </option>
                                    <option value="3"> تور پکیج آژانس های همکار </option>
                                    <option value="4"> خدمات اخذ ویزا </option>
                                    <option value="5"> خدمات بیمه مسافر </option>
                                    <option value="6"> پیکاپ </option>
                                    <option value="7"> هتل </option>
                                    <option value="8"> دارالترجمه </option>
                                    <option value="9"> ترانسفر در اختیار </option>
                                </select>
                            </div>


                            <div class="form-group form-float">
                                <span class="font-24 col-red">*</span>
                                <label for="provider" class="form-label">کارگزار </label>
                                <select id="provider" class="form-control show-tick" name="provider">
                                    <option value=""> -- لطفا انتخاب کنید -- </option>
                                    @foreach($providers as $provider)
                                        <option value="{{ $provider->id }}"
                                        @if($provider->id == old('provider'))
                                            {{ 'selected' }}
                                                @endif
                                        >
                                            {{ $provider->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-float">
                                <span class="font-24 col-red">*</span>
                                <div class="form-line">
                                    <input type="text" id="purchase_amount" class="form-control" name="purchase_amount" value="{{ old('purchase_amount') }}">
                                    <label for="purchase_amount" class="form-label"> مبلغ خرید </label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <span class="font-24 col-red">*</span>
                                <div class="form-line">
                                    <input type="text" id="selling_amount" class="form-control" name="selling_amount" value="{{ old('selling_amount') }}">
                                    <label for="selling_amount" class="form-label"> مبلغ فروش </label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="discount_amount" class="form-control" name="discount_amount" value="{{ old('discount_amount') }}">
                                    <label for="discount_amount" class="form-label"> مبلغ تخفیف </label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <span class="font-24 col-red">*</span>
                                {{--<span class="font-bold">تصویر فیش پرداختی</span>--}}
                                {{--<input type="text" id="receipt_pic" class="form-control" name="receipt_pic">--}}

                                <label for="service_type" class="form-label">تصویر فیش پرداختی </label>
                                <input id="receipt_pic" name="receipt_pic" value="{{ old('receipt_pic') }}" type="file" multiple />
                            </div>

                            <div id="service_form">
                                @if(isset($services))
                                    @include('app.forms.service-form')
                                @endif
                            </div>

                            <br>
                            @endslot
                            @endcomponent
                        </div>

                        <div role="tabpanel" class="tab-pane animated flipInX" id="contract_information">
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
                                            <input type="text" id="document_number" class="form-control" name="document_number" value="{{ old('document_number') }}">
                                            <label for="document_number" class="form-label"> شماره سند </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="document_date" class="form-control datePicker" name="document_date" value="{{ old('document_date') }}">
                                            <label for="document_date" class="form-label"> تاریخ سند </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="document_name" class="form-control" name="document_name" value="{{ old('document_name') }}">
                                            <label for="document_name" class="form-label"> نام سند </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="contract_b_date" class="form-control datePicker" name="contract_b_date" value="{{ old('contract_b_date') }}">
                                            <label for="contract_b_date" class="form-label"> از تاریخ </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="contract_e_date" class="form-control datePicker" name="contract_e_date" value="{{ old('contract_e_date') }}">
                                            <label for="contract_e_date" class="form-label"> تا تاریخ </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="services_amount" class="form-control" name="services_amount" value="{{ old('services_amount') }}">
                                            <label for="services_amount" class="form-label"> مبلغ خدمات </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="total_amount" class="form-control" name="total_amount" value="{{ old('total_amount') }}">
                                            <label for="total_amount" class="form-label"> مبلغ کلی فروش </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="contract_type" class="form-control" name="contract_type" value="{{ old('contract_type') }}">
                                            <label for="contract_type" class="form-label"> نوع قرارداد </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="currency" class="form-control" name="currency" value="{{ old('currency') }}">
                                            <label for="currency" class="form-label"> ارز </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="currency_sum" class="form-control" name="currency_sum" value="{{ old('currency_sum') }}">
                                            <label for="currency_sum" class="form-label"> جمع مبلغ ارزی </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="total_currency_amount" class="form-control" name="total_currency_amount" value="{{ old('total_currency_amount') }}">
                                            <label for="total_currency_amount" class="form-label"> مبلغ ارزی کل </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="customer_code" class="form-control" name="customer_code" value="{{ old('customer_code') }}">
                                            <label for="customer_code" class="form-label"> کد مشتری </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="description" rows="4" class="form-control no-resize" placeholder="توضیحات"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endslot
                            @endcomponent
                        </div>

                        <div role="tabpanel" class="tab-pane animated flipInX" id="customer_information">
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
                                            <input type="text" id="passenger_code.0" class="form-control" name="passenger_code[]" value="{{ old('passenger_code[0]') }}">
                                            <label for="passenger_code.0" class="form-label"> کد مسافر </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="first_name.0" class="form-control" name="first_name[]" value="{{ old('first_name[0]') }}">
                                            <label for="first_name.0" class="form-label"> نام </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="last_name.0" class="form-control" name="last_name[]" value="{{ old('last_name[0]') }}">
                                            <label for="last_name.0" class="form-label"> نام خانوادگی </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="phone_number.0" class="form-control" name="phone_number[]" value="{{ old('phone_number[0]') }}">
                                            <label for="phone_number.0" class="form-label"> شماره تماس </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="form-group form-float">
                                        <span class="font-24 col-red">*</span>
                                        <div class="form-line">
                                            <input type="text" id="national_code.0" class="form-control" name="national_code[]" value="{{ old('national_code[0]') }}">
                                            <label for="national_code.0" class="form-label"> کد ملی </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="e_first_name.0" class="form-control" name="e_first_name[]" value="{{ old('e_first_name[0]') }}">
                                            <label for="e_first_name.0" class="form-label"> نام انگلیسی </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="e_last_name.0" class="form-control" name="e_last_name[]" value="{{ old('e_last_name[0]') }}">
                                            <label for="e_last_name.0" class="form-label"> نام خانوادگی انگلیسی </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="father_name.0" class="form-control" name="father_name[]" value="{{ old('father_name[0]') }}">
                                            <label for="father_name.0" class="form-label"> نام پدر </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="email.0" class="form-control" name="email[]" value="{{ old('email[0]') }}">
                                            <label for="email.0" class="form-label"> ایمیل </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="birthday.0" class="form-control datePicker" name="birthday[]" value="{{ old('birthday[0]') }}">
                                            <label for="birthday.0" class="form-label"> تاریخ تولد </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="passport_number.0" class="form-control" name="passport_number[]" value="{{ old('passport_number[0]') }}">
                                            <label for="passport_number.0" class="form-label"> شماره پاسپورت </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="passport_expire_date.0" class="form-control datePicker" name="passport_expire_date[]" value="{{ old('passport_expire_date[0]') }}">
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
                        </div>
                    </div>
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

            $("#add-service").on('click', function () {
                var selectedServices = services.join(',');

                window.location = baseUrl + '/counter/sales/create?services=' + selectedServices;
            });

        });

        var services = [];

        function showRelatedForm(form) {
            var baseUrl = window.location.origin;

            services = $(form).val();
//            console.log(services);

//            $.ajax({
//                url: baseUrl + '/api/sales/forms/' + formId,
//                heders: {"Access-Control-Allow-Origin": "*"},
//                type: 'GET',
//                success: function (data) {
//                    $("#service_form").html(data);
//                    window.recalc();
//                }
//            });

//            window.location = baseUrl + '/counter/sales/create?service=' + formId;
        }
    </script>
@endsection