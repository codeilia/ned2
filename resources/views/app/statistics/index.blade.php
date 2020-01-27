@extends('layouts.app.master')

@section('title', 'آمار تفکیکی سربازان')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i>آمار تفکیکی سربازان
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
                    آمار تفکیکی سربازان
                @endslot

                @slot('body')
                        <table class="table table-bordered table-striped table-hover dataTable" id="searchableTable">
                        <thead>
                        <tr>
                            @foreach($columns as $column)
                                @if(array_key_exists($column, trans('nedsa.martialInfo')))
                                    <th class="text-center">{{ trans("nedsa.martialInfo.$column") }}</th>
                                @elseif(array_key_exists($column, trans('nedsa.leaveInfo')))
                                    <th class="text-center">{{trans("nedsa.leaveInfo.$column") }}</th>
                                @else
                                    <th class="text-center">{{ trans("nedsa.$column") }}</th>
                                @endif
                            @endforeach
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($soldiers as $index => $soldier)
                            <tr>
                                @foreach($columns as $column)
                                    @if(array_key_exists($column, trans('nedsa.martialInfo')) && $soldier->martialInfo)
                                    <td class="text-center">{{ $soldier->martialInfo->$column }}</td>
                                    @elseif(array_key_exists($column, trans('nedsa.leaveInfo')) && $soldier->leaveInfo)
                                        <td class="text-center">{{ $soldier->leaveInfo->$column }}</td>
                                    @else
                                    <td class="text-center">{{ $soldier->$column }}</td>
                                    @endif
                                @endforeach
                                <td class="text-center">
                                    <ul class="header-dropdown ">
                                        <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('martialInfos.edit', ['soldier' => $soldier->id]) }}">اطلاعات نظامی</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('leaveInfos.edit', ['soldier' => $soldier->id]) }}">اطلاعات مرخصی</a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('leaves.index', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>لیست مرخصی ها</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('absences.index', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>لیست غیبت ها</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('leaves.create', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>ثبت مرخصی</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('absences.create', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>ثبت غیبت</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('extraDuties.create', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>ثبت اضافه خدمت</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('voidDuties.create', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>ثبت خلاء خدمت</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('soldiers.edit', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>ویرایش</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('soldiers.destroy', ['soldier' => $soldier->id]) }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form.{{ $index }}').submit();">
                                                        <span>حذف</span>
                                                    </a>

                                                    <form id="delete-form.{{ $index }}" action="{{ route('soldiers.destroy', ['soldier' => $soldier->id]) }}" method="POST" style="display: none;">
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

@section('js')
    <script>
        //Exportable table
        $('.searchable').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            buttons: [
                'excel'
            ]
        });
    </script>
@endsection