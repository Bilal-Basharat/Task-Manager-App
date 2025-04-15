<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Current Page Indicator -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('tasks.index') }}" 
                       class="{{ request()->routeIs('tasks.*') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Tasks
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="{{ request()->routeIs('projects.*') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} ml-8 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>