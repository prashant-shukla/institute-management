<!DOCTYPE html>
<html>
<head>
    <title>Certificate Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-center">

        <h2 class="text-2xl font-bold mb-4 text-green-600">
            Certificate Verified ✅
        </h2>

        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Reg No:</strong> {{ $student->reg_no }}</p>
        <p><strong>Course:</strong> {{ $student->course->name ?? '' }}</p>
        <p><strong>Duration:</strong> {{ $student->course->course_duration ?? '' }}</p>

    </div>

</body>
</html>
