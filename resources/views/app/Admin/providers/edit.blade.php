@extends('layouts.app.master')

@section('title', 'ویرایش اطلاعات کارگزار')

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
            <i class="material-icons">playlist_add</i> ویرایش اطلاعات کارگزار
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
            ویریش اطلاعات کارگزار
            @endslot

            @slot('body')
            <form action="{{ route('admin.providers.update', ['provider' => $provider->id]) }}" method="post" >
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="name" class="form-control" name="name" value="{{ $provider->name }}">
                        <label for="name" class="form-label"> نام کارگزار</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="code" class="form-control" name="code" value="{{ $provider->code }}">
                        <label for="code" class="form-label"> کد کارگزار </label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="account_number" class="form-control" name="account_number" value="{{ $provider->account_number }}">
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