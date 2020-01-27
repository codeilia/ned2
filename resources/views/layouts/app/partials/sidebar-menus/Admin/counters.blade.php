<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons rtlIcon">people</i>
        <span>کارمندان</span>
    </a>

    <ul class="ml-menu">
        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.add-counter')
        {{--@endif--}}

        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.counters-list')
        {{--@endif--}}

        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.add-admin')
        {{--@endif--}}

        {{--        @if(Auth::user()->isAdmin())--}}
        @include('layouts.app.partials.sidebar-menus.Admin.admins-list')
        {{--@endif--}}
    </ul>
</li>