@extends('layouts.main-layout')

@section('content')
  @include('elem.slider')
  @guest
    <a href="#">CERCA APPARTAMENTO</a>
  @else
    <a href="{{ route('apartment.create') }}">NUOVO APPARTAMENTO</a>
    <a href="{{ route('myapartment.show') }}">I MIEI APPARTAMENTI</a>
    <a href="{{ route('messages.show') }}">MESSAGGI RICEVUTI</a>
  @endguest

  <div class="container_apartements">

    @foreach ($apartments as $apartment)
      <div class="box_apartement">

        <h3>{{$apartment -> title}}</h3>
        <p>{{$apartment -> desc}}</p>
        <img src="/img/{{ $apartment -> img }}"  width="50"alt="">
        <a href="{{ route('apartment.show', $apartment -> id) }}">READ MORE</a>
      </div>

    @endforeach

  </div>

@endsection
