@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Edit Room{{$room->room_number}}
    </h1>

    <h1 class="text-3xl">
        Edit Room{{$room->apartment->name}}
    </h1>

    <form action="{{route('rooms.update', ['room' => $room->id])}}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="floor">Floor</label>
            <input type="number" name="floor" value="{{$room->floor}}" min="1" max="{{$room->apartment->floors}}" class="border-2" >
            /{{$room->apartment->floors}}
        </div>

        <div>
            <label for="room_number">Room Number</label>
            <input type="text" value="{{$room->room_number}}" name="room_number" class="border-2">
        </div>

        <div>
            <label for="type">Room Type</label>
            <select name="type" id="type" class="border-2">
                @foreach ($room_types as $type)
                    <option @if ($type === $room->type) selected @endif
                     value="{{$type}}">{{$type}}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="px-4 py2 bg-blue-400">
            <button type="submit">Edit Room</button>
        </div>

    </form>
    
@endsection