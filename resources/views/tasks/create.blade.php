@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow mt-10 border border-gray-200 p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create New Task</h2>
        
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Task Name</label>
                <input type="text" name="name" id="name" 
                       class="w-full rounded-md py-2 border border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                       required>
            </div>
            
            <div class="mb-6">
                <label for="project_id" class="block text-sm font-medium text-gray-700 mb-2">Project</label>
                <select name="project_id" id="project_id" 
                        class="w-full rounded-md py-2 border border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('tasks.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-600 transition">
                    Create Task
                </button>
            </div>
        </form>
    </div>
@endsection