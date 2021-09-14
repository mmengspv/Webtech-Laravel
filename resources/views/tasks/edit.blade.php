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

        <div class="mb-4">
            <label for="tags">Tags (separated with comma)</label>
            <input name="tags" type="text" value="{{$task->tag_names}}" class="border-2 px-2 py-1 w-full" autocomplete="off">
        </div>
        
        <button type="submit">Edit</button>
    </form>
@endsection