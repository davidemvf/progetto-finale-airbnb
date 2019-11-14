@extends('layouts.main-layout')

@section('content')
  <div class="container msgs_box">
    <h3>Messaggi ricevuti</h3>
    @foreach ($messages as $message)
      <div class="message_box">
        <p>Messaggio scritto da: <b>{{$message -> firstname}} {{$message -> lastname}}</b></p>
        <p>Email: <b>{{$message -> email}}</b></p>
        <p id = 'content_p'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.{{$message -> content}}</p>
        <h6>{{ $message -> created_at}}</h6>
      </div>
    @endforeach
  </div>
@endsection
