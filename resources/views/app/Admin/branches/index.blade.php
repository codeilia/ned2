@extends('layouts.app.master')

@section('title', 'لیست شعبه ها')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <i class="material-icons rtlIcon">device_hub</i> شعب
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> لیست شعب
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
                لیست شعبه ها
                @endslot

                @slot('body')
                <table class="table table-striped text-center ">
                    <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">نام شعبه</th>
                        <th class="text-center">کد شعبه</th>
                        <th class="text-center">آدرس</th>
                        <th class="text-center">کد پستی</th>
                        <th class="text-center">آمار فروش</th>
                        <th class="text-center">تاریخ ثبت</th>
                        <th class="text-center">تاریخ ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($branches as $index => $branch)
                        <tr>
                            <td class="text-center"> {{ $index + 1 }} </td>
                            <td class="text-center"> {{ $branch->name }} </td>
                            <td class="text-center">{{ $branch->code }}</td>
                            <td class="text-center">{{ $branch->address }}</td>
                            <td class="text-center">{{ $branch->post_code }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.branches.sale.stat', ['branch' => $branch->id]) }}" type="button" class="btn bg-blue waves-effect">
                                    <i class="material-icons">insert_chart</i>
                                </a>
                            </td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($branch->created_at) }}</td>
                            <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($branch->updated_at) }}</td>
                            <td class="text-center">
                                <ul class="header-dropdown ">
                                    <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{
                                                            route('admin.branches.edit', ['branch' => $branch->id])
                                                         }}">
                                                    <span>ویرایش</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('admin.branches.destroy', ['branch' => $branch->id]) }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('delete-form.{{ $index }}').submit();">
                                                    <span>حذف</span>
                                                </a>

                                                <form id="delete-form.{{ $index }}" action="{{ route('admin.branches.destroy', ['branch' => $branch->id]) }}" method="POST" style="display: none;">
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
            {{  $branches }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection