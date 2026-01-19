@extends('student.layout')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- ===============================
       PURCHASED EXAMS
    =============================== --}}
    <h2 class="text-2xl font-bold text-green-700 mb-6">
        🎓 Your Purchased Exams
    </h2>

    @if($purchasedExams->isEmpty())
        <div class="bg-white border rounded-xl p-6 text-center text-gray-500">
            You have not purchased any exams yet.
        </div>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($purchasedExams as $exam)
                <div class="bg-green-50 border border-green-200 rounded-2xl p-6 shadow">

                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $exam->name }}
                    </h3>

                    <p class="text-sm mt-2">📘 Questions: {{ $exam->total_questions }}</p>
                    <p class="text-sm">🏆 Marks: {{ $exam->total_marks }}</p>
                    <p class="text-sm">⏱ Duration: {{ $exam->duration }} mins</p>

                    <a href="{{ route('student.exams.show', $exam->id) }}"
                       class="mt-4 block text-center bg-green-600 text-white py-2 rounded-lg font-semibold">
                        Start Exam
                    </a>
                </div>
            @endforeach
        </div>
    @endif


    {{-- ===============================
       ALL EXAMS (CATEGORY WISE)
    =============================== --}}
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">
        📚 All Exams
    </h2>

    @foreach($allExams as $category => $exams)

        <h3 class="text-xl font-semibold text-indigo-600 mt-8 mb-4">
            {{ $category }}
        </h3>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($exams as $exam)

                <div class="bg-white shadow rounded-2xl p-6">

                    <h4 class="text-lg font-semibold">
                        {{ $exam->name }}
                    </h4>

                    <p class="text-sm">📘 Questions: {{ $exam->total_questions }}</p>
                    <p class="text-sm">🏆 Marks: {{ $exam->total_marks }}</p>
                    <p class="text-sm">⏱ Duration: {{ $exam->duration }} mins</p>

                    @if($purchasedExams->contains('id', $exam->id))
                        {{-- Already purchased --}}
                        <a href="{{ route('student.exams.show', $exam->id) }}"
                           class="mt-4 block text-center bg-green-600 text-white py-2 rounded-lg">
                            Start Exam
                        </a>
                    @else
                        {{-- Not purchased --}}
                        <a href="{{ route('exam.payment', $exam->id) }}"
                           class="mt-4 block text-center bg-indigo-600 text-white py-2 rounded-lg">
                            Enroll Now
                        </a>
                    @endif

                </div>

            @endforeach

        </div>

    @endforeach

</div>

@endsection
