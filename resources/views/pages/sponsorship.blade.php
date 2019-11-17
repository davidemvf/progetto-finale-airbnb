@extends('layouts.main-layout')

@section('content')
  <div class="container spons_box">
    <h3>Scegli il tipo di sponsorizzazione per: <br> {{$apartment -> title}}</h3>

    <div class="row">
      @foreach ($sponsorships as $sponsorship)
        @if ($sponsorship -> price == "2.99" && $sponsorship -> time_period == "24:00:00")
          <div class="col-xs-12 col-md-4 spons_group">
            <h4>Promozione Bronzo</h4>
            <p>
              Metti in evidenza il tuo annuncio a soli {{$sponsorship -> price}} €
              per la durata di {{$sponsorship -> time_period}} ore
            </p>
            <a href="{{ route('payment.show', [$id = $apartment -> id, $sponsorship_id = $sponsorship -> id])}}">VAI AL PAGAMENTO</a>
          </div>
        @endif

        @if ($sponsorship -> price == "5.99" && $sponsorship -> time_period == "72:00:00")
          <div class="col-xs-12 col-md-4 spons_group">
            <h4>Promozione Argento</h4>
            <p>Metti in evidenza il tuo annuncio a soli {{$sponsorship -> price}} €
              per la durata di {{$sponsorship -> time_period}} ore
            </p>
            <a href="{{ route('payment.show', [$id = $apartment -> id, $sponsorship_id = $sponsorship -> id])}}">VAI AL PAGAMENTO</a>
          </div>
        @endif

        @if ($sponsorship -> price == "9.99" && $sponsorship -> time_period == "144:00:00")
          <div class="col-xs-12 col-md-4 spons_group">
            <h4>Promozione Oro</h4>
            <p>Metti in evidenza il tuo annuncio a soli {{$sponsorship -> price}} €
              per la durata di {{$sponsorship -> time_period}} ore
            </p>
            <a href="{{ route('payment.show', [$id = $apartment -> id, $sponsorship_id = $sponsorship -> id])}}">VAI AL PAGAMENTO</a>
          </div>
        @endif

      @endforeach
    </div>
  </div>
@endsection
