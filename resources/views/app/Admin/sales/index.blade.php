@extends('layouts.app.master')

@section('title', 'لیست فروش ها')

@section('css')
    <link href="{{ URL::asset('admin-dashboard/plugins/light-gallery/css/lightgallery.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin-dashboard/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
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
            <i class="material-icons rtlIcon">shopping_cart</i> لیست فروش ها
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
            لیست فروش ها
            @endslot

            @slot('body')
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
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
                @foreach($sales as $index => $sale)
                    <tr>
                        <td class="text-center"> {{ $index + 1 }} </td>
                        <td class="text-center"> {{ $sale->provider->name }} </td>
                        <td class="text-center"> {{ $sale->customer->first_name }} {{ $sale->customer->last_name }}</td>
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

                        @if($sale->verified == 0)
                            @php($color = '')
                        @endif

                        @if($sale->verified == 1)
                            @php($color = 'col-green')
                        @endif

                        @if($sale->verified == 2)
                            @php($color = 'col-red')
                        @endif

                        <td class="text-center {{ $color }}">
                            @if($sale->verified == 1)
                                <spane>تایید شده</spane>
                            @endif

                            @if($sale->verified == 0)
                                <spane>تایید نشده</spane>
                            @endif

                            @if($sale->verified == 2)
                                <spane>رد شده</spane>
                            @endif
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
                                            {{--<a href="{{--}}
                                                    {{--route('counter.sales.approve', ['sale' => $sale->id])--}}
                                                {{--}}">--}}
                                                {{--<span>تایید</span>--}}
                                            {{--</a>--}}
                                            <a data-type="prompt" onclick="rejectSale({{ $sale->id }})">رد</a>
                                        </li>

                                        <li>
                                            <a href="{{
                                                    route('admin.sales.approve', ['sale' => $sale->id])
                                                }}">
                                                <span>رد</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{
                                                    route('admin.sales.edit', ['sale' => $sale->id])
                                                }}">
                                                <span>ویرایش</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('admin.sales.destroy', ['sale' => $sale->id]) }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('delete-form.{{ $index }}').submit();">
                                                <span>حذف</span>
                                            </a>

                                            <form id="delete-form.{{ $index }}" action="{{ route('counter.sales.destroy', ['sale' => $sale->id]) }}" method="POST" style="display: none;">
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
            {{  $sales }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('/admin-dashboard/plugins/light-gallery/js/lightgallery-all.js') }}"></script>
    <script src="{{ URL::asset('/admin-dashboard/js/pages/medias/image-gallery.js') }}"></script>
    <script src="{{ URL::asset('/admin-dashboard/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script >
        $(window).bind('load', function() {
            $(".lightgallery").lightGallery();
        });

        var baseUrl = window.location.origin;

        function rejectSale(saleId) {
            swal({
                title: "رد قرارداد",
                text: "یک دلیل برای رد قرارداد فروش بنویسید",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "دلیل رد قرارداد"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("دلیل رد قرارداد فروش نمیتواند خالی باشد"); return false
                }

                $.ajax({
                    url: baseUrl + '/admin/sales/' + saleId + '/reject',
                    heders: {
                        "Access-Control-Allow-Origin": "*"
                    },
                    type: 'post',
                    dataType: 'json',
                    data: {
                      reason: inputValue,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.rejected === true)
                            swal("انجام شد", data.message, "success");
                        else
                            swal("متاسفیم مشکل داخلی پیش آمد!");

                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    }
                });

            });
        }
    </script>
@endsection