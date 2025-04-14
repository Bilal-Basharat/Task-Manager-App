<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $selectedProjectId = $request->query('project_id');

        $tasks = Task::when($selectedProjectId, function ($query) use ($selectedProjectId) {
            
            return $query->where('project_id', $selectedProjectId);

        })
        ->orderBy('priority')
        ->get();

        // $projects = Project::all();

        //API response
        if($request->wantsJson()){
            return response()->json([
                'tasks' => $tasks,
                // 'projects' => $projects,
                // 'selectedProjectId' => $selectedProjectId
            ]);
        }
         // Web response
    return view('tasks.index', compact('tasks', 'projects', 'selectedProjectId'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $priority = Task::where('project_id', $validated['project_id'])->max('priority') + 1;

        $task = Task::create([
            'name' => $validated['name'],
            'project_id' => $validated['project_id'],
            'priority' => $priority
        ]);

        if($request->wantsJson()){
            return response()->json([
                'task' => $task
            ], 201);
        }

        return redirect()->route('tasks.index')->with('success', 'Task Create Successfully');
    }

    public function edit(Task $task)
    {

        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {

        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
        ]);

        $task->update([
            'project_id' => $validated['project_id'],
            'name' => $validated['name'],
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'task' => $task,
                'success' => 'Task Updated Successfully'
            ]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
    }

    public function destroy(Task $task)
    {

        $task->delete();

        Task::where('project_id', $task->project_id)->where('priority', '>', $task->priority)->decrement('priority');

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Task deleted Successfully']);
        }

        return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
    }

    public function reOrder(Request $request)
    {

        $taskOrder = $request->input('taskOrder');
        $projectId = $request->input('projectId');

        foreach ($taskOrder as $index => $taskId) {
            Task::where('id', $taskId)
                ->where('project_id', $projectId)
                ->update(['priority' => $index + 1]);
        }

        return response()->json([
            'success' => true
        ]);
    }

}