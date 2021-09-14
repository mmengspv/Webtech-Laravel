@extends('layouts.main')

@section('content')
    <h1>Tag: {{$tag->name}}</h1>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Due_date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tag->tasks as $task)
                <tr>
                    <td>
                        <a href="{{route('tasks.show', ['task' => $task->id])}}">
                            {{$task->title}}
                        </a>
                    <td title="{{$task->due_date}}">
                        {{$task->due_date->diffForHumans()}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
@endsection