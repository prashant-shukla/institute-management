<div class="h-full flex flex-col">



    <nav class="p-4 flex-1">
        <ul class="space-y-3 text-sm">

            {{-- Overview --}}
            <li>
                <a href="{{ route('student.dashboard') }}"
                   class="block p-2 rounded hover:bg-gray-200
                          {{ request()->routeIs('student.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                    Overview
                </a>
            </li>

            {{-- Live Classes --}}
            <li>
                <a href="{{ route('student.live') }}"
                   class="block p-2 rounded hover:bg-gray-200
                          {{ request()->routeIs('student.live') ? 'bg-gray-200 font-semibold' : '' }}">
                    Live Classes
                </a>
            </li>

            {{-- Attendance --}}
            <li>
                <a href="{{ route('student.attendance') }}"
                   class="block p-2 rounded hover:bg-gray-200
                          {{ request()->routeIs('student.attendance') ? 'bg-gray-200 font-semibold' : '' }}">
                    Attendance
                </a>
            </li>

            {{-- Exams --}}
            <li>
                <a href="{{ route('student.exams') }}"
                   class="block p-2 rounded hover:bg-gray-200
                          {{ request()->routeIs('student.exams') ? 'bg-gray-200 font-semibold' : '' }}">
                    Exams
                </a>
            </li>

            {{-- Payments --}}
            <li>
                <a href="{{ route('student.payments') }}"
                   class="block p-2 rounded hover:bg-gray-200
                          {{ request()->routeIs('student.payments') ? 'bg-gray-200 font-semibold' : '' }}">
                    Payments
                </a>
            </li>

            {{-- Profile --}}
            <li>
                <a href="{{ route('student.profile') }}"
                   class="block p-2 rounded hover:bg-gray-200
                          {{ request()->routeIs('student.profile') ? 'bg-gray-200 font-semibold' : '' }}">
                    My Profile
                </a>
            </li>

        </ul>
    </nav>

</div>
