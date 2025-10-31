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
        @foreach($exam->questions as $index => $q)
          <button 
            data-index="{{ $index }}"
            data-id="{{ $q->id }}"
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
          <div id="question-{{ $index }}" class="{{ $index === 0 ? '' : 'hidden' }}">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">
              Q{{ $index + 1 }}. {{ $question->question }}
            </h2>

            @if($question->option_a)
              <div class="mt-3 space-y-2">
                @foreach(['A','B','C','D'] as $opt)
                  @php $field = 'option_'.strtolower($opt); @endphp
                  @if($question->$field)
                    <label class="flex items-center gap-2">
                      <input type="radio" name="answer_{{ $question->id }}" value="{{ $opt }}"
                             class="answer text-blue-600" data-qindex="{{ $index }}" data-id="{{ $question->id }}">
                      <span>{{ $opt }}. {{ $question->$field }}</span>
                    </label>
                  @endif
                @endforeach
              </div>
            @endif

            @if($question->image)
              <div class="my-4 flex justify-center">
                <img src="{{ asset('storage/' . $question->image) }}" alt="Question Image"
                     class="rounded-lg shadow w-full max-h-[35vh] object-contain border border-gray-200">
              </div>
            @endif
          </div>
        @endforeach
      </div>

      <!-- Footer Buttons -->
      <div class="fixed bottom-0 left-56 right-0 border-t bg-gray-50 px-6 py-3 flex justify-between items-center">
        <div class="flex gap-3">
          <button id="prev-btn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 text-sm">⬅ Back</button>
          <button id="next-btn" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">Next ➡</button>
        </div>

        <div class="flex gap-3">
          <button onclick="saveAndNext()">Save & Next</button>

          <button id="mark-btn" class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500 text-sm">⭐ Mark</button>
          <button id="submit-btn" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">Submit Exam</button>
        </div>
      </div>
    </section>
  </main>

  <script>
    let current = 0;
    const questions = document.querySelectorAll('[id^="question-"]');
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    const markBtn = document.getElementById('mark-btn');
    const submitBtn = document.getElementById('submit-btn');
    const questionNav = document.querySelectorAll('.question-btn');
    const timerDisplay = document.getElementById('timer');
  
    // 🕒 Timer
    let totalSeconds = {{ $exam->duration }} * 60;
    const timer = setInterval(() => {
      const minutes = Math.floor(totalSeconds / 60);
      const seconds = totalSeconds % 60;
      timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
      if (totalSeconds <= 0) {
        clearInterval(timer);
        alert("⏰ Time’s up! Exam will be submitted automatically.");
        window.location.href = "{{ route('exam.submit', $exam->id) }}";
      }
      totalSeconds--;
    }, 1000);
  
    // 🧭 Navigation
    function showQuestion(index) {
      questions[current].classList.add('hidden');
      current = index;
      questions[current].classList.remove('hidden');
      updateButtons();
    }
  
    nextBtn.addEventListener('click', () => saveAndNext());
    prevBtn.addEventListener('click', () => {
      if (current > 0) showQuestion(current - 1);
    });
  
    questionNav.forEach(btn => {
      btn.addEventListener('click', () => showQuestion(parseInt(btn.dataset.index)));
    });
  
    async function saveAnswer(callback = null) {
      const q = document.querySelector(`#question-${current}`);
      const input = q.querySelector('input[type="radio"]:checked');
      const questionId = q.querySelector('input[type="radio"]')?.dataset.id;
      const answer = input ? input.value : null;
  
      try {
        const res = await fetch("{{ route('exam.answer.save') }}", {
          method: "POST",
          credentials: 'same-origin',
          headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            exam_id: {{ $exam->id }},
            question_id: questionId,
            answer: answer
          })
        });
  
        const data = await res.json().catch(() => null);
        if (!res.ok) {
          console.error('Save failed response:', res.status, data);
          showToast('Error saving answer', 'error');
          return;
        }
  
        // update question nav color
        const btn = questionNav[current];
        btn.classList.remove('bg-gray-200', 'bg-yellow-400');
        if (answer) {
          btn.classList.add('bg-green-500', 'text-white');
        } else {
          btn.classList.add('bg-gray-400', 'text-white'); // not attempted
        }
  
        if (callback) callback();
  
      } catch (err) {
        console.error('Fetch exception:', err);
        showToast('⚠️ Something went wrong! Check console.', 'error');
      }
    }
  
    function saveAndNext() {
      saveAnswer(() => {
        if (current < questions.length - 1) {
          showQuestion(current + 1);
        } else {
          showToast('✅ Last question reached.', 'info');
        }
      });
    }
  
    function showToast(text, type = 'info') {
      const colors = { info: 'bg-blue-500', success: 'bg-green-500', error: 'bg-red-500', warning: 'bg-yellow-400' };
      const toast = document.createElement('div');
      toast.className = `${colors[type] || colors.info} text-white px-4 py-2 rounded fixed top-16 right-6 shadow`;
      toast.textContent = text;
      document.body.appendChild(toast);
      setTimeout(() => toast.remove(), 3000);
    }
  
    // ⭐ Mark for Review
    markBtn.addEventListener('click', () => {
      const btn = questionNav[current];
      btn.classList.toggle('bg-yellow-400');
      btn.classList.toggle('text-white');
    });
  
    // ✅ Submit Exam
    submitBtn.addEventListener('click', () => {
      if (confirm("Are you sure you want to submit the exam?")) {
        document.getElementById('sidebar').classList.add('hidden');
        window.location.href = "{{ route('exam.submit', $exam->id) }}";
      }
    });
  
    // 🔘 Update Button State
    function updateButtons() {
      prevBtn.disabled = (current === 0);
      if (current === questions.length - 1) {
        nextBtn.style.display = 'none';
      } else {
        nextBtn.style.display = 'inline-block';
      }
    }
  
    updateButtons();
  </script>
  
  

</body>
</html>
