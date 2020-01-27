<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons rtlIcon">business</i>
        <span>واحد ها و معاونت ها</span>
    </a>

    <ul class="ml-menu">
{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.add-unit')
        {{--@endif--}}

{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.units-list')
        {{--@endif--}}
    </ul>
</li>