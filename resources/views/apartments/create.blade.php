@extends('layouts.main')

@section('content')
    <h1 class="text-lg">Add new Apartment</h1>
    <form action="{{route('apartments.store')}}" method="POST">
        @csrf
        <div>
            <label for="name">Apartment Name</label>
            <input type="text" name="name" placeholder="Apartment Name" autocomplete="off">
        </div>
        <div>
            <label for="floors">Floors</label>
            <input type="number" min="1" name="floors">
        </div>
        <button type="submit">Add new apartment</button>
    </form>
@endsection