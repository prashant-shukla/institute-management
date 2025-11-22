@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Panel</title>
    @vite('resources/css/app.css')

    {{-- Alpine.js for small interactivity (dropdown) --}}
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex flex-col">

    {{-- 🔹 TOP BAR – full width --}}
    <header class="bg-white shadow-sm">
        <div class="flex items-center justify-between px-8 py-3">

            {{-- Left: fixed title --}}
            <div class="font-bold text-lg">
                Student Panel
            </div>



            {{-- Right: avatar + name dropdown + bell --}}
            <div class="flex items-center gap-4">
                @php
                    $user        = Auth::user();
                    $student     = $user?->student;
                    $avatar      = $student?->photo ? asset('storage/' . $student->photo) : null;
                    $displayName = $user ? ($user->firstname ?? $user->name ?? $user->email) : '';
                @endphp

                @if($user)
                    {{-- Avatar + name dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        {{-- Pill button --}}
                        <button @click="open = !open"
                                class="flex items-center bg-gray-100 rounded-full px-3 py-1.5 shadow-sm hover:bg-gray-200 transition">

                            {{-- Avatar circle --}}
                            <div class="w-8 h-8 rounded-full bg-gray-300 overflow-hidden flex items-center justify-center mr-2">
                                @if($avatar)
                                    <img src="{{ $avatar }}" alt="Avatar" class="w-full h-full object-cover">
                                @else
                                    <span class="text-sm font-semibold text-gray-700">
                                        {{ strtoupper(mb_substr($displayName, 0, 1)) }}
                                    </span>
                                @endif
                            </div>

                            {{-- Name --}}
                            <span class="text-sm font-medium text-gray-800">
                                {{ $displayName }}
                            </span>

                            {{-- Small arrow --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4 ml-1 text-gray-500" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Dropdown menu --}}
                        <div x-show="open"
                             x-transition
                             @click.outside="open = false"
                             class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg py-2 border z-50">

                            <a href="{{ route('student.profile') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                My Profile
                            </a>

                            <form action="{{ route('student.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

              
                @endif
            </div>
        </div>
    </header>

    {{-- 🔹 MAIN AREA – sidebar + content, full width --}}
    <div class="flex flex-1">

        {{-- Sidebar (fixed width) --}}
        <aside class="w-72 bg-white shadow-md">
            @include('student.partials.sidebar')
        </aside>

        {{-- Content (takes remaining full width) --}}
        <main class="flex-1 p-8 space-y-6">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
