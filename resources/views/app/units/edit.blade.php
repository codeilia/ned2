@extends('layouts.app.master')

@section('title', 'ویرایش معاونت')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons">playlist_add</i> ویرایش معاونت
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
                     ویرایش معاونت
                @endslot

                @slot('body')
                    <form action="{{ route('units.update', ['unit' => $unit->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="row" style="margin-top: 2rem">
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="title" value="{{ $unit->title }}">
                                        <label for="title" class="form-label"> عنوان معاونت</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="yearly_max" class="form-control" name="yearly_max" value="{{ $unit->yearly_max }}">
                                        <label for="yearly_max" class="form-label"> سقف در سال جاری</label>
                                    </div>
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