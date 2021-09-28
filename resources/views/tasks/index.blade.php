@extends('layouts.main')

@section('content')
    <h1>Task List</h1>

    <a href="{{route('tasks.create')}}">
        <h5>+ Add new task</h5>
    </a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Due_date</th>
                <th>Is_Past</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>
                        {{$task->id}}
                    </td>
                    <td>
                        <a href="{{route('tasks.show', ['task' => $task->id])}}">
                            {{$task->title}}
                        </a>
                    </td>
                    <td>
                        {{$task->detail}}
                    </td>
                    <td title="{{$task->due_date}}">
                        {{$task->due_date->diffForHumans()}}
                    </td>
                    <td>
                        @if ($task->is_past === true)
                            true    
                        @else
                            false
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$tasks->links()}}
@endsection