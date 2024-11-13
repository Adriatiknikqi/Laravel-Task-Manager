<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" >{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="0" {{ old('status', $task->status) == '0' ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ old('status', $task->status) == '1' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="" disabled {{ old('priority', $task->priority ?? '') === '' ? 'selected' : '' }}>Choose priority</option>
                <option value="1" {{ old('priority', $task->priority ?? '') == 1 ? 'selected' : '' }}>High</option>
                <option value="2" {{ old('priority', $task->priority ?? '') == 2 ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ old('priority', $task->priority ?? '') == 3 ? 'selected' : '' }}>Low</option>
            </select>
            @error('priority')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
