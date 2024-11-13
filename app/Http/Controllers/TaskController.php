<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks; 
        return view('tasks.index', compact('tasks'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'nullable|integer|in:1,2,3',
            'status' => 'nullable|boolean',
        ]);

        $request->user()->tasks()->create($validated + ['status' => false]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        try {
            $this->authorize('view', $task);
            return view('tasks.show', compact('task'));
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to view this task.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        try {
            $this->authorize('update', $task);
            return view('tasks.edit', compact('task'));
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to edit this task.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        try {
            $this->authorize('update', $task);
    
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'nullable|boolean',
                'priority' => 'nullable|integer|in:1,2,3',
            ]);
        
            $task->update($validated);
        
            return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $this->authorize('delete', $task);
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to delete this task.');
        }
    }
}
