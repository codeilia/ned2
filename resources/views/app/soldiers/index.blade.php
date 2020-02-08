@extends('layouts.app.master')

@section('title', 'لیست سربازها')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">assignment</i> لیست سربازها
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
                    لیست سربازها
                @endslot

                @slot('body')
                        <table class="table table-bordered table-striped table-hover dataTable" id="searchableTable">
                        <thead>
                        <tr>
                            {{--<th class="text-center">ردیف</th>--}}
                            <th class="text-center">شماره پرونده</th>
                            <th class="text-center">وضعیت پرونده</th>
                            <th class="text-center">نام</th>
                            <th class="text-center">نام خانوادگی</th>
                            <th class="text-center">نام پدر</th>
                            <th class="text-center">کد ملی</th>
                            <th class="text-center">تاریخ تولد</th>
                            <th class="text-center">محل صدور</th>
                            <th class="text-center">وضعیت تاهل</th>
                            <th class="text-center">تحصیلات</th>
                            <th class="text-center">اطلاعات اضافی</th>
                            <th class="text-center">عملیات</th>
                            {{--<th class="text-center">مذهب</th>--}}
                            {{--<th class="text-center">قد</th>--}}
                            {{--<th class="text-center">وزن</th>--}}

                            {{--<th class="text-center">رشته تحصیلی</th>--}}
                            {{--<th class="text-center">استان</th>--}}
                            {{--<th class="text-center">گروه خونی</th>--}}
                            {{--<th class="text-center">کد پستی</th>--}}
                            {{--<th class="text-center">آدرس</th>--}}
                            {{--<th class="text-center">تاریخ ایجاد</th>--}}
                            {{--<th class="text-center">تاریخ ویرایش</th>--}}
                            {{--<th class="text-center">تاریخ ویرایش</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($soldiers as $index => $soldier)
                            <tr>
                                {{--<td class="text-center"> {{ $index + 1 }} </td>--}}
                                <td class="text-center"> {{ $soldier->document_code }} </td>
                                <td class="text-center"> {{ $soldier->document_status }} </td>
                                <td class="text-center"> {{ $soldier->first_name }} </td>
                                <td class="text-center"> {{ $soldier->last_name }} </td>
                                <td class="text-center"> {{ $soldier->father_name }} </td>
                                <td class="text-center"> {{ $soldier->national_code }} </td>
                                <td class="text-center" style="direction: ltr;">{{ $soldier->birthday }}</td>
                                <td class="text-center"> {{ $soldier->issue_place }} </td>
                                <td class="text-center"> {{ $soldier->married ? 'متاهل' : 'مجرد' }} </td>
                                <td class="text-center"> {{ $soldier->educations }} </td>

                                {{--<td class="text-center"> {{ $soldier->religion }} </td>--}}
                                {{--<td class="text-center"> {{ $soldier->height }} </td>--}}
                                {{--<td class="text-center"> {{ $soldier->weight }} </td>--}}

                                <td class="text-center">
                                    <button type="button" class="btn btn-primary waves-effect" data-type="basic" data-toggle="modal" data-target="#largeModal-{{$index}}">کلیک کنید</button>
                                    <div class="modal fade" id="largeModal-{{$index}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" style="width: 100%"  role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="largeModalLabel">اطلاعات اضافی</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-striped text-center ">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">ردیف</th>
                                                            <th class="text-center">قد</th>
                                                            <th class="text-center">وزن</th>
                                                            <th class="text-center">رشته تحصیلی</th>
                                                            <th class="text-center">تخصص</th>
                                                            <th class="text-center">استان محل سکونت</th>
                                                            <th class="text-center">گروه خونی</th>
                                                            <th class="text-center">کد پستی</th>
                                                            <th class="text-center">آدرس</th>
                                                            <th class="text-center">بومی/غیربومی</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-center"> {{ $index + 1 }} </td>
                                                            <td class="text-center"> {{ $soldier->height }} </td>
                                                            <td class="text-center"> {{ $soldier->weight }} </td>
                                                            <td class="text-center"> {{ $soldier->study_field }} </td>
                                                            <td class="text-center"> {{ $soldier->expertise }} </td>
                                                            <td class="text-center"> {{ $soldier->province }} </td>
                                                            <td class="text-center"> {{ $soldier->blood_type }} </td>
                                                            <td class="text-center" style="direction: ltr;">{{ $soldier->post_code }}</td>
                                                            <td class="text-center"> {{ $soldier->address }} </td>
                                                            @php
                                                                if ($soldier->martialInfo)
                                                                    $native = $soldier->martialInfo->native ?
                                                                    'بومی' :
                                                                     'غیر بومی';
                                                                if (!$soldier->martialInfo)
                                                                    $native = '';
                                                            @endphp
                                                            <td class="text-center"> {{ $native }} </td>
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link waves-effect"> ذخیره تغیرات </button>
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">بستن</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <td class="text-center">
                                    <ul class="header-dropdown ">
                                        <li style="position: absolute; left: 30px; list-style: none;" class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('martialInfos.edit', [$soldier]) }}">اطلاعات نظامی</a>
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
                                                            route('shortages.index', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>کسری ها</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('shortages.create', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>ثبت کسری</span>
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
                                                            route('soldiers.estelam', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>استعلام</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('form-111', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>فرم ۱۱۱</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                            route('soldiers.archiveForm', ['soldier' => $soldier->id])
                                                         }}">
                                                        <span>بایگانی</span>
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