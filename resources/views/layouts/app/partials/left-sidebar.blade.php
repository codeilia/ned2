<!-- Left Sidebar -->
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar ">
    <!-- User Info -->
    <div class="user-info" >
        <div class="image">
            {{--@if(Storage::disk('public')->has(Auth::user()->personal_photo))--}}
                {{--<img src="{{ Storage::url(Auth::user()->personal_photo) }}" width="100" height="80" alt="User" />--}}
                {{--@else--}}
                <img src="{{ URL::asset('images/logo.png') }}" width="80" height="30" alt="User" />
            {{--@endif--}}
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="">
                <p> بانک اطلاعاتی ناویان</p>
                <p>دفتر تهران ندسا - منابع سرباز</p>
                {{--<span>{{ Auth::user()->details->first_name }}</span>--}}
                {{--<span>{{ Auth::user()->details->last_name }}</span>--}}
            </div>
            <div class="email">
{{--                {{ Auth::user()->username }}--}}
            </div>
        </div>
    </div>
    <!-- #User Info -->

    <!-- Menu -->
    @include('layouts.app.partials.side-bar-menu')
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
        <div class="copyright">

        </div>
        <div class="version">
            {{--<b>ورژن: </b> 0.1--}}
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->