@extends('layouts.main-layout')

@section('content')
  <div class="container apt_box">
    {{-- <div>
      <a href="{{ route('home.index') }}">HOME PAGE</a>
    </div> --}}
    <div class="card_box">
      <div class="card-group">
        <div class="card">
          <img class="card-img-top" src="/img/{{ $apartment -> img }}" alt="">
        </div>
      </div>
    </div>

    <div action="{{ route('apartment.show', $apartment -> id) }}">

      <h3>{{ $apartment -> title }}</h3>

      <p id="city_p"> <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $apartment -> city }} - {{ $apartment -> prov }}</p>
      <p>{{ $apartment -> address }} - {{ $apartment -> cap }}</p>
      <p>{{ $apartment -> desc }}</p>

      <div class="info_apt_box">
        <ul>
          <li class="list-inline-item"><i class="fa fa-home" aria-hidden="true"></i>Numero camere: {{ $apartment -> rooms }}</li>
          <li class="list-inline-item"><i class="fa fa-bed" aria-hidden="true"></i>Posti letto: {{ $apartment -> beds }}</li>
          <li class="list-inline-item"><i class="fa fa-bath" aria-hidden="true"></i>Bagni: {{ $apartment -> toilettes }}</li>
          <li class="list-inline-item"><i class="fa fa-home" aria-hidden="true"></i>Metri quadri: {{ $apartment -> square_meters }}</li>
        </ul>
      </div>

      <p>Servizi aggiuntivi:</p>
      <ul>
        @foreach($apartment->services as $service)
          <li class="services_item">{{$service-> service_category}}</li>
        @endforeach
      </ul>
      <div id='map' style='height:500px;width:500px'></div>
      <div>
        @if ($apartment -> user_id == Auth::id())
          <div class="apt_show_buttons" action="{{ route('apartment.show', $apartment -> id) }}">
            <a class="button_style" href="{{ route('apartment.edit', $apartment -> id) }}">Update</a>
            <a class="button_style" href="{{ route('apartment.destroy', $apartment -> id) }}">Delete</a>
          </div>
        @endif
      </div>

      <button id="write_msg" class="button_style" type="button" name="button">CONTATTA IL PROPRIETARIO</button>
    </div>
    @include('elem.messageForm')
  </div>
@endsection
