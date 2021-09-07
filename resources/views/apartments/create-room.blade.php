@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Add more room to apartment {{$apartment->name}}
    </h1>

    <form action="{{route('rooms.store')}}" method="POST">
        @csrf
        <div>
            <label></label>
            <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
        </div>

        <div>
            <label for="floor">Floor</label>
            <input type="number" name="floor" min="1" max="{{$apartment->floors}}" class="border-2" >
            /{{$apartment->floors}}
        </div>

        <div>
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" class="border-2">
        </div>

        <div>
            <label for="type">Room Type</label>
            <select name="type" id="type" class="border-2">
                @foreach ($room_types as $type)
                    <option value="{{$type}}">{{$type}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="px-4 py2 bg-blue-400">
            <button type="submit">Add Room</button>
        </div>

    </form>
    
@endsection