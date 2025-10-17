<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AutoCAD Exam Interface</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

  <!-- Header -->
  <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
      <h1 class="text-xl font-bold text-blue-600">AutoCAD Certification Exam</h1>
      <span class="text-gray-600 text-sm">Exam Mode Active</span>
    </div>
  </header>

  <!-- Main Layout -->
  <main class="pt-16 flex h-[calc(100vh-4rem)]">

    <!-- Left Panel (Questions Only) -->
    <section class="w-full bg-white border-r border-gray-300 flex flex-col">

      <!-- Info Bar -->
      <div class="flex items-center justify-between px-6 py-2 text-sm bg-gray-50 border-b">
        <span>🕒 Time Left: <b>40:00</b></span>
        <span>|</span>
        <span>Question <b>9-10 of 30</b></span>
      </div>

      <!-- Scrollable Content -->
      <div class="overflow-y-auto p-6 flex-1">
        <!-- Question Title -->
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Question 9: Draw a Line</h2>

        <!-- Question Text -->
        <p class="text-gray-700 mb-3">
          Insert the <b>Stamp</b> block using endpoint <b>1</b> as the insertion point.<br>
          Draw a line from the geometric center of the block perpendicular to <b>2</b>.
        </p>
        <p class="text-gray-800 mb-3 font-medium">
          What is the length of the new line?
        </p>

        <!-- Answer Input -->
        <input type="number" step="0.001" placeholder="Enter value (e.g., 0.5243)"
               class="w-56 border border-gray-300 rounded-md px-3 py-2 mb-5 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        <!-- Question Image (Now Below Question) -->
        <div class="mb-6 flex justify-center">
          <img src="https://www.autodesk.com/blogs/autocad/wp-content/uploads/sites/35/2020/03/Web-Mobile-App-Extended-Feature-1536x830-1.jpg"
               alt="Question Reference"
               class="rounded-lg shadow w-full max-h-[60vh] object-contain border border-gray-200">
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 mb-6">
          <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Next Question</button>
          <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm">Mark for Review</button>
          <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm">Mark for Comment</button>
        </div>

        <!-- Progress Section -->
        <div class="border-t pt-3 text-sm text-gray-600">
          <p>✅ 17 Create a Hatch</p>
          <p>✅ 18 Array the Table and Chairs</p>
          <p>📘 19 Objects in a Drawing (Current)</p>
        </div>
      </div>

      <!-- Bottom Navigation -->
      <div class="border-t bg-gray-50 px-6 py-3 flex justify-between items-center">
        <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 text-sm flex items-center gap-1">
          ⟳ Restart AutoCAD
        </button>

        <div class="flex gap-3">
          <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 text-sm">⬅ Back</button>
          <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">Next ➡</button>
        </div>
      </div>
    </section>
  </main>

</body>
</html>
