@extends('layouts.main-layout')

@section('content')
  @include('elem.header')
  <div class="corpo">
    <div class="container">
      <div class="col-xs-12 testo-evid">
        <p>Hurry up, these are expiring soon.</p>
        <h2>In Evidenza a {{ucfirst($city)}}</h2>
      </div>
      <div class="row">
        @foreach ($apartments as $apartment)
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
                <div class="read-more">
                  <a href="{{ route('apartment.show', $apartment -> id) }}">
                    READ MORE
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection