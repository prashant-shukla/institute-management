@extends('student.layout')

@section('content')

<div class="max-w-6xl mx-auto">

    <h2 class="text-2xl font-semibold mb-6">Available Exams</h2>

    @if($exams->isEmpty())
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500">No exams available for your course yet.</p>
        </div>
    @else
        <div class="grid gap-6 md:grid-cols-2">
            @foreach($exams as $exam)
                <div class="bg-white shadow-md rounded-3xl p-6 flex flex-col justify-between">

                    <div>
                        {{-- Title --}}
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">
                            {{ $exam->title ?? $exam->name }}
                        </h3>

                        {{-- Meta info --}}
                        <p class="text-gray-700">
                            <span class="font-semibold">Total Questions:</span>
                            {{ $exam->total_questions ?? $exam->questions_count ?? '-' }}
                        </p>

                        <p class="text-gray-700 mt-1">
                            <span class="font-semibold">Total Marks:</span>
                            {{ $exam->total_marks ?? $exam->marks ?? '-' }}
                        </p>

                        <p class="text-gray-700 mt-1">
                            <span class="font-semibold">Duration:</span>
                            {{ $exam->duration_minutes ?? $exam->duration ?? '-' }} mins
                        </p>
                    </div>

                    {{-- Start Button --}}
                    <div class="mt-6">
                        <a href="{{ route('student.exams.show', ['id' => $exam->id]) }}"
                           class="inline-flex items-center justify-center px-6 py-3 rounded-xl
                                  bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                            Start Exam
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>

@endsection
