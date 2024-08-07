<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use App\Http\Requests\StoreTaskListRequest;
use App\Http\Requests\UpdateTaskListRequest;
use Illuminate\Console\View\Components\Task;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = TaskList::all();
        return view('show-tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-tasks');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskListRequest $request)
    {
        //dd($request->all());
        $validated = $request->validated();

        // Create task
        TaskList::create([
            'title' => $validated['title'],
            'priority' => $validated['priority'],
            'status' => $validated['status'],
        ]);

        // Redirect with responce
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tasks = TaskList::find($id);
        return view('ind-show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = TaskList::findOrFail($id);
        return view('edit-tasks', compact('tasks'));
    }

    public function update(UpdateTaskListRequest $request, $id)
    {
        $validatedData = $request->validated();
        $tasks = TaskList::findOrFail($id);
        $tasks->update($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tasks = TaskList::find($id);
        $tasks->delete();

        return redirect()->route('tasks.index')->with('success', 'tasks deleted success !');
    }
}
