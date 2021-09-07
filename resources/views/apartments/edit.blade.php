@extends('layouts.main')

@section('content')
    <h1 class="text-lg">Edit Apartment</h1>
    <form action="{{route('apartments.update', ['apartment' => $apartment->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Apartment Name</label>
            <input type="text" name="name" value="{{$apartment->name}}">
        </div>

        <div>
            <label for="floors">Floors</label>
            <input type="number" min="1" name="floors" value="{{$apartment->floors}}">
        </div>
        <button type="submit">Edit Apartment</button>
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