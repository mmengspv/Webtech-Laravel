@extends('layouts.main')

@section('content')
    <h1>Apartment
        <span class="text-lg">{{$apartment->name}}</span>
    </h1>
    
    <h3>จำนวนชั้น: {{$apartment->floors}}</h3>

    <hr>
    <div class="my-2">
        <a class="bg-blue-400 hover:bg-blue-200 px-4 py-2">Add Room</a>
        <a href="{{route('apartments.edit', ['apartment' => $apartment->id])}}">Edit this apartment</a>
    </div>

    <div class="mt-8 text-3xl">
        Rooms in This Apartment
    </div>
    <div class="mt-2">
        <a href="{{route('apartments.rooms.create', ['apartment' => $apartment->id])}}" class="bg-blue-400 hover:bg-blue-200 px-4 py-2">
            + Add More Room
        </a>
    </div>
    <div>
        <ul>
            @foreach ($apartment->rooms->sortBy('floor') as $room)
                <li>
                    <a  class="text-blue-600 hover:text-green-600"
                        href="{{route("rooms.show", ['room' => $room->id])}}">
                        {{$room->type}}-{{$room->name}}
                    </a>
                    floor {{$room->floor}}
                </li>                
            @endforeach
        </ul>
    </div>
@endsection