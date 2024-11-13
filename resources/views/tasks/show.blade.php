<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $task->status ? 'Completed' : 'Pending' }}</p>
            <p class="card-text"><strong>Priority:</strong>
                @if($task->priority == 1)
                    High
                @elseif($task->priority == 2)
                    Medium
                @elseif($task->priority == 3)
                    Low
                @else
                    N/A
                @endif
            </p>
            <p class="card-text"><strong>Created At:</strong> {{ $task->created_at->format('d M Y') }}</p>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
        </div>
    </div>
</div>
@endsection
