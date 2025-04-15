@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Task</h2>
        
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Task Name</label>
                <input type="text" name="name" id="name" 
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{ $task->name }}" required>
            </div>
            
            <div class="mb-6">
                <label for="project_id" class="block text-sm font-medium text-gray-700 mb-1">Project</label>
                <select name="project_id" id="project_id" 
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('tasks.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Update Task
                </button>
            </div>
        </form>
    </div>
@endsection