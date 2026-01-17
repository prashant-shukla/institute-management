@extends('student.layout')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- ===============================
       PURCHASED EXAMS
    =============================== --}}
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center gap-2">
            🎓 Your Purchased Exams
        </h2>

        @if($purchasedExams->isEmpty())
            <div class="bg-white border rounded-xl p-6 text-center text-gray-500">
                You have not purchased any exams yet.
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($purchasedExams as $exam)
                    <div class="relative bg-gradient-to-br from-green-50 to-white
                                border border-green-200 rounded-2xl p-6 shadow-sm
                                hover:shadow-lg transition">

                        <span class="absolute top-3 right-3 bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                            Purchased
                        </span>

                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $exam->name }}
                        </h3>

                        <div class="mt-3 text-sm text-gray-600 space-y-1">
                            <p>📘 Questions: {{ $exam->total_questions }}</p>
                            <p>🏆 Marks: {{ $exam->total_marks }}</p>
                            <p>⏱ Duration: {{ $exam->duration }} mins</p>
                        </div>

                        <a href="{{ route('student.exams.show', $exam->id) }}"
                           class="mt-5 inline-flex justify-center w-full
                                  bg-green-600 hover:bg-green-700
                                  text-white py-2 rounded-lg font-medium transition">
                            Start Exam
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- ===============================
       ALL EXAMS BY CATEGORY
    =============================== --}}
    <div>
        <h2 class="text-2xl font-bold text-indigo-700 mb-6">
            📚 Explore All Exams
        </h2>

        @foreach($allExams as $category => $exams)

            <h3 class="text-xl font-semibold text-indigo-600 mb-4 mt-10 border-l-4 border-indigo-500 pl-3">
                {{ $category }}
            </h3>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($exams as $exam)
                    <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">

                        <h4 class="text-lg font-semibold text-gray-800 mb-2">
                            {{ $exam->name }}
                        </h4>

                        <div class="text-sm text-gray-600 space-y-1">
                            <p>📘 Questions: {{ $exam->total_questions }}</p>
                            <p>🏆 Marks: {{ $exam->total_marks }}</p>
                            <p>⏱ Duration: {{ $exam->duration }} mins</p>
                        </div>

                       <a href="{{ route('exam.payment', $exam->id) }}"
                          class="mt-4 inline-flex w-full justify-center
                                  bg-indigo-600 hover:bg-indigo-700
                                  text-white py-2 rounded-lg font-semibold transition">
                            Enroll Now
                      </a>
                    </div>
                @endforeach
            </div>

        @endforeach
    </div>

</div>

@endsection


