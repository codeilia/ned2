<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons rtlIcon">insert_chart</i>
        <span>آمار</span>
    </a>

    <ul class="ml-menu">
{{--        @if(Auth::user()->isAdmin())--}}
            {{--@include('layouts.app.partials.sidebar-menus.add-unit')--}}
        {{--@endif--}}

{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.statistics-list')
        {{--@endif--}}
    </ul>
</li>