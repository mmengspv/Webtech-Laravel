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
            <input type="number" name="floor" min="1" max="{{$apartment->floors}}" value="{{old('floor')}}" class="border-2 @error('floor') border-red-400 @enderror" >
            /{{$apartment->floors}}
            @error('floor')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div>
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" value="{{old('room_number')}}" class="border-2 @error('room_number') border-red-400 @enderror">
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
                    <option value="{{$type}}" {{old('type') === $type ? "selected": ""}}>{{$type}}</option>
                @endforeach
            </select>
            @error('type')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>
        
        <div class="px-4 py2 bg-blue-400">
            <button type="submit">Add Room</button>
        </div>

    </form>
    
@endsection