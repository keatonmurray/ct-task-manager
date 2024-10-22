<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('pages.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'task_name' => 'required',
            'priority' => 'required'
        ]);

        Task::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getSingleTask = Task::find($id);
        return view('pages.show')->with('task', $getSingleTask);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $id)
    {
        return view('pages.edit', ['task' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $id)
    {
        $data = $request->validate([
            'task_name' => 'required|max:85',
            'priority' => 'required|integer'
        ]);

        $id->update($data);
        return redirect('/');
    }

    public function updatePriority(Request $request)
    {
        $items = $request->input('items'); 
    
        foreach ($items as $index => $id) {
            Task::where('id', $id)->update(['priority' => $index + 1]); 
        }
    
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteTask = Task::find($id);
        $deleteTask->delete();

        return redirect('/');
    }
}
