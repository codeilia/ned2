<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons rtlIcon">gavel</i>
        <span>اضافه خدمت ها</span>
    </a>

    <ul class="ml-menu">
{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.add-extra-duty')
        {{--@endif--}}

{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.extra-duties-list')
        {{--@endif--}}
    </ul>
</li>