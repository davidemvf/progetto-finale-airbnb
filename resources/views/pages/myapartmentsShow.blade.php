@extends('layouts.main-layout')

@section('content')
  <h1>{{ $user -> name}} Nome</h1>
  <a href="{{ route('home.index') }}">HOME</a>
  <div class="container_apartements">
    @foreach ($apartments as $apartment)
      @if ($apartment -> user_id == $user -> id)
        <div class = 'box_apartement' action="{{ route('myapartment.show', $apartment -> id) }}">
            <h5>{{ $apartment -> title }}</h5>
            <p>{{ $apartment -> city }} - {{ $apartment -> prov }}</p>
            <p>{{ $apartment -> address }} - <p>{{ $apartment -> cap }}</p></p>
            <p>{{ $apartment -> desc }}</p>
            <ul>
                <li>Numero camere: {{ $apartment -> rooms }}</li>
                <li>Numero letti: {{ $apartment -> beds }}</li>
                <li>Numero bagni: {{ $apartment -> toilettes }}</li>
                <li>Mq: {{ $apartment -> square_meters }}</li>
            </ul>
            <img src="/img/{{ $apartment -> img }}"  width="50"alt="">
            <a href="{{ route('apartment.destroy', $apartment -> id) }}">CANCELLA</a>
            <a href="{{ route('apartment.edit', $apartment -> id) }}">MODIFICA</a>
        </div>
      @endif
    @endforeach
  </div>

@endsection
