<div class="container">
    <div class="header-left">
        <a href="{{ route('home.index') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="">
        </a>
    </div>
    <div class="header-right">
        @guest
        <ul>
            <li class="list-inline-item">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('register') }}">Register</a>
            </li>
        </ul> 
        @else
        <ul>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        @endguest
        <a href="#">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="hamburger-menu">
        @guest
        <ul>
            <li class="list-inline-item">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('register') }}">Register</a>
            </li>
        </ul> 
        @else
        <ul>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        @endguest
    </div>
</div>