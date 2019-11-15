@extends('layouts.main-layout')

@section('content')
  <h1>Sponsor {{$apartment -> title}}</h1>
  @foreach ($sponsorships as $sponsorship)
    <div action =  class="">
      <p>Price: {{$sponsorship -> price}}</p>
      <p>Duration: {{$sponsorship -> time_period}}</p>
      <a href="{{ route('payment.show', [$id = $apartment -> id, $sponsorship_id = $sponsorship -> id])}}">Scegli</a>
    </div>
  @endforeach
@endsection
