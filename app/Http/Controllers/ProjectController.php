<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = Project::create([
            'name' => $validated['name'],
        ]);

        if($request->wantsJson()){
            return response()->json([
                'data' => $project,
            ], 201);
        }

        return redirect()->route('projects.index')->with('success', 'Project Created Successfully');
    }
}
