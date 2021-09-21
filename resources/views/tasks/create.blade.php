@extends('layouts.main')

@section('content')
    <h1>Create New Task</h1>

    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title : </label>
            <input type="text" name="title" value="{{old('title')}}" class="border-2 px-2 py-1 @error('title') border-red-400 @enderror" placeholder="title" autocomplete="off">
            @error('title')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Detail : </label>
            <input type="text" name="detail" value="{{old('detail')}}" class="border-2 px-2 py-1 @error('detail') border-red-400 @enderror" placeholder="detail" autocomplete="off">
            @error('detail')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Due date : </label>
            <input type="date" name="due_date" value="{{old('due_date')}}" class="border-2 px-2 py-1 @error('due_date') border-red-400 @enderror">
            @error('due_date')
                <p class="text-red-600">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tags">Tags (separated with comma)</label>
            <input name="tags" type="text" value="{{old('tags')}}" class="border-2 px-2 py-1 w-full"  autocomplete="off">
        </div>

        <button type="submit" class="border px-4 py-1 bg-blue-300 hover:bg-blue-200"">Add Task</button>
    </form>
@endsection