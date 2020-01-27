<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons ">attach_money</i>
        <span>واحد مالی</span>
    </a>

    <ul class="ml-menu">
        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.providers-trades')
        {{--@endif--}}

        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.provider-payments')
        {{--@endif--}}


        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.pay-to-provider')
        {{--@endif--}}
    </ul>
</li>