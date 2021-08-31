@extends("layouts.main")

@section('content')
<h1>About Page</h1>
<p>This is about page</p>

<div>Contact: {{$name}}</div>
<div>Contact: {{$info['address']}}</div>
@endsection