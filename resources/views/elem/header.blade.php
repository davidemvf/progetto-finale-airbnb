<header>
    <div class="title">
        <h1>bool bnb</h1>
    </div>
    <div class="box-login">
        @guest
        <a href="{{ route('login') }}">LOGIN</a>
        <a href="{{ route('register') }}">REGISTER</a>
        @else
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        LOGOUT
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        @endguest
    </div>
</header>