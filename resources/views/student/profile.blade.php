@extends('student.layout')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    {{-- Heading --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-semibold">My Profile</h2>
            <p class="text-gray-500 text-sm">Personal, course, fee & attendance details</p>
        </div>
    </div>

    {{-- Top: Basic Info --}}
    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-lg font-semibold mb-4">Basic Information</h3>

        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Full Name</p>
                <p class="font-medium">
                    {{ ($user->firstname ?? '') . ' ' . ($user->lastname ?? '') }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Username</p>
                <p class="font-medium">{{ $user->username ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500">Email</p>
                <p class="font-medium">{{ $user->email }}</p>
            </div>

            <div>
                <p class="text-gray-500">Phone</p>
                <p class="font-medium">{{ $student->mobile_no ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- Student & Course Details --}}
    <div class="grid md:grid-cols-2 gap-6">

        {{-- Student Details --}}
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4">Student Details</h3>

            <div class="space-y-2 text-sm">
                <p>
                    <span class="text-gray-500">Reg No:</span>
                    <span class="font-medium">{{ $student->reg_no ?? '-' }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Reg Date:</span>
                    <span class="font-medium">
                        {{ optional($student->reg_date)->format('Y-m-d') ?? '-' }}
                    </span>
                </p>
                <p>
                    <span class="text-gray-500">Father Name:</span>
                    <span class="font-medium">{{ $student->father_name ?? '-' }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Date of Birth:</span>
                    <span class="font-medium">
                        {{ optional($student->date_of_birth)->format('Y-m-d') ?? '-' }}
                    </span>
                </p>
                <p>
                    <span class="text-gray-500">Qualification:</span>
                    <span class="font-medium">{{ $student->qualification ?? '-' }}</span>
                </p>
            </div>
        </div>

        {{-- Course Details --}}
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4">Course Details</h3>

            <div class="space-y-2 text-sm">
                <p>
                    <span class="text-gray-500">Course Name:</span>
                    <span class="font-medium">{{ $course->name ?? '-' }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Mode:</span>
                    <span class="font-medium">
                        {{ $student->is_online ? 'Online' : 'Offline' }}
                    </span>
                </p>
                <p>
                    <span class="text-gray-500">College / Workplace:</span>
                    <span class="font-medium">{{ $student->college_workplace ?? '-' }}</span>
                </p>
            </div>
        </div>

    </div>

    {{-- Fee + Attendance Summary --}}
    <div class="grid md:grid-cols-2 gap-6">

        {{-- Fee Summary --}}
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4">Fee Summary</h3>

            <div class="space-y-2 text-sm">
                <p>
                    <span class="text-gray-500">Total Fee (with GST):</span>
                    <span class="font-bold">₹{{ number_format($totalFee, 2) }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Total Paid:</span>
                    <span class="font-bold text-green-600">₹{{ number_format($totalPaid, 2) }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Pending Amount:</span>
                    <span class="font-bold text-red-600">₹{{ number_format($balance, 2) }}</span>
                </p>
            </div>

            <a href="{{ route('student.payments') }}"
               class="inline-block mt-4 text-sm text-blue-600 hover:underline">
                View payment history →
            </a>
        </div>

        {{-- Attendance Summary --}}
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4">Attendance Summary</h3>

            <div class="space-y-2 text-sm">
                <p>
                    <span class="text-gray-500">Total Classes:</span>
                    <span class="font-medium">{{ $totalSessions }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Present:</span>
                    <span class="font-medium text-green-600">{{ $presentCount }}</span>
                </p>
                <p>
                    <span class="text-gray-500">Attendance %:</span>
                    <span class="font-bold">{{ $attendancePercent }}%</span>
                </p>
            </div>

            <a href="{{ route('student.attendance') }}"
               class="inline-block mt-4 text-sm text-blue-600 hover:underline">
                Go to attendance →
            </a>
        </div>

    </div>

</div>

@endsection
