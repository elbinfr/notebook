@if (Auth::guest())
<li>
    <a href="{{ url('/login') }}" >Login</a>
</li>
<li>
    <a href="{{ url('/register') }}" >Register</a>
</li>
@else
<li>
    <a class="dropdown-button" href="#!" data-activates="dropdownMobile">
        {{ Auth::user()->first_name }}<i class="material-icons right">arrow_drop_down</i>
    </a>
</li>
<ul id="dropdownMobile" class="dropdown-content">
    <li>
        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-mobile-form').submit();">
            Logout
        </a>
        <form id="logout-mobile-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
@endif