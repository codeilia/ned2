@extends('layouts.app.master')

@section('title', 'ثبت مرخصی')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons">playlist_add</i> ثبت مرخصی
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
            ثبت اضافه خدمت
            @endslot

            @slot('body')
            <form action="{{ route('extraDuties.store') }}" method="post">
                {{ csrf_field() }}

                <div class="row" style="margin-top: 2rem">
                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="days" class="form-control" name="days" value="{{ old('days') }}">
                                <label for="days" class="form-label"> اضافه </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="void_duty" class="form-control" name="void_duty" value="{{ old('void_duty') }}">
                                <label for="void_duty" class="form-label"> خلاء(روز)‌ </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="reason" class="form-control" name="reason" value="{{ old('reason') }}">
                                <label for="reason" class="form-label"> علت</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" style="bottom: 2.5rem;">
                        <div class="form-group form-float">
                            <label for="soldier" class="form-label">سرباز </label>
                            <select id="soldier" class="form-control show-tick" name="soldier" data-live-search="true">
                                <option value=""> -- لطفا انتخاب کنید -- </option>
                                @foreach($soldiers as $soldier)
                                    <option value="{{ $soldier->id }}" {{ $soldier->id == $selectedSoldier ? 'selected' : '' }}>
                                        {{ $soldier->first_name }} {{ $soldier->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت</button>
            </form>
            @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
    {{--<script>--}}
        {{--$(window).bind('load', function () {--}}
            {{--var baseUrl = window.location.origin;--}}

            {{--$("#province").on('change', function () {--}}
                {{--var provinceId = $(this).val();--}}

                {{--window.location= baseUrl + '/admin/branches/create?province=' + provinceId;--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endsection