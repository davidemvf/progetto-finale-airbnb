@extends('layouts.main-layout')

@section('content')
  <a href="{{ route('apartment.create') }}">Create aprt</a>

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
