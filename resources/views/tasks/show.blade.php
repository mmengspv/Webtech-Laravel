@extends('layouts.main')

@section('content')
    <h1>Task: {{$task->id}}</h1>
    <div>
        Title: {{$task->title}}
    </div>
    <div>
        Detail: {{$task->detail}}
    </div>
    <div>
        due_date: {{$task->due_date}}
    </div>
    
    <a href="{{route('tasks.edit', ['task' => $task->id])}}">Edit task</a>
    <hr>

    <form action="{{route('tasks.destroy', ['task' => $task->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <label>Delete Task</label>
        <button type="submit">Delete</button>
    </form>
@endsection