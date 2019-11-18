@extends('layouts.main-layout')

@section('content')
  <div class="container msgs_box">
    <h3>Messaggi ricevuti</h3>

      

      @foreach ($messages as $message)
      <div class="message_box">
        <p>Messaggio scritto da: <b>{{$message -> firstname}} {{$message -> lastname}}</b></p>
        <p>Email: <b>{{$message -> email}}</b></p>
        <p id = 'content_p'>{{$message -> content}}</p>
        <h6>{{ $message -> created_at}}</h6>
      </div>
      @endforeach

  </div>
@endsection
