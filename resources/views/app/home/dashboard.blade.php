@extends('layouts.app.master')

@section('title', 'داشبورد')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons">dashboard</i> داشبورد
        </li>
    </ol>
@endsection

@section('content')
        @include('app.home.admin-dashboard')
@endsection

@section('js')
    <script src="{{ URL::asset('js/jalali-moment.browser.js') }}"></script>
    {{--<script src="{{ URL::asset('js/moment-jalaali.js') }}"></script>--}}
    {{--<script src="{{ URL::asset('js/vue-moment.min.js') }}"></script>--}}
@endsection