@extends('layouts.main')

@section('content')
    <h1>Edit Task: {{$task->id}}</h1>

    <form action="{{route('tasks.update', ['task' => $task->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label>Title : </label>
            <input type="text" name="title" value="{{$task->title}}" required>
        </div>
        <div>
            <label>Detail : </label>
            <input type="text" name="detail" value="{{$task->detail}}" required>
        </div>
        <div>
            <label for="due_date">Due_date : </label>
            <input type="date" name="due_date" value="{{$task->due_date->format('Y-m-d')}}" required>     
        </div>
        
        <button type="submit">Edit</button>
    </form>
@endsection