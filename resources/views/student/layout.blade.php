<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        @include('student.partials.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 overflow-y-auto">
            <div class="p-6">
                @yield('content')
            </div>
        </div>

    </div>

</body>
</html>
