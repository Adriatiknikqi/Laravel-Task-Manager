@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="status" class="form-control">
                    <option value="">All Statuses</option>
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Completed</option>
                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="priority" class="form-control">
                    <option value="">All Priorities</option>
                    <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>Low</option>
                    <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>Medium</option>
                    <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Clear</a>
            </div>
        
        </div>
    </form>

    @if($tasks->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                @if(
                    (request('status') === null || $task->status == request('status')) &&
                    (request('priority') === null || $task->priority == request('priority'))
                )
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status ? 'Completed' : 'Pending' }}</td>
                    <td>{{ $task->getPriorityLabel() }}</td>
                    <td>{{ $task->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks available.</p>
    @endif
</div>
@endsection
