<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $exam->name }} - Exam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <aside id="sidebar" class="w-56 bg-white border-r border-gray-300 flex flex-col">
            <div class="px-4 py-3 border-b font-semibold text-gray-700">Questions</div>
            <div id="question-nav" class="flex-1 overflow-y-auto p-3 grid grid-cols-4 gap-2">
                @foreach ($exam->questions as $index => $q)
                    <button data-index="{{ $index }}" data-id="{{ $q->id }}"
                        class="question-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-gray-300 text-sm font-semibold text-gray-700">
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>
        </aside>

        <!-- Question Area -->
        <section class="flex-1 bg-white flex flex-col">

          <div class="overflow-y-auto p-6 flex-1">
            @foreach($exam->questions as $index => $question)
            <div id="question-{{ $index }}" @if($index !== 0) class="hidden" @endif>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">
                        Q{{ $index + 1 }}. {{ $question->question }}
                    </h2>
        
                    @if($question->image)
                        <div class="my-4 flex justify-center">
                            <img src="{{ asset('storage/' . $question->image) }}"
                                 class="rounded-lg shadow w-full max-h-[35vh] object-contain border border-gray-200">
                        </div>
                    @endif
        
                    <div class="mt-3 space-y-2">
                        @foreach(['A','B','C','D'] as $opt)
                            @php $field = 'option_' . strtolower($opt); @endphp
                            @if($question->$field)
                                <label class="flex items-center gap-2">
                                    <input type="radio"
                                           name="answer_{{ $question->id }}"
                                           value="{{ $opt }}"
                                           class="answer text-blue-600"
                                           data-qindex="{{ $index }}"
                                           data-id="{{ $question->id }}">
                                    <span>{{ $opt }}. {{ $question->$field }}</span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
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
                        class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500 text-sm">⭐
                        Mark</button>
                    <button id="submit-btn"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">Submit
                        Exam</button>
                </div>
            </div>
        </section>
    </main>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
          let current = 0;
          const questionNav = document.querySelectorAll('.question-btn');
          const questions = document.querySelectorAll('[id^="question-"]');
          const total = questions.length;
      
          function showQuestion(index) {
              questions.forEach((q, i) => q.classList.toggle('hidden', i !== index));
              current = index;
      
              document.getElementById('prev-btn').disabled = index === 0;
              document.getElementById('next-btn').disabled = index === total - 1;
      
              questionNav.forEach(btn => btn.classList.remove('ring-2', 'ring-blue-500'));
              if (questionNav[index]) questionNav[index].classList.add('ring-2', 'ring-blue-500');
          }
      
          questionNav.forEach((btn, index) => btn.addEventListener('click', () => showQuestion(index)));
      
          document.getElementById('next-btn').addEventListener('click', () => {
              if (current < total - 1) showQuestion(current + 1);
          });
      
          document.getElementById('prev-btn').addEventListener('click', () => {
              if (current > 0) showQuestion(current - 1);
          });
      
          // Show first question on load
          showQuestion(0);
      });
    </script>
      
            

</body>

</html>
