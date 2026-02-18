<!DOCTYPE html>
<html>
<head>
    <title>Certificate Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md text-center">

        {{-- Verified Badge --}}
        <div class="mb-4">
            <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                <span class="text-green-600 text-3xl">✔</span>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-6 text-green-600">
            Certificate Verified
        </h2>

        {{-- Optional Student Photo --}}
        @if(!empty($student->photo))
            <img src="{{ asset('storage/'.$student->photo) }}"
                 class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border">
        @endif

        <div class="text-left space-y-2 text-gray-700">

            <p><strong>Name:</strong> {{ $student->user->full_name  ?? 'N/A' }}</p>

            <p><strong>Father's Name:</strong>
                {{ $student->father_name ?? 'N/A' }}
            </p>

            <p><strong>Reg No:</strong>
                {{ $student->reg_no }}
            </p>

            <p><strong>Course:</strong>
                {{ $student->course->name ?? 'N/A' }}
            </p>

            <p><strong>Duration:</strong>
                {{ $student->course->course_duration ?? 'N/A' }}
            </p>

            <p><strong>Issue Date:</strong>
                {{ \Carbon\Carbon::parse($student->certificate->issue_date ?? now())->format('d M, Y') }}
            </p>

        </div>

        <div class="mt-6">
            <a href="{{ url('/') }}"
               class="inline-block px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Back to Home
            </a>
        </div>

    </div>

</body>
</html>
