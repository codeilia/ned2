@extends('layouts.app.master')

@section('title', 'نمایش اطلاعات فروش')

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
                <i class="material-icons rtlIcon">border_color</i> قراردادها
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">shopping_cart</i>نمایش اطلاعات فروش
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
                اطلاعات فروش
                @endslot

                @slot('button')
                <a href="{{route('counter.sales.print', ['sale' => $sale->id])}}" type="button" class="btn bg-red waves-effect">
                    <i class="material-icons">print</i>
                </a>
                @endslot

                @slot('body')
                <table class="table table-striped text-center ">
                    <thead>
                    <tr>
                        <th class="text-center">کارگزار</th>
                        <th class="text-center">مشتری</th>
                        <th class="text-center">مبلغ خرید</th>
                        <th class="text-center"> مبلغ فروش</th>
                        <th class="text-center">مبلغ تخفیف</th>
                        <th class="text-center">مبلغ استرداد</th>
                        <th class="text-center">تصویر فیش پرداختی</th>
                        <th class="text-center">وضعیت تایید</th>
                        <th class="text-center">تاریخ ثبت</th>
                        <th class="text-center">تاریخ ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"> {{ $sale->provider->name }} </td>
                            <td class="text-center">
                                <a href="{{ route('counter.customers.show', ['customer' => $sale->customer->id]) }}">
                                    {{ $sale->customer->first_name }} {{ $sale->customer->last_name }}
                                </a>

                            </td>
                            <td class="text-center"> {{ $sale->purchase_amount }} </td>
                            <td class="text-center"> {{ $sale->selling_amount }} </td>
                            <td class="text-center">{{ $sale->discount_amount }}</td>
                            <td class="text-center">{{ $sale->refund_amount }}</td>
                            <td class="text-center lightgallery">
                                <a href="{{ Storage::url($sale->receipt_pic) }}" data-sub-html="تصویر فیش پرداختی">
                                    <button type="button" class="btn bg-light-blue btn-circle-lg waves-effect waves-circle waves-float">
                                        <i class="material-icons">image</i>
                                    </button>
                                </a>
                            </td>
                            <td class="text-center {{ $sale->verified == 0 ? 'col-red' : 'col-green' }}">
                                {{ $sale->verified == 1 ? 'تایید شده' : 'تایید نشده' }}
                                <br>
                                <a href="{{ route('counter.sales.show', ['sale' => $sale->id]) }}">اطلاعات بیشتر</a>
                            </td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($sale->created_at) }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($sale->updated_at) }}</td>
                            <td class="text-center">
                                <ul class="header-dropdown ">
                                    <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{
                                                        route('counter.sales.edit', ['sale' => $sale->id])
                                                    }}">
                                                    <span>ویرایش</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('counter.sales.destroy', ['sale' => $sale->id]) }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('delete-form.-1">
                                                    <span>حذف</span>
                                                </a>

                                                <form id="delete-form.-1" action="{{ route('counter.sales.destroy', ['sale' => $sale->id]) }}" method="POST" style="display: none;">
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
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('layouts.app.components.basic-simple-card')
                @slot('title')
                اطلاعات سند قرارداد
                @endslot

                @slot('body')
                <table class="table table-striped text-center ">
                    <thead>
                    <tr>
                        <th class="text-center">شماره سند</th>
                        <th class="text-center">نام سند</th>
                        <th class="text-center">تاریخ سند</th>
                        <th class="text-center">تاریخ شروع قرارداد</th>
                        <th class="text-center"> تاریخ پایان قرارداد</th>
                        <th class="text-center">تعداد روز</th>
                        <th class="text-center">تعداد شب</th>
                        <th class="text-center">مبلغ خدمات</th>
                        <th class="text-center"> جمع مبلغ ارزی</th>
                        <th class="text-center"> مبلغ کلی فروش </th>
                        <th class="text-center">ارز</th>
                        <th class="text-center">مبلغ ارزی کل</th>
                        <th class="text-center">اعتباری</th>
                        <th class="text-center">کد مشتری</th>
                        <th class="text-center">نوع قرارداد</th>
                        <th class="text-center">تاریخ ایجاد سند</th>
                        <th class="text-center">تاریخ ویرایش سند</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"> {{ $sale->contract->document_number }} </td>
                            <td class="text-center"> {{ $sale->contract->document_name }}</td>
                            <td class="text-center"> {{ $sale->contract->document_date }} </td>
                            <td class="text-center">
                                {{ CustomDateTime::toJalali($sale->contract->contract_b_date) }}
                            </td>
                            <td class="text-center">
                                {{ CustomDateTime::toJalali($sale->contract->contract_e_date) }}
                            </td>
                            <td class="text-center">{{ $sale->contract->nights }}</td>
                            <td class="text-center">{{ $sale->contract->days }}</td>
                            <td class="text-center">{{ $sale->contract->services_amount }}</td>
                            <td class="text-center">{{ $sale->contract->currency_sum }}</td>
                            <td class="text-center">{{ $sale->contract->total_amount }}</td>
                            <td class="text-center">{{ $sale->contract->currency }}</td>
                            <td class="text-center">{{ $sale->contract->total_currency_amount }}</td>
                            <td class="text-center">{{ $sale->contract->credit }}</td>
                            <td class="text-center">{{ $sale->contract->customer_code }}</td>
                            <td class="text-center">{{ $sale->contract->contract_type }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($sale->contract->created_at) }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($sale->contract->updated_at) }}</td>
                            <td class="text-center">
                                <ul class="header-dropdown ">
                                    <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{
                                                        route('counter.sales.edit', ['sale' => $sale->contract->id])
                                                    }}">
                                                    <span>ویرایش</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('counter.sales.destroy', ['sale' => $sale->contract->id]) }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('delete-form.-2').submit();">
                                                    <span>حذف</span>
                                                </a>

                                                <form id="delete-form.-2" action="{{ route('counter.sales.destroy', ['sale' => $sale->contract->id]) }}" method="POST" style="display: none;">
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