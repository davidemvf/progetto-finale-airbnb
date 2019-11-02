<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">



    </head>
    <body>

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

      @yield('content')

     <footer>
       <h3>By Gianni's friends</h3>
     </footer>

    </body>
</html>
