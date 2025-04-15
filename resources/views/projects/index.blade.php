@extends('layouts.app')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Projects</h2>
        <a href="{{ route('projects.create') }}" 
           class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-600 transition">
            Create Project
        </a>
    </div>

    @if($projects->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
            No projects found.
        </div>
    @else
        <ul class="space-y-3">
            @foreach($projects as $project)
                <li class="bg-white rounded-lg shadow p-4 flex justify-between items-center hover:shadow-md transition">
                    <span class="font-medium text-gray-800">{{ $project->name }}</span>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                        {{ $project->tasks_count }} tasks
                    </span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection