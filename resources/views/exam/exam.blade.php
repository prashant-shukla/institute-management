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
            <div id="question-nav" class="overflow-y-auto p-4 flex  gap-3">
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
                            <h2 class="text-lg font-semibold mb-4">{{ $index + 1 }}. {{ $question->question }}</h2>
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <label class="block p-2 border rounded mb-2 cursor-pointer hover:bg-blue-50">
                                    <input type="radio" name="answer_{{ $question->id }}"
                                        value="{{ $option }}" data-id="{{ $question->id }}" class="mr-2">
                                    {{ $question->{'option_' . strtolower($option)} }}
                                </label>
                            @endforeach
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(function () {
    const $questionNav = $('#question-nav .question-btn');
    const $questions = $('.question-box');
    const $prev = $('#prev-btn');
    const $next = $('#next-btn');
    const $saveNext = $('#save-next-btn');
    const $mark = $('#mark-btn');
    const $submit = $('#submit-btn');
    const examId = "{{ $exam->id }}";
    const studentId = "{{ $student->id ?? auth()->id() }}";

    let current = 0;
    const total = $questions.length;

    if (total === 0) return console.warn("No questions found!");

    // 🔹 Initial setup
    $questions.hide().eq(0).show();
    $questionNav.removeClass('active ring-2 ring-blue-500').eq(0).addClass('active ring-2 ring-blue-500');

    function showQuestion(index) {
        $questions.hide().eq(index).show();
        $questionNav.removeClass('ring-2 ring-blue-500').eq(index).addClass('ring-2 ring-blue-500');
        $prev.prop('disabled', index === 0);
        $next.prop('disabled', index === total - 1);
        current = index;
    }

    // 🔹 Navigation (Prev/Next)
    $next.on('click', () => {
        if (current < total - 1) showQuestion(current + 1);
    });
    $prev.on('click', () => {
        if (current > 0) showQuestion(current - 1);
    });

    // 🔹 Sidebar Click
    $questionNav.on('click', function (e) {
        e.preventDefault();
        showQuestion(Number($(this).data('index')));
    });

    // 🔹 Save & Next (Answer)
    $saveNext.on('click', function () {
        const $currQ = $questions.eq(current);
        const $selected = $currQ.find('input[type="radio"]:checked');

        if (!$selected.length) {
            alert("Please select an answer before saving!");
            return;
        }

        const questionId = $selected.data('id');
        const answer = $selected.val();

        $.ajax({
            url: "{{ route('exam.answer.save') }}",
            method: "POST",
            data: {
                exam_id: examId,
                question_id: questionId,
                answer: answer,
                student_id: studentId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                if (res.success) {
                    // 🟢 Mark this question as answered
                    $questionNav.eq(current)
                        .removeClass('bg-red-500 bg-purple-500')
                        .addClass('bg-green-500 text-white');

                    if (current < total - 1) showQuestion(current + 1);
                    else alert("✅ This was the last question.");
                } else {
                    alert("Error saving answer!");
                }
            },
            error: function () {
                alert("Server error while saving answer!");
            }
        });
    });

    // 🔹 Mark for Review
    $mark.on('click', function () {
        $questionNav.eq(current)
            .removeClass('bg-green-500 bg-red-500')
            .addClass('bg-purple-500 text-white');
        if (current < total - 1) showQuestion(current + 1);
    });

    // 🔹 Submit Exam
    $submit.on('click', function () {
        if (confirm("Are you sure you want to submit the exam?")) {
            window.location.href = `/exam/${examId}/submit`;
        }
    });

    // 🔹 Timer
    let [min, sec] = "{{ $exam->duration }}:00".split(':').map(Number);
    const $timer = $('#timer');
    const timerId = setInterval(() => {
        if (sec === 0) {
            if (min === 0) {
                clearInterval(timerId);
                alert("⏰ Time is up! Submitting your exam.");
                window.location.href = `/exam/${examId}/submit`;
                return;
            }
            min--; sec = 59;
        } else sec--;
        $timer.text(`${String(min).padStart(2,'0')}:${String(sec).padStart(2,'0')}`);
    }, 1000);

    // 🔹 On load → mark all unanswered as red 🔴
    $questionNav.each(function (i) {
        $(this).addClass('bg-red-500 text-white');
    });
});
</script>




</body>

</html>
