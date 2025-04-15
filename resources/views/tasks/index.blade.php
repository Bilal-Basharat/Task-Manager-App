@extends('layouts.app')

@section('content')
    <div class="mx-4 sm:flex-row mb-6 gap-4">
        <form action="{{ route('tasks.index') }}" method="GET" class="flex justify-between gap-2">
            <select name="project_id" id="project_id" onchange="this.form.submit()"
                class="rounded-md w-auto px-4 py-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All Projects</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $selectedProjectId == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
            <a href="{{ route('tasks.create') }}"
                class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-600 transition">
                Create Task
            </a>
        </form>
    </div>

    @if($tasks->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-800 px-4 py-3 rounded">
            No tasks found.
        </div>
    @else
        <ul id="taskList" class="space-y-2">
            @foreach($tasks as $task)
                <li class="bg-white rounded-lg shadow p-4 flex justify-between items-center hover:shadow-md transition cursor-move"
                    data-task-id="{{ $task->id }}" data-project-id="{{ $task->project_id }}">
                    <div class="flex items-center space-x-3">
                        <span class="bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            #{{ $task->priority }}
                        </span>
                        <span>
                            {{ $task->name }}
                            <!-- <span class="text-sm text-gray-500 ml-2">(Project: {{ $task->name }})</span> -->
                        </span>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class="px-3 py-1 text-sm text-blue-600 hover:text-blue-800 border border-blue-600 rounded hover:bg-indigo-50 transition">
                            Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 text-sm text-red-600 hover:text-red-900 border border-red-600 rounded hover:bg-red-50 transition"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    @push('scripts')
        @vite(['resources/js/task-dragdrop.js'])
    @endpush
@endsection