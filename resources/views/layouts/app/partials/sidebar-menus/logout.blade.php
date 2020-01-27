<li>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
        <i class="material-icons rtlIcon" style="font-size: 2rem">exit_to_app</i>
        <span>خروج</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>