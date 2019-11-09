@extends('layouts.main-layout')

@section('content')
  <p>hw</p>
  <div class="">
    @foreach ($messages as $message)
      <div class="">
        <p>Messaggio ricevuto da: {{$message -> firstname}} {{$message -> lastname}}</p>
        <p>Email: {{$message -> email}}</p>
        <p>Messaggio: {{$message -> content}}</p>
      </div>
    @endforeach
  </div>
@endsection
