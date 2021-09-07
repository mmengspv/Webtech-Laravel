@extends("layouts.main")

@section("content")
    <h1 class="text-5xl">Apartment List</h1>
    <a href="{{route('apartments.create')}}">+ New Apartment</a>
    <table class="table border-grey-200">
        <thead>
            <tr>
                <th>Name</th>
                <th>Floors</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
                <tr>
                    <td>
                        <a href="{{route("apartments.show", ['apartment' => $apartment->id])}}">
                        {{$apartment->name}}
                        </a>
                    </td>
                    <td>{{$apartment->floors}}</td>
                    <td title="{{$apartment->created_at}}">{{$apartment->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection