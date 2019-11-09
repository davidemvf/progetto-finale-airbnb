@extends('layouts.main-layout')

@section('content')

 <div class="container apt_create_box">

    <a class="button_style" href="{{ route('home.index') }}">HOME</a>

   <h3>Aggiungi un nuovo appartamento</h3>



    <div class="add_apartment">
      <form action="{{ route('apartment.store') }}" method="post"
      accept-charset="UTF-8"
      enctype="multipart/form-data">

      @csrf
      @method('POST')

      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" name="title" class="form-control" placeholder="" value="">
      </div>

      <div class="form-group">
        <label for="desc">Descrizione</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  name="desc" rows="5"  placeholder="inserisci descrizione"></textarea>
      </div>

      <div class="number_label">

        <div class="form-row">

          <div class="form-group col-md-3">
            <label for="rooms">Numero stanze</label>
            <input type="number" class="form-control" name="rooms" value="">
          </div>
          <div class="form-group col-md-3">
            <label  for="beds">Numero letti</label>
            <input type="number" class="form-control" name="beds" value="">
          </div>
          <div class="form-group col-md-3">
            <label for="toilettes">Numero Bagni</label>
            <input type="number" class="form-control" name="toilettes" value="">
          </div>
          <div class="form-group col-md-3">
            <label for="square_meters">Metri quadrati</label>
            <input type="number" class="form-control" name="square_meters" value="">
          </div>

        </div>

      </div>

      <div class="text_label">

        <div class="form-row">

          <div class="form-group col-md-3">
            <label for="city">Città</label>
            <input type="text" class="form-control" name="city" value="">
          </div>
          <div class="form-group col-md-2">
            <label for="prov">Provincia</label>
            <input type="text" class="form-control" name="prov" value="">
          </div>
          <div class="form-group col-md-2">
            <label for="cap">CAP</label>
            <input type="text" class="form-control" name="cap" value="">
          </div>
          <div class="form-group col-md-5">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" name="address" value="">
          </div>

        </div>

       <div class="immagini_margin">
         <label for="img">Immagine</label> <br>
         <input class="input_img_apt" type="file" name="img" accept="image/*">
       </div>



      @foreach ($services as $service)
        {{-- <label for="{{ $service -> service_category }}">{{ $service -> service_category }}</label>
        <input type="checkbox" name="{{ $service -> service_category }}[]" value=""> --}}
        <input type="checkbox" name="services[]" value="{{ $service -> id }}"> {{ $service -> service_category }}<br/><br/>
      @endforeach


      <button class="button_style" type="submit" name="button">CREA</button>

    </form>
  </div>

  </div>


@endsection
