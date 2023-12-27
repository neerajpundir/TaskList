@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        {{-- Title --}}
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- end --}}

        {{-- Description --}}
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')]) rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- end --}}

        {{-- Long Descriptiom --}}
        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" @class([
                'border-red-500' => $errors->has('long_description'),
            ]) rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- end --}}

        {{-- Add Task Button --}}
        <div class="flex gap-2 items-center">
            <button class="btn" type="submit">{{ isset($task) ? 'Update Task' : 'Add Task' }}</button>
            <a href="{{ route('tasks.index') }}" class="link text-end">Cancel</a>
        </div>
        {{-- end --}}

    </form>
@endsection

{{-- Note: this @method only work with the POST method for spoofing technique in form --}}
