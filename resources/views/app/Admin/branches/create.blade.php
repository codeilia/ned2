@extends('layouts.app.master')

@section('title', 'ایجاد شعبه جدید')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li>
            <a href="{{ route('admin.providers.index') }}">
                <i class="material-icons">device_hub</i> شعب
            </a>
        </li>

        <li class="active">
            <i class="material-icons">playlist_add</i> افزودن شعبه جدید
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
            ثبت شعبه جدید در سیستم
            @endslot

            @slot('body')
            <form action="{{ route('admin.branches.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group form-float">
                    <label for="province" class="form-label">استان </label>
                    <select id="province" class="form-control show-tick" name="province">
                        <option value=""> -- لطفا انتخاب کنید -- </option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}"
                            @if($province->id == old('province') || $selectedProvinceId === $province->id)
                                {{ 'selected' }}
                                    @endif
                            >
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="cities" class="form-group form-float">
                    <label for="city" class="form-label">شهر </label>
                    <select id="city" class="form-control show-tick" name="city" >
                        <option value=""> -- لطفا انتخاب کنید -- </option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                            @if($city->id == old('city'))
                                {{ 'selected' }}
                                    @endif
                            >
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                        <label for="name" class="form-label"> نام شعبه</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="code" class="form-control" name="code" value="{{ old('code') }}">
                        <label for="code" class="form-label"> کد شعبه </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="address" class="form-control" name="address" value="{{ old('address') }}">
                        <label for="address" class="form-label"> آدرس </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="post_code" class="form-control" name="post_code" value="{{ old('post_code') }}">
                        <label for="post_code" class="form-label"> کد پستی </label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت</button>
            </form>
            @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(window).bind('load', function () {
            var baseUrl = window.location.origin;

            $("#province").on('change', function () {
                var provinceId = $(this).val();

                window.location= baseUrl + '/admin/branches/create?province=' + provinceId;
            });
        })
    </script>
@endsection