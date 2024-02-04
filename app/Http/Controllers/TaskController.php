<?php

namespace App\Http\Controllers;
use App\Models\Task;

use App\Events\TaskCreated;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        $task = $user->tasks()->create([
            'name' => $request->name,
        ]);

        event(new TaskCreated($task, $user));

        return back();
    }

}
