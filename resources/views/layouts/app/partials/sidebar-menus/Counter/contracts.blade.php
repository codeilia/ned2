<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">border_color</i>
        <span>قرارداد ها</span>
    </a>

    <ul class="ml-menu">
        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Counter.sales-list')
        {{--@endif--}}

        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Counter.contracts-list')
        {{--@endif--}}

        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Counter.register-sale')
        {{--@endif--}}
    </ul>
</li>