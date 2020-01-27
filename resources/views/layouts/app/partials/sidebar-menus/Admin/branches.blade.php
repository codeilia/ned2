<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons rtlIcon">flight</i>
        <span>مرخصی ها</span>
    </a>

    <ul class="ml-menu">
{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.Admin.add-branch')
        {{--@endif--}}

{{--        @if(Auth::user()->isAdmin())--}}
            @include('layouts.app.partials.sidebar-menus.Admin.branches-list')
        {{--@endif--}}
    </ul>
</li>