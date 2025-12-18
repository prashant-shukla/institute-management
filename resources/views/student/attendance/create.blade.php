@extends('student.layout')

@section('content')

<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">

    <h2 class="text-2xl font-semibold mb-6 flex items-center gap-2">
        📝 Mark Attendance
    </h2>

    {{-- Success / Error message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Date + Day --}}
    <div class="mb-4 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Today</p>
            <p class="text-lg font-semibold">{{ $todayDate }}</p>
        </div>
        <div class="text-right">
            <p class="text-sm text-gray-500">Day</p>
            <p class="text-lg font-semibold">{{ $dayName }}</p> {{-- Sunday / Monday etc --}}
        </div>
    </div>

    {{-- Agar attendance already marked hai → sirf status dikhayenge, toggle nahi --}}
    @if($hasAttendance && $attendanceStatus === 'present')
        <div class="mt-4 bg-gray-100 p-4 rounded-lg flex items-center justify-between">
            <span class="font-medium text-gray-700">Today Status:</span>

            <span class="px-3 py-1 rounded-full bg-green-500 text-white text-sm font-semibold">
                Present
            </span>
        </div>

        <p class="mt-3 text-sm text-gray-500">
            You have already marked your attendance for today.
        </p>
    @else
        {{-- Attendance not yet marked for today → toggle visible --}}
        <form id="attendanceForm" action="{{ route('student.attendance.store') }}" method="POST">
            @csrf

            {{-- Hidden Date --}}
            <input type="hidden" name="date" value="{{ $todayDate }}">

            {{-- Hidden Status (always "present" for toggle ON) --}}
            <input type="hidden" name="status" id="statusField" value="present">

            {{-- Toggle Present --}}
            <div class="mb-6 flex items-center justify-between bg-gray-100 p-4 rounded-lg">
                <span class="font-medium text-gray-700">Mark as Present:</span>

                <label class=" items-center cursor-pointer">

                    {{-- Toggle: default OFF --}}
                    <input type="checkbox" id="statusToggle" class="sr-only peer">

                    <div class="w-14 h-8 bg-gray-300 rounded-full peer-checked:bg-green-500 relative transition-all">
                        <div class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow peer-checked:translate-x-6 transition-all"></div>
                    </div>

                    <span id="statusText" class="ml-3 text-gray-800 font-medium">Not Marked</span>
                </label>
            </div>

            {{-- Remarks --}}

        </form>
    @endif

</div>

{{-- Toggle logic --}}
@if(! ($hasAttendance && $attendanceStatus === 'present'))
<script>
    const toggle      = document.getElementById("statusToggle");
    const statusText  = document.getElementById("statusText");
    const form        = document.getElementById("attendanceForm");

    if (toggle) {
        toggle.addEventListener("change", function() {
            if (this.checked) {
                statusText.textContent = "Present";

                // ek baar ON kar diya to wapas OFF na kar sake
                this.disabled = true;

                form.submit(); // 🔥 auto-submit as Present
            }
        });
    }
</script>
@endif

@endsection
