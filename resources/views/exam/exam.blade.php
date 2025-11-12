<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $exam->name }} - Exam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .question-btn.active {
            background-color: #2563eb;
            /* blue-600 */
            color: white;
        }
    </style>

</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

    <!-- Header -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
            <h1 class="text-xl font-bold text-blue-600">{{ $exam->name }} - Certification Exam</h1>
            <span class="text-gray-600 text-sm">🕒 Time Left: <b id="timer">{{ $exam->duration }}:00</b></span>
        </div>
    </header>

    <!-- Main Layout -->
    <main class="pt-16 flex h-[calc(100vh-4rem)]">

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white border-r border-gray-300 flex flex-col">
            <div class="px-4 py-3 border-b font-semibold text-gray-700 text-center">
                Questions
            </div>
            <div id="question-nav" class="overflow-y-auto p-4 flex flex-col gap-3">
                @foreach ($exam->questions as $index => $q)
                    <button data-index="{{ $index }}" data-id="{{ $q->id }}"
                        class="question-btn w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 hover:bg-blue-500 hover:text-white text-sm font-semibold text-gray-700 transition">
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>
        </aside>



        <!-- Question Area -->
        <section class="flex-1 bg-white flex flex-col">
            <div class="overflow-y-auto p-6 flex-1">
                @if ($exam->questions->count() > 0)
                    @foreach ($exam->questions as $index => $question)
                        <div id="question-{{ $index }}"
                            class="question-box @if ($index !== 0) hidden @endif">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                Q{{ $index + 1 }}.
                                {{ $question->question ?? ($question->question_text ?? 'No question text found') }}
                            </h2>

                            @if (!empty($question->image))
                                <div class="my-4 flex justify-center">
                                    <img src="{{ asset('storage/' . $question->image) }}"
                                        class="rounded-lg shadow w-full max-h-[35vh] object-contain border border-gray-200">
                                </div>
                            @endif

                            <div class="mt-3 space-y-2">
                                @foreach (['A', 'B', 'C', 'D'] as $opt)
                                    @php
                                        // Support for both naming styles (option_a / options JSON)
                                        $field = 'option_' . strtolower($opt);
                                        $label = $question->$field ?? null;
                                    @endphp

                                    @if ($label)
                                        <label class="flex items-center gap-2">
                                            <input type="radio" name="answer_{{ $question->id }}"
                                                value="{{ $opt }}" class="answer text-blue-600"
                                                data-qindex="{{ $index }}" data-id="{{ $question->id }}">
                                            <span>{{ $opt }}. {{ $label }}</span>
                                        </label>
                                    @endif
                                @endforeach

                                {{-- If stored in JSON (fallback) --}}
                                @if (!$question->option_a && $question->options)
                                    @foreach (json_decode($question->options, true) as $key => $option)
                                        <label class="flex items-center gap-2">
                                            <input type="radio" name="answer_{{ $question->id }}"
                                                value="{{ $key }}" class="answer text-blue-600"
                                                data-qindex="{{ $index }}" data-id="{{ $question->id }}">
                                            <span>{{ $key }}. {{ $option }}</span>
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-gray-500">No questions available for this exam.</p>
                @endif
            </div>

            <!-- Footer Buttons -->
            <div class="fixed bottom-0 left-56 right-0 border-t bg-gray-50 px-6 py-3 flex justify-between items-center">
                <div class="flex gap-3">
                    <button id="prev-btn"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 text-sm">⬅ Back</button>
                    <button id="next-btn"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">Next ➡</button>
                </div>

                <div class="flex gap-3">
                    <button id="save-next-btn"
                        class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 text-sm">💾 Save &
                        Next</button>
                    <button id="mark-btn"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 text-sm">⭐
                        Mark</button>
                    <button id="submit-btn"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">Submit
                        Exam</button>
                </div>
            </div>
        </section>

    </main>

    <!-- ✅ Add this before your custom script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            const questionNav = $('.question-btn');
            const questions = $('[id^="question-"]');
            const prevBtn = $('#prev-btn');
            const nextBtn = $('#next-btn');
            const saveNextBtn = $('#save-next-btn');
            const markBtn = $('#mark-btn');
            const submitBtn = $('#submit-btn');
            const examId = "{{ $exam->id }}";

            let current = 0;
            const total = questions.length;

            // ✅ Question button click
            questionNav.on('click', function() {
                questionNav.removeClass('active');
                $(this).addClass('active');
            });

            // ✅ Show question by index
            function showQuestion(index) {
                questions.addClass('hidden').eq(index).removeClass('hidden');
                questionNav.removeClass('ring-2 ring-blue-500')
                    .eq(index).addClass('ring-2 ring-blue-500');
                prevBtn.prop('disabled', index === 0);
                nextBtn.prop('disabled', index === total - 1);
                current = index;
            }

            // 🧭 Navigation
            nextBtn.on('click', () => {
                if (current < total - 1) showQuestion(current + 1);
            });
            prevBtn.on('click', () => {
                if (current > 0) showQuestion(current - 1);
            });
            questionNav.each(function(index) {
                $(this).on('click', e => {
                    e.preventDefault();
                    showQuestion(index);
                });
            });

            // 💾 Save & Next
            saveNextBtn.on('click', () => {
                const currentQuestion = questions.eq(current);
                const selected = currentQuestion.find('input[type="radio"]:checked');
                if (!selected.length) return alert('Please select an answer before saving!');

                const questionId = selected.data('id');
                const answer = selected.val();
                const studentId = "{{ $student->id ?? auth()->id() }}"; // adjust as needed

                $.ajax({
                    url: "{{ route('exam.answer.save') }}", // 👈 Laravel route
                    type: "POST",
                    data: {
                        exam_id: "{{ $exam->id }}",
                        question_id: questionId,
                        answer: answer,
                        student_id: studentId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.success) {
                            questionNav.eq(current).addClass('bg-green-500 text-white');
                            if (current < total - 1) showQuestion(current + 1);
                            else alert('✅ This was the last question.');
                        } else {
                            alert('⚠️ Error saving answer.');
                        }
                    },
                    error: function() {
                        alert('🚨 Server error while saving.');
                    }
                });
            });


            // ⭐ Mark Question
            markBtn.on('click', () => {
                questionNav.eq(current).addClass('bg-yellow-400 text-white');
                if (current < total - 1) showQuestion(current + 1);
            });

            // ✅ Submit Exam
            submitBtn.on('click', () => {
                if (confirm('Are you sure you want to submit the exam?')) {
                    window.location.href = `/exam/${examId}/submit`;
                }
            });


            // ⏱️ Timer
            let [minutes, seconds] = "{{ $exam->duration }}:00".split(':').map(Number);
            const timer = $('#timer');
            const countdown = setInterval(() => {
                if (seconds === 0) {
                    if (minutes === 0) {
                        clearInterval(countdown);
                        alert('⏰ Time is up! Submitting your exam.');
                        window.location.href = `/exam/${examId}/submit`;
                        return;
                    }
                    minutes--;
                    seconds = 59;
                } else seconds--;
                timer.text(`${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`);
            }, 1000);

            // 🧩 Init first question
            showQuestion(0);
        });
    </script>


</body>

</html>
