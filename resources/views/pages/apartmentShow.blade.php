@extends('layouts.main-layout')

@section('content')
  <div class="container">
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

      <h3>{{ $apartment -> title }} ciao</h3>

      <p> <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $apartment -> city }} - {{ $apartment -> prov }}</p>
      <p>{{ $apartment -> address }} - {{ $apartment -> cap }}</p>
      <p>{{ $apartment -> desc }}</p>
      <ul>
        <li>Numero camere: {{ $apartment -> rooms }}</li>
        <li><i class="fa fa-bed" aria-hidden="true"></i>Numero letti: {{ $apartment -> beds }}</li>
        <li><i class="fa fa-bath" aria-hidden="true"></i>Numero bagni: {{ $apartment -> toilettes }}</li>
        <li><i class="fa fa-home" aria-hidden="true"></i>Mq: {{ $apartment -> square_meters }}</li>
      </ul>
      <p>Servizi aggiuntivi</p>
      <ul>
        @foreach($apartment->services as $service)
          <li class="services_item">{{$service-> service_category}}</li>
        @endforeach
      </ul>
      <div>
        @if ($apartment -> user_id == Auth::id())
          <div action="{{ route('apartment.show', $apartment -> id) }}">
            <a href="{{ route('apartment.edit', $apartment -> id) }}">Update</a>
            <a href="{{ route('apartment.destroy', $apartment -> id) }}">Delete</a>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
