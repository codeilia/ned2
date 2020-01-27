@extends('layouts.app.master')

@section('title', 'ایجاد کارگزار جدید')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li>
            <a href="{{ route('admin.providers.index') }}">
                <i class="material-icons">domain</i> کارگزاران
            </a>
        </li>

        <li class="active">
            <i class="material-icons">playlist_add</i> افزودن کارگزار جدید
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
            ثبت کارگزار جدید در سیستم
            @endslot

            @slot('body')
            <form action="{{ route('admin.providers.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                        <label for="name" class="form-label"> نام کارگزار</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="code" class="form-control" name="code" value="{{ old('code') }}">
                        <label for="code" class="form-label"> کد کارگزار </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="account_number" class="form-control" name="account_number" value="{{ old('account_number') }}">
                        <label for="account_number" class="form-label"> شماره حساب </label>
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