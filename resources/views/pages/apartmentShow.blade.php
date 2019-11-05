@extends('layouts.main-layout')

@section('content')
    <div>
        <a href="{{ route('home.index') }}">HOME PAGE</a>
    </div>
    <div>
        <img src="/img/{{ $apartment -> img }}" alt="">
    </div>
    <div action="{{ route('apartment.show', $apartment -> id) }}">
        <h5>{{ $apartment -> title }}</h5>
        <p>{{ $apartment -> address }}</p>
        <p>{{ $apartment -> desc }}</p>
        <ul>
            <li>Numero camere: {{ $apartment -> rooms }}</li>
            <li>Numero letti: {{ $apartment -> beds }}</li>
            <li>Numero bagni: {{ $apartment -> toilettes }}</li>
            <li>Mq: {{ $apartment -> square_meters }}</li>
        </ul>
        <div>
            <a href="{{ route('apartment.edit', $apartment -> id) }}">Update</a>
            <a href="{{ route('apartment.destroy', $apartment -> id) }}">Delete</a>
        </div>
    </div>
@endsection