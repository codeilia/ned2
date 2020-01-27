@extends('layouts.app.master')

@section('title', 'لیست پرداخت های کارگزاران')

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
                <i class="material-icons">attach_money</i> واحد مالی
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">payment</i> لیست پرداخت های کارگزاران
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
            لیست پرداخت های کارگزاران
            @endslot

            @slot('body')
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
                    <th class="text-center">کد کارگزار</th>
                    <th class="text-center">نام کارگزار</th>
                    <th class="text-center"> مبلغ پرداخت شده </th>
                    <th class="text-center"> تصویر فیش پرداختی </th>
                    <th class="text-center"> پرداخت کننده </th>
                    <th class="text-center"> تاریخ ثبت پرداخت </th>
                    <th class="text-center"> تاریخ ویرایش پرداخت </th>
                </tr>
                </thead>
                <tbody>
                @foreach($providerPayments as $index => $providerPayment)
                    <tr>
                        <td class="text-center"> {{ $index + 1 }} </td>
                        <td class="text-center"> {{ $providerPayment->provider->code }} </td>
                        <td class="text-center">{{ $providerPayment->provider->name }}</td>
                        <td class="text-center">{{ $providerPayment->amount }}</td>
                        <td class="text-center lightgallery">
                            <a href="{{ Storage::url($providerPayment->receipt_pic) }}" data-sub-html="تصویر فیش پرداختی">
                                <button type="button" class="btn bg-light-blue btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="material-icons">image</i>
                                </button>
                            </a>
                        </td>
                        <td class="text-center">
                            {{ $providerPayment->user->details->first_name }} {{ $providerPayment->user->details->last_name }}
                        </td>
                        <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($providerPayment->created_at) }}</td>
                        <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($providerPayment->updated_at) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endslot
            @endcomponent

            @component('layouts.app.components.paginator')
            @slot('data')
            {{  $providerPayments }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('/admin-dashboard/plugins/light-gallery/js/lightgallery-all.js') }}"></script>
    <script src="{{ URL::asset('/admin-dashboard/js/pages/medias/image-gallery.js') }}"></script>
    <script >
        $(window).bind('load', function() {
            $(".lightgallery").lightGallery();
        });
    </script>
@endsection