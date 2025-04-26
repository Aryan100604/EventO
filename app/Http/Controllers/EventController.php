<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Auth::user()->events()->with('tasks')->latest()->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'nullable|string|max:255',
        ]);

        $event = Auth::user()->events()->create($request->all());

        return redirect()->route('events.show', $event)->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        $this->authorize('view', $event);
        $event->load('tasks.assignedUser');
        $users = User::all();
        return view('events.show', compact('event', 'users'));
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:planning,in_progress,completed,cancelled',
        ]);

        $event->update($request->all());

        return redirect()->route('events.show', $event)->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

    public function addTask(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $event->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'assigned_to' => $request->assigned_to,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('events.show', $event)->with('success', 'Task added successfully!');
    }

    public function updateTaskStatus(Request $request, Event $event, EventTask $task)
    {
        $this->authorize('update', $event);

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'progress' => $event->progress,
        ]);
    }

    public function deleteTask(Event $event, EventTask $task)
    {
        $this->authorize('update', $event);
        $task->delete();
        return redirect()->route('events.show', $event)->with('success', 'Task deleted successfully!');
    }
} 