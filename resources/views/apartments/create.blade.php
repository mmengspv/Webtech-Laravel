@extends('layouts.main')

@section('content')
    <h1 class="text-lg">Add new Apartment</h1>

    <form action="{{route('apartments.store')}}" method="POST">
        @csrf
        <div>
            <label for="name">Apartment Name</label>
            <input type="text" name="name" value="{{old('name')}}" placeholder="Apartment Name" class="border-2 @error('name') border-red-400 @enderror" autocomplete="off">
            @error('name')
                <div class="text-red-600">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div>
            <label for="floors">Floors</label>
            <input type="number" min="1" value="{{old('floors')}}" class="border-2 @error('floors') border-red-400 @enderror" name="floors">
            @error('floors')
                <div class="text-red-600">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="border-2 px-3">Add new apartment</button>
    </form>
@endsection