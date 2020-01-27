<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons rtlIcon">event_busy</i>
        <span>غیبت ها</span>
    </a>

    <ul class="ml-menu">
{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.add-absence')
        {{--@endif--}}

{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.absences-list')
        {{--@endif--}}
    </ul>
</li>