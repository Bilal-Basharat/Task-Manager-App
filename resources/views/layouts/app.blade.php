<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mx-4">
    @include('components.nav')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-black mb-6 text-center">Task Manager</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>