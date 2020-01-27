@extends('layouts.app.master')

@section('title', 'پرداخت به کارگزار')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li>
            <a href="">
                <i class="material-icons">attach_money</i> واحد مالی
            </a>
        </li>

        <li class="active">
            <i class="material-icons">monetization_on</i>پرداخت به کارگزار
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    <div class="row">
        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
            @component('layouts.app.components.basic-simple-card')
            @slot('title')
            پرداخت به کارگزار
            @endslot

            @slot('body')
            <form action="{{ route('admin.providerPayments.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

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
                    <div class="form-line">
                        <input type="text" id="amount" class="form-control" name="amount" value="{{ old('amount') }}">
                        <label for="amount" class="form-label"> مبلغ پرداخت </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <span class="font-24 col-red">*</span>
                    <label for="service_type" class="form-label">تصویر فیش پرداختی </label>
                    <input id="receipt_pic" name="receipt_pic" value="{{ old('receipt_pic') }}" type="file" />
                </div>

                <br>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت</button>
            </form>
            @endslot
            @endcomponent
        </div>
    </div>
@endsection