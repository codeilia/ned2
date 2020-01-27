@extends('layouts.app.master')

@section('title', 'لیست مرخصی ها')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> لیست مرخصی ها
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
                    لیست مرخصی ها
                @endslot

                @slot('body')
                        <table class="table table-bordered table-striped table-hover dataTable" id="searchableTable">
                        <thead>
                        <tr>
                            <th class="text-center">ردیف</th>
                            <th class="text-center">سرباز</th>
                            <th class="text-center">تعداد روز</th>
                            <th class="text-center">نوع</th>
                            <th class="text-center">از تاریخ</th>
                            <th class="text-center">تا تاریخ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leaves as $index => $leave)
                            <tr>
                                <td class="text-center"> {{ $index + 1 }} </td>
                                <td class="text-center"> {{ $leave->soldier->first_name . ' '.  $leave->soldier->last_name}} </td>
                                <td class="text-center"> {{ $leave->days }} </td>
                                <td class="text-center"> {{ \App\Helpers\Mapper::mapLeave($leave->type) }} </td>
                                <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($leave->from) }}</td>
                                <td class="text-center" style="direction: ltr;">{{ CustomDateTime::toJalali($leave->to) }}</td>

                                <td class="text-center">
                                    <ul class="header-dropdown ">
                                        <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{
                                                            route('leaves.edit', ['leave' => $leave->id])
                                                         }}">
                                                        <span>ویرایش</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('leaves.destroy', ['leave' => $leave->id]) }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form.{{ $index }}').submit();">
                                                        <span>حذف</span>
                                                    </a>

                                                    <form id="delete-form.{{ $index }}" action="{{ route('leaves.destroy', ['leave' => $leave->id]) }}" method="POST" style="display: none;">
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
                    {{  $leaves }}
                @endslot
            @endcomponent
        </div>
    </div>
@endsection