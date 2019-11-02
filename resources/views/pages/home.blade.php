@extends('layouts.main-layout')

@section('content')

  <div class="container">

    @foreach ($apartments as $apartment)
      <div class="box_apartement">

        <h3>{{$apartment -> title}}</h3>
        <p>{{$apartment -> desc}}</p>

      </div>

    @endforeach

  </div>



@endsection
