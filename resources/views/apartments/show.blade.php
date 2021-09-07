@extends('layouts.main')

@section('content')
    <h1>Apartment
        <span class="text-lg">{{$apartment->name}}</span>
    </h1>
    
    <h3>จำนวนชั้น: {{$apartment->floors}}</h3>

    <hr>
    <a href="{{route('apartments.edit', ['apartment' => $apartment->id])}}">Edit this apartment</a>
@endsection