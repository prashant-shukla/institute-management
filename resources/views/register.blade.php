<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    {{-- <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800">Create Account</h2>
    <p class="text-sm text-gray-500 text-center mb-6">Sign up to get started with us.</p>

    <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
      @csrf
      <input type="text" name="name" placeholder="Full Name" class="border p-2 w-full rounded">
      <input type="email" name="email" placeholder="Email" class="border p-2 w-full rounded">
      <input type="password" name="password" placeholder="Password" class="border p-2 w-full rounded">
      <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border p-2 w-full rounded">
      <button class="bg-indigo-600 text-white px-4 py-2 rounded">Register</button>
  </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Already have an account? <a href="login.html" class="text-indigo-600 font-medium hover:underline">Login</a>
    </p>
  </div> --}}

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10">
        <h2 class="text-2xl font-bold text-center mb-6">Online Registration Form</h2>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">

            <!-- Row 1 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">First Name</label>
                    <input type="text" name="firstname"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Last Name</label>
                    <input type="text" name="lastname"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                </div>
            </div>

            <!-- Row 2 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Photo</label>
                    <input type="file" name="photo" class="w-full border rounded-lg px-3 py-2">
                </div>
            </div>

            <!-- Row 4 -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Date of Birth</label>
                    <input type="date" name="dob"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Phone No</label>
                    <input type="text" name="phone"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Row 5 -->
                <div>
                    <label class="block text-sm font-medium mb-1">Father's Name</label>
                    <input type="text" name="father_name"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

                <!-- Row 6 -->
                <div>
                    <label class="block text-sm font-medium mb-1">Qualification</label>
                    <input type="text" name="qualification"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                </div>
            </div>
            <!-- Row 7 -->
            <div>
                <label class="block text-sm font-medium mb-1">Correspondence Address</label>
                <textarea name="correspondence_address" rows="2"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
            </div>

            <!-- Row 8 -->
            <div>
                <label class="block text-sm font-medium mb-1">Permanent Address</label>
                <textarea name="permanent_address" rows="2"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
            </div>



            <!-- Submit -->
            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    Register
                </button>
            </div>

        </form>
    </div>


</body>

</html>
