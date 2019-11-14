@extends('layouts.main-layout')

@section('content')

  <div class="container apt_edit_box">

    {{-- <a class="button_style" href="{{ route('home.index') }}">HOME</a> --}}

    <h3>Modifica appartamento</h3>

    <div class="add_apartment">
      <form action="{{ route('apartment.update', $apartment -> id) }}" method="post"
        accept-charset="UTF-8"
        enctype="multipart/form-data">

        @csrf
        @method('POST')

        <div class="form-group">
          <label for="title">Titolo</label>
          <input id="name" type="text" name="title" class="form-control" placeholder="" value="{{ $apartment -> title }}">
        </div>

        <div class="form-group">
          <label for="desc">Descrizione</label>
          <textarea class="form-control" name="desc" rows="5"> {{ $apartment -> desc }} </textarea>
        </div>

        {{-- id="exampleFormControlTextarea1" --}}

        <div class="number_label">
          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="rooms">Numero stanze</label>
              <input type="number" name="rooms" class="form-control" placeholder="" value="{{ $apartment -> rooms }}">
            </div>

            <div class="form-group col-md-3">
              <label for="beds">Numero letti</label>
              <input type="number" name="beds" class="form-control" placeholder="" value="{{ $apartment -> beds }}">
            </div>

            <div class="form-group col-md-3">
              <label for="toilettes">Numero Bagni</label>
              <input type="number" name="toilettes" class="form-control" placeholder="" value="{{ $apartment -> toilettes }}">
            </div>

            <div class="form-group col-md-3">
              <label for="square_meters">Metri quadrati</label>
              <input type="number" name="square_meters" class="form-control" placeholder="" value="{{ $apartment -> square_meters }}">
            </div>
          </div>

        </div>

        <div class="text_label">
          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="city">Città</label>
              <input id="city" type="text" name="city" class="form-control" placeholder="" value="{{ $apartment -> city }}">
            </div>

            <div class="form-group col-md-2">
              <label for="prov">Provincia</label>
              <input type="text" name="prov" class="form-control" placeholder="" value="{{ $apartment -> prov }}">
            </div>

            <div class="form-group col-md-2">
              <label for="cap">CAP</label>
              <input id="cap" type="text" name="cap" class="form-control" placeholder="" value="{{ $apartment -> cap }}">
            </div>

            <div class="form-group col-md-5">
              <label for="address">Indirizzo</label>
              <input id="address" type="text" name="address" class="form-control" placeholder="" value="{{ $apartment -> address }}">
            </div>

          </div>
        </div>

        <div class="immagini_margin">
          <label  for="img">Immagine</label> <br>
          <input class="input_img_apt" type="file" name="img" accept="image/*"> <br>
        </div>

        {{-- foreach per vedere i servizi già fleggati --}}
        @foreach ( $services as $service )
          @php
          $array = ($apartment -> services)->pluck('id')->toArray(); // ritorna un array da una collection e prende gli id della colonna
          @endphp
          {{-- checkbox per servizi aggiuntivi --}}
          <div>
            <div>
              <label>
                <input type="checkbox" name="services[]" value="{{ $service -> id }}"
                {{ (in_array($service -> id, old('service', $array )) ) ? 'checked' : ''}}>
                {{ $service -> service_category }}
              </label>
            </div>
          </div>
        @endforeach
        <div id='map' style='height:500px;width:500px'></div>

        <button class="button_style" type="submit" name="button">Update</button>
      </form>
    </div>

  </div>

@endsection
