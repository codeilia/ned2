@extends('layouts.app.master')

@section('title', 'تراز معاملاتی کارگزاران')

@section('content-heading')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="material-icons rtlIcon">home</i> خانه
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <i class="material-icons rtlIcon">attach_money</i> واحد مالی
            </a>
        </li>

        <li class="active">
            <i class="material-icons rtlIcon">account_balance</i> تراز معاملاتی کارگزاران
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
                تراز معاملاتی کارگزاران
                @endslot

                @slot('body')
                <table class="table table-striped text-center ">
                    <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">کد کارگزار</th>
                        <th class="text-center">نام کارگزار</th>
                        <th class="text-center"> جمع کل خرید</th>
                        <th class="text-center"> مقدار کل پرداخت ها</th>
                        <th class="text-center"> مقدار کل بدهکاری </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tradeBalances as $index => $tradeBalance)
                        <tr>
                            <td class="text-center"> {{ $index + 1 }} </td>
                            <td class="text-center"> {{ $tradeBalance->provider->code }} </td>
                            <td class="text-center">{{ $tradeBalance->provider->name }}</td>
                            <td class="text-center">{{ $tradeBalance->purchase_amount }}</td>
                            <td class="text-center">{{ $tradeBalance->paid_amount }}</td>
                            <td class="text-center">{{ $tradeBalance->unpaid_amount }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endslot
            @endcomponent

            @component('layouts.app.components.paginator')
            @slot('data')
            {{  $tradeBalances }}
            @endslot
            @endcomponent
        </div>
    </div>
@endsection