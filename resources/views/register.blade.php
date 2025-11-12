<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10">
        <h2 class="text-2xl font-bold text-center mb-6">Student Registration Form</h2>

        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Row 1 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">First Name</label>
                    <input type="text" name="firstname" class="w-full border rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Last Name</label>
                    <input type="text" name="lastname" class="w-full border rounded-lg px-3 py-2">
                </div>
            </div>

            <!-- Row 2 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded-lg px-3 py-2" required>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password" class="w-full border rounded-lg px-3 py-2" required
                        autocomplete="new-password">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded-lg px-3 py-2"
                        required autocomplete="new-password">
                </div>
            </div>




            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>

</html>
