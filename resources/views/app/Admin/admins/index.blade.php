@extends('layouts.app.master')

@section('title', 'لیست کانتر ها')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <i class="material-icons rtlIcon">people</i> کارمندان
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> لیست مدیرها
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
                لیست مدیر ها
                @endslot

                @slot('body')
                <table class="table table-striped text-center ">
                    <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">نام</th>
                        <th class="text-center">نام خانوادگی</th>
                        <th class="text-center">نام پدر</th>
                        <th class="text-center">نام کاربری</th>
                        <th class="text-center">کد پرسنلی</th>
                        <th class="text-center">کد ملی</th>
                        <th class="text-center">تاریخ تولد</th>
                        <th class="text-center">تاریخ ثبت</th>
                        <th class="text-center">تاریخ ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $index => $admin)
                        <tr>
                            <td class="text-center"> {{ $index + 1 }} </td>
                            <td class="text-center"> {{ $admin->details->first_name }} </td>
                            <td class="text-center"> {{ $admin->details->last_name }} </td>
                            <td class="text-center"> {{ $admin->details->father_name }} </td>
                            <td class="text-center"> {{ $admin->username }} </td>
                            <td class="text-center">{{ $admin->personal_code }}</td>
                            <td class="text-center">{{ $admin->details->national_code }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($admin->birthday) }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($admin->created_at) }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($admin->updated_at) }}</td>
                            <td class="text-center">
                                <ul class="header-dropdown ">
                                    <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{
                                                            route('admin.admins.edit', ['admin' => $admin->id])
                                                         }}">
                                                    <span>ویرایش</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('admin.admins.destroy', ['admin' => $admin->id]) }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('delete-form.{{ $index }}').submit();">
                                                    <span>حذف</span>
                                                </a>

                                                <form id="delete-form.{{ $index }}" action="{{ route('admin.admins.destroy', ['admin' => $admin->id]) }}" method="POST" style="display: none;">
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
            {{  $admins }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection