@extends('layouts.main')

@section('content')
    <h1>Create New Task</h1>

    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div>
            <label>Title : </label>
            <input type="text" name="title" placeholder="title" autocomplete="off">
        </div>
        <div>
            <label>Detail : </label>
            <input type="text" name="detail" placeholder="detail" autocomplete="off">
        </div>
        <div>
            <label>Due date : </label>
            <input type="date" name="due_date" >
        </div>

        <button type="submit">Add Task</button>
    </form>
@endsection