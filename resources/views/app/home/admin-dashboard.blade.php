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
    <div class="row clearfix">
        @include('app.home.Admin.counts.index')
    </div>


@endsection