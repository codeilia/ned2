@extends('layouts.app.master')

@section('title', 'واحد ها و معاونت ها')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> لیست واحد ها و معاونت ها
        </li>
    </ol>
@endsection

@section('content')
    @include('layouts.app.components.errors')

    @include('layouts.app.components.alert')

    {{-- TODO: Check for empty model here--}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction: rtl;">
            @component('layouts.app.components.basic-simple-card')
                @slot('title')
                    لیست واحد ها و معاونت ها
                @endslot

                @slot('body')
                        {{--<div class="row" style="padding-bottom: 2rem;">--}}
                            {{--<span class="col-md-2">ستون های نمایشی: </span>--}}
                            {{--<div class="col-md-2 text-center t-column" data-column="0" data-vis="1">--}}
                                {{--<input type="checkbox" class="filled-in" id="ig_checkbox" checked>--}}
                                {{--<label for="ig_checkbox">ردیف</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-2 text-center t-column" data-column="1" data-vis="1">--}}
                                {{--<input type="checkbox" class="filled-in" id="ig_checkbox" checked>--}}
                                {{--<label for="ig_checkbox">نام واحد</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-2 text-center t-column" data-column="2" data-vis="1">--}}
                                {{--<input type="checkbox" class="filled-in" id="ig_checkbox" checked>--}}
                                {{--<label for="ig_checkbox">کد</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <table class="table table-bordered table-striped table-hover dataTable" id="searchableTable">
                        <thead>
                        <tr>
                            <th class="text-center">ردیف</th>
                            <th class="text-center">نام واحد</th>
                            <th class="text-center">کد</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th class="text-center">ردیف</th>
                            <th class="text-center">نام واحد</th>
                            <th class="text-center">کد</th>
                            <th class="text-center"></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($units as $index => $unit)
                            <tr>
                                <td class="text-center"> {{ $index + 1 }} </td>
                                <td class="text-center"> {{ $unit->title }} </td>
                                <td class="text-center"> {{ $unit->code }} </td>

                                <td class="text-center">
                                    <ul class="header-dropdown ">
                                        <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{
                                                            route('units.statistics.index', ['unit' => $unit->id])
                                                         }}">
                                                        <span>آمار</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('units.edit', ['unit' => $unit->id])
                                                         }}">
                                                        <span>ویرایش</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('units.destroy', ['unit' => $unit->id]) }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form.{{ $index }}').submit();">
                                                        <span>حذف</span>
                                                    </a>

                                                    <form id="delete-form.{{ $index }}" action="{{ route('units.destroy', ['unit' => $unit->id]) }}" method="POST" style="display: none;">
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
                @endslot
            @endcomponent
        </div>
    </div>
@endsection