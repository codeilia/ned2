@extends('layouts.app.master')

@section('title', 'لیست کارگزاران')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <i class="material-icons rtlIcon">domain</i> کارگزاران
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> لیست کارگزاران
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
            لیست کارگزاران 
            @endslot

            @slot('body')
            <table class="table table-striped text-center ">
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
                    <th class="text-center">نام</th>
                    <th class="text-center">کد کارگزار</th>
                    <th class="text-center">شماره حساب</th>
                    <th class="text-center">تاریخ ثبت</th>
                    <th class="text-center">تاریخ ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($providers as $index => $provider)
                    <tr>
                        <td class="text-center"> {{ $index + 1 }} </td>
                        <td class="text-center"> {{ $provider->name }} </td>
                        <td class="text-center">{{ $provider->code }}</td>
                        <td class="text-center">{{ $provider->account_number }}</td>
                        <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($provider->created_at) }}</td>
                        <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($provider->updated_at) }}</td>
                        <td class="text-center">
                            <ul class="header-dropdown ">
                                <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{
                                                        route('admin.providers.edit', ['provider' => $provider->id])
                                                     }}">
                                                <span>ویرایش</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('admin.providers.destroy', ['provider' => $provider->id]) }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('delete-form.{{ $index }}').submit();">
                                                <span>حذف</span>
                                            </a>

                                            <form id="delete-form.{{ $index }}" action="{{ route('admin.providers.destroy', ['provider' => $provider->id]) }}" method="POST" style="display: none;">
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
            {{  $providers }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection