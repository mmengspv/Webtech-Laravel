@extends('layouts.main')

@section('content')
    <h1>Create New Task</h1>

    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title : </label>
            <input type="text" name="title" class="border-2 px-2 py-1" placeholder="title" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label>Detail : </label>
            <input type="text"  name="detail" class="border-2 px-2 py-1" placeholder="detail" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label>Due date : </label>
            <input type="date" name="due_date" class="border-2 px-2 py-1" required >
        </div>

        <div class="mb-3">
            <label for="tags">Tags (separated with comma)</label>
            <input name="tags" type="text" class="border-2 px-2 py-1 w-full" autocomplete="off">
        </div>

        <button type="submit" class="border px-4 py-1 bg-blue-300 hover:bg-blue-200"">Add Task</button>
    </form>
@endsection