<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $task = Task::create([
            'name' => $request->name
        ]);

        return response()->json($task);
    }
}
