@extends("layouts.main")

@section("content")
    <h1 class="text-5xl">Apartment List</h1>
    @can('create', Apartment::class)
        <a href="{{route('apartments.create')}}">+ New Apartment</a>
    @endcan
    <table class="table border-grey-200">
        <thead>
            <tr>
                <th>Name</th>
                <th>Floors</th>
                <th>Rooms</th>
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
                    <td>{{$apartment->rooms->count()}}</td>
                    <td title="{{$apartment->created_at}}">{{$apartment->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection