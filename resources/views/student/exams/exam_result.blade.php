@extends('student.layout')

@section('content')
<div class="bg-gray-100 text-gray-700  flex flex-col items-center justify-center p-4">

    <!-- Result Card -->
    <div class="bg-white shadow-lg rounded-xl max-w-xl w-full p-4 text-center border-t-4 border-blue-600">
        <h1 class="text-xl font-bold text-blue-500 mb-2">
            {{ $exam->title ?? ($exam->name ?? 'Untitled Exam') }}
        </h1>

        <p class="text-gray-500 text-sm mb-4">Exam Completed Successfully</p>

        <!-- Candidate Info -->
        <div class="mb-4">
            <p class="text-lg font-semibold">
                👤 Candidate:
                <span class="text-gray-600">{{ $user->username ?? 'N/A' }}</span>
            </p>

            @php
            $examDate = $answers->first()->created_at ?? $exam->created_at;
            @endphp

            <p class="text-sm text-gray-400">
                Exam Date: <b>{{ \Carbon\Carbon::parse($examDate)->format('d M Y') }}</b>
            </p>
        </div>


        <!-- Score Summary -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-2xl font-bold text-blue-600">{{ $result['total_questions'] ?? 0 }}</p>
                <p class="text-sm text-gray-600">Total Questions</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <p class="text-2xl font-bold text-green-600">{{ $result['attempted'] ?? 0 }}</p>
                <p class="text-sm text-gray-600">Attempted</p>
            </div>
            <div class="bg-yellow-50 p-4 rounded-lg">
                <p class="text-2xl font-bold text-yellow-600">{{ $result['correct'] ?? 0 }}</p>
                <p class="text-sm text-gray-600">Correct</p>
            </div>
            <div class="bg-red-50 p-4 rounded-lg">
                <p class="text-2xl font-bold text-red-600">{{ $result['wrong'] ?? 0 }}</p>
                <p class="text-sm text-gray-600">Wrong</p>
            </div>
        </div>

        <!-- Percentage & Result -->
        <div class="mb-6">
            <p class="text-lg font-semibold">
                Score Percentage:
                <span class="text-blue-600 font-bold">
                    {{ $result['percentage'] ?? 0 }}%
                </span>
            </p>

            <p class="text-lg mt-2 font-semibold">
                Result:
                @if (($result['percentage'] ?? 0) >= 40)
                <span class="text-green-600 font-bold">PASS ✅</span>
                @else
                <span class="text-red-600 font-bold">FAIL ❌</span>
                @endif
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mt-6 mb-6">
            <a href="{{ route('student.exams.show', ['id' => $exam->id]) }}"
                class="bg-gray-200 text-gray-800 px-5 py-2 rounded-md hover:bg-gray-300 transition">
                🔁 Retake Exam
            </a>
        </div>
        <a href="{{  route('student.exam.history') }}"
            class="bg-gray-200 text-gray-800 px-5 mt-6 py-2 rounded-md hover:bg-gray-300 transition">
            History
        </a>
    </div>

</div>
@endsection