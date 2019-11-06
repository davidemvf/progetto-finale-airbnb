@extends('layouts.main-layout')

@section('content')
  <h1>Modifica appartamento</h1>
  <a href="{{ route('home.index') }}">HOME</a>
  <div class="add_apartment">
    <form action="{{ route('apartment.update', $apartment -> id) }}" method="post"
      accept-charset="UTF-8"
      enctype="multipart/form-data">

      @csrf
      @method('POST')

      <label for="title">Titolo</label>
      <input type="text" name="title" value="{{ $apartment -> title }}">

      <label for="desc">Descrizione</label>
      <input type="text" name="desc" value="{{ $apartment -> desc }}">

      <label for="rooms">Numero stanze</label>
      <input type="text" name="rooms" value="{{ $apartment -> rooms }}">

      <label for="beds">Numero letti</label>
      <input type="text" name="beds" value="{{ $apartment -> beds }}">

      <label for="toilettes">Numero Bagni</label>
      <input type="text" name="toilettes" value="{{ $apartment -> toilettes }}">

      <label for="square_meters">Metri quadrati</label>
      <input type="text" name="square_meters" value="{{ $apartment -> square_meters }}">

      <label for="address">Indirizzo</label>
      <input type="text" name="address" value="{{ $apartment -> address }}">

      <label for="img">Immagine</label>
      <input type="file" name="img" accept="image/*">

      <label for="wifi">WiFi</label>
      <input type="checkbox" name="wifi" value="">

      <button type="submit" name="button">Update</button>
    </form>
  </div>
@endsection
