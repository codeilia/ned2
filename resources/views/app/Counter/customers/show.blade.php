@extends('layouts.app.master')

@section('title', 'نمایش اطلاعات مشتری')

@section('css')
    <link href="{{ URL::asset('admin-dashboard/plugins/light-gallery/css/lightgallery.css') }}" rel="stylesheet">
@endsection


@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <i class="material-icons rtlIcon">border_color</i> مشریان
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">shopping_cart</i> نمایش اطلاعات مشتری
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    {{-- TODO: Check for empty model here--}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('layouts.app.components.basic-simple-card')
            @slot('title')
            اطلاعات مشتری
            @endslot

            @slot('body')
            <h5 class="col-grey">مشخصات مشتری اصلی</h5>
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center col-teal">کد مسافر</th>
                    <th class="text-center col-teal">نام</th>
                    <th class="text-center col-teal">نام خانوادگی </th>
                    <th class="text-center col-teal">نام انگلیسی</th>
                    <th class="text-center col-teal">نام خانوادگی انگلیسی </th>
                    <th class="text-center col-teal"> نام پدر </th>
                    <th class="text-center col-teal"> شماره تماس</th>
                    <th class="text-center col-teal"> ایمیل </th>
                    <th class="text-center col-teal">تاریخ تولد</th>
                    <th class="text-center col-teal">کد ملی</th>
                    <th class="text-center col-teal">شماره پاسپورت</th>
                    <th class="text-center col-teal">خرید ها</th>
                    <th class="text-center col-teal">تاریخ انقضای پاسپورت</th>
                    <th class="text-center col-teal">تاریخ ثبت در سیستم</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center"> {{ $customer->passenger_code }} </td>
                    <td class="text-center"> {{ $customer->first_name }} </td>
                    <td class="text-center"> {{ $customer->last_name }} </td>
                    <td class="text-center"> {{ $customer->e_first_name }} </td>
                    <td class="text-center"> {{ $customer->e_last_name }} </td>
                    <td class="text-center"> {{ $customer->father_name }} </td>
                    <td class="text-center"> {{ $customer->phone_number }} </td>
                    <td class="text-center"> {{ $customer->email }} </td>
                    <td class="text-center"> {{ CustomDateTime::toJalali($customer->birthday) }} </td>
                    <td class="text-center"> {{ $customer->national_code }} </td>
                    <td class="text-center"> {{ $customer->passport_number }} </td>
                    <td class="text-center">
                        <a class="btn bg-yellow waves-effect" href="{{ route('counter.customers.sales.index', ['customer' => $customer->id]) }}">
                            <i class="material-icons">assignment</i>
                        </a>
                    </td>
                    <td class="text-center"> {{ CustomDateTime::toJalali($customer->passport_expire_date) }} </td>
                    <td class="text-center"> {{ CustomDateTime::toJalali($customer->created_at) }} </td>
                    <td class="text-center">
                        <ul class="header-dropdown ">
                            <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{
                                                        route('counter.customers.edit', ['customer' => $customer->id])
                                                    }}">
                                            <span>ویرایش</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('counter.customers.destroy', ['customer' => $customer->id]) }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('delete-form.-1').submit();">
                                            <span>حذف</span>
                                        </a>

                                        <form id="delete-form.-1" action="{{ route('counter.customers.destroy', ['customer' => $customer->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>

            <br><hr style="border-top: 5px solid #eee;"><br>

            <h5 class="col-grey">مشخصات سایر مشتریان وابسته به این مشتری</h5>
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center col-teal">ردیف</th>
                    <th class="text-center col-teal">کد مسافر</th>
                    <th class="text-center col-teal">نام</th>
                    <th class="text-center col-teal">نام انگلیسی</th>
                    <th class="text-center col-teal">نام خانوادگی </th>
                    <th class="text-center col-teal">نام خانوادگی انگلیسی </th>
                    <th class="text-center col-teal"> نام پدر </th>
                    <th class="text-center col-teal"> شماره تماس</th>
                    <th class="text-center col-teal"> ایمیل </th>
                    <th class="text-center col-teal">تاریخ تولد</th>
                    <th class="text-center col-teal">کد ملی</th>
                    <th class="text-center col-teal">شماره پاسپورت</th>
                    <th class="text-center col-teal">تاریخ انقضای پاسپورت</th>
                    <th class="text-center col-teal">تاریخ ثبت در سیستم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subCustomers as $index => $subCustomer)
                    <tr>
                        <td class="text-center"> {{ $index + 1 }} </td>
                        <td class="text-center"> {{ $subCustomer->passenger_code }} </td>
                        <td class="text-center"> {{ $subCustomer->first_name }} </td>
                        <td class="text-center"> {{ $subCustomer->last_name }} </td>
                        <td class="text-center"> {{ $subCustomer->e_first_name }} </td>
                        <td class="text-center"> {{ $subCustomer->e_last_name }} </td>
                        <td class="text-center"> {{ $subCustomer->father_name }} </td>
                        <td class="text-center"> {{ $subCustomer->phone_number }} </td>
                        <td class="text-center"> {{ $subCustomer->email }} </td>
                        <td class="text-center"> {{ CustomDateTime::toJalali($subCustomer->birthday) }} </td>
                        <td class="text-center"> {{ $subCustomer->national_code }} </td>
                        <td class="text-center"> {{ $subCustomer->passport_number }} </td>
                        <td class="text-center"> {{ CustomDateTime::toJalali($subCustomer->passport_expire_date) }} </td>
                        <td class="text-center"> {{ CustomDateTime::toJalali($subCustomer->created_at) }} </td>
                        <td class="text-center">
                            <ul class="header-dropdown ">
                                <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{
                                                    route('counter.customers.edit', ['customer' => $subCustomer->id])
                                                }}">
                                                <span>ویرایش</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('counter.customers.destroy', ['customer' => $subCustomer->id]) }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('delete-form.{{ $index }}').submit();">
                                                <span>حذف</span>
                                            </a>

                                            <form id="delete-form.{{ $index }}" action="{{ route('counter.customers.destroy', ['customer' => $subCustomer->id]) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>

                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endslot
            @endcomponent

            @component('layouts.app.components.paginator')
            @slot('data')
            {{  $subCustomers }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('/admin-dashboard/plugins/light-gallery/js/lightgallery-all.js') }}"></script>
    <script src="{{ URL::asset('/admin-dashboard/js/pages/medias/image-gallery.js') }}"></script>
    <script src="{{ URL::asset('/admin-dashboard/js/admin.js') }}"></script>
    <script >
        $(window).bind('load', function() {
            $(".lightgallery").lightGallery();
        });
    </script>
@endsection