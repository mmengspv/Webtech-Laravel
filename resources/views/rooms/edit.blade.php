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
            <input type="number" name="floor" value="{{old('floor', $room->floor)}}" min="1" max="{{$room->apartment->floors}}" class="border-2 @error('floor') border-red-400 @enderror" >
            /{{$room->apartment->floors}}
            @error('floor')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div>
            <label for="room_number">Room Number</label>
            <input type="text" value="{{$room->room_number}}" name="room_number" class="border-2 @error('room_number') border-red-400 @enderror">
            @error('room_number')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div>
            <label for="type">Room Type</label>
            <select name="type" id="type" class="border-2 @error('type') border-red-400 @enderror">
                @foreach ($room_types as $type)
                    <option @if ($type === old('type', $room->type)) selected @endif
                     value="{{$type}}">
                        {{$type}}
                    </option>
                @endforeach
            </select>
            @error('type')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>
        
        <div>
            <button class="px-4 py-2 bg-blue-400" type="submit">Edit Room</button>
        </div>

    </form>
    
@endsection