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

    <div class="mt-2">
        Tag: 
        @foreach ($task->tags as $tag)
            <span class="inline-block p-2 ml-4">
                <a href="{{route('tags.slug', ['slug' => $tag->name])}}">
                    {{$tag->name}}
                </a>
            </span>
        @endforeach
    </div>
    
    <a href="{{route('tasks.edit', ['task' => $task->id])}}" class="border px-3 px-2">Edit task</a>
    <hr class="mt-2">

    <form action="{{route('tasks.destroy', ['task' => $task->id])}}"  method="POST">
        @csrf
        @method('DELETE')
        <label>Delete Task</label>
        <button type="submit">Delete</button>
    </form>
@endsection