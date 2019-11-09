@extends('layouts.main-layout')

@section('content')

  <div class="container apt_create_box">

    <h1>Aggiungi un nuovo appartamento</h1>
    <a href="{{ route('home.index') }}">HOME</a>
    <div class="add_apartment">
      <form action="{{ route('apartment.store') }}" method="post"
      accept-charset="UTF-8"
      enctype="multipart/form-data">

      @csrf
      @method('POST')

      <label for="title">Titolo</label> <br>
      <input type="text" name="title" value=""> <br>

      <label for="desc">Descrizione</label> <br>
      <textarea name="desc" rows="8" cols="40" placeholder="inserisci descrizione"></textarea> <br>

      <div class="number_label">

        <label class="list-inline-item" for="rooms">Numero stanze</label>
        <input class="list-inline-item" type="number" name="rooms" value="">

        <label class="list-inline-item" for="beds">Numero letti</label>
        <input class="list-inline-item" type="number" name="beds" value="">

        <label class="list-inline-item" for="toilettes">Numero Bagni</label>
        <input class="list-inline-item" type="number" name="toilettes" value="">

        <label class="list-inline-item" for="square_meters">Metri quadrati</label>
        <input class="list-inline-item" type="number" name="square_meters" value=""> <br>

      </div>

      <div class="text_label">

        <label class="list-inline-item" for="city">Città</label>
        <input class="list-inline-item" type="text" name="city" value="">

        <label class="list-inline-item" for="prov">Provincia</label>
        <input class="list-inline-item" type="text" name="prov" value="">

        <label class="list-inline-item" for="cap">CAP</label>
        <input class="list-inline-item" type="text" name="cap" value=""> <br>

        <div class="address_label">

          <label class="list-inline-item" for="address">Indirizzo</label>
          <input class="list-inline-item" type="text" name="address" value="">
          
        </div>


      </div>


      <label for="img">Immagine</label> <br>
      <input id="label_img_apt_create" type="file" name="img" accept="image/*"> <br>


      @foreach ($services as $service)
        {{-- <label for="{{ $service -> service_category }}">{{ $service -> service_category }}</label>
        <input type="checkbox" name="{{ $service -> service_category }}[]" value=""> --}}
        <input type="checkbox" name="services[]" value="{{ $service -> id }}"> {{ $service -> service_category }}<br/><br/>
      @endforeach


      <button type="submit" name="button">ADD</button>
    </form>
  </div>

  </div>


@endsection
