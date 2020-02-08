<div class="menu">
    <ul class="list">
        <li class="header">منو اصلی</li>
        @include('layouts.app.partials.sidebar-menus.home')

        @include('layouts.app.partials.sidebar-menus.Admin.providers')

        @include('layouts.app.partials.sidebar-menus.Admin.branches')

        @include('layouts.app.partials.sidebar-menus.absences')

        @include('layouts.app.partials.sidebar-menus.extra-duties')

        @include('layouts.app.partials.sidebar-menus.units')

        @include('layouts.app.partials.sidebar-menus.statistics')

        @include('layouts.app.partials.sidebar-menus.archives')

        @include('layouts.app.partials.sidebar-menus.edit-pass')

        {{--        @include('layouts.app.partials.sidebar-menus.estelam')--}}

        @include('layouts.app.partials.sidebar-menus.logout')

    </ul>
</div>