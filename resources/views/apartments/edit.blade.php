@extends('layouts.main')

@section('content')
    <h1 class="text-lg">Edit Apartment</h1>
    <form action="{{route('apartments.update', ['apartment' => $apartment->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Apartment Name</label>
            <input type="text" name="name" value="{{old('name', $apartment->name)}}" class="border-2 @error('name') border-red-400 @enderror" autocomplete="off">
            @error('name')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div>
            <label for="floors">Floors</label>
            <input type="number" min="1" name="floors" value="{{old('floors', $apartment->floors)}}" class="border-2 @error('floors') border-red-400 @enderror" autocomplete="off">
            @error('floors')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>
        <button type="submit" class="border-2 px-3">Edit Apartment</button>
    </form>

    <hr>
    <div>
        <h1>Danger Zone</h1>
        <h2>Delete this apartment</h2>
        <p class="text-red-800">การลบข้อมูลนี้ไม่สามารถเรียกกลับคืนได้</p>
        <form action="{{route('apartments.destroy', ['apartment' => $apartment->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <label for="destroy">Please enter apartment name make sure to delete</label>
            <input type="text" name="destroy" placeholder="Apartment name">
            <button type="submit">Delete</button>
        </form>
    </div>
    
@endsection