@extends('layouts.main-layout')

@section('content')
  @include('elem.headermyapartment')
  <div class="corpo">
    <div class="container">
      <div class="col-xs-12 testo-evid">
        <p>Hurry up, these are expiring soon.</p>
        <h2>Benvenuto {{$user -> email}}</h2>
      </div>
      <div class="row">
        @foreach ($apartments as $apartment)
          @if ($apartment -> user_id == $user -> id)
          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="box_apartement">
              <a href="{{ route('apartment.show', $apartment -> id) }}">
                <img src="/img/{{ $apartment -> img }}" alt="Anteprima">
              </a>
              <div class="anteprima">
                <div class="city">
                  <i class="fa fa-map-marker"></i>
                  <p>{{$apartment -> city}}</p> 
                </div>
                <div class="title">
                  <a href="{{ route('apartment.show', $apartment -> id) }}">
                    <h3>{{$apartment -> title}}</h3> 
                  </a>
                </div>
                <div class="desc">
                  <p>{{ trim(substr($apartment -> desc, 0, 110)) . "..." }}</p>
                </div>
                <div class="action">
                  <a href="{{ route('apartment.edit', $apartment -> id) }}">
                    UPDATE
                  </a>
                  <a href="{{ route('apartment.destroy', $apartment -> id) }}">
                    DELETE PROPERTY
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>






  {{-- <h1>{{ $user -> name}} Nome</h1>
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
  </div> --}}

@endsection
