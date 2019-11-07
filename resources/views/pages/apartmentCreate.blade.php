@extends('layouts.main-layout')

@section('content')
  <h1>Aggiungi un nuovo appartamento</h1>
  <a href="{{ route('home.index') }}">HOME</a>
  <div class="add_apartment">
    <form action="{{ route('apartment.store') }}" method="post"
      accept-charset="UTF-8"
      enctype="multipart/form-data">

      @csrf
      @method('POST')

      <label for="title">Titolo</label>
      <input type="text" name="title" value="">

      <label for="desc">Descrizione</label>
      <input type="text" name="desc" value="">

      <label for="rooms">Numero stanze</label>
      <input type="text" name="rooms" value="">

      <label for="beds">Numero letti</label>
      <input type="text" name="beds" value="">

      <label for="toilettes">Numero Bagni</label>
      <input type="text" name="toilettes" value="">

      <label for="square_meters">Metri quadrati</label>
      <input type="text" name="square_meters" value="">

      <label for="address">Indirizzo</label>
      <input type="text" name="address" value="">

      <label for="img">Immagine</label>
      <input type="file" name="img" accept="image/*">


      @foreach ($services as $service)
        {{-- <label for="{{ $service -> service_category }}">{{ $service -> service_category }}</label>
        <input type="checkbox" name="{{ $service -> service_category }}[]" value=""> --}}
        <input type="checkbox" name="services[]" value="{{ $service -> id }}" {{ (isset($data['apartment']) && $data['apartment']->services->firstWhere('id', $service->id) !== null) ? 'checked' : null }}> {{ $service -> service_category }}<br/><br/>
      @endforeach


      <button type="submit" name="button">ADD</button>
    </form>
  </div>
@endsection
