<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

    <!-- Heading -->
    <h2 class="text-2xl font-bold text-center text-gray-800">
        Create Account
    </h2>
    <p class="text-sm text-gray-500 text-center mb-6">
        Fill in the details to create your account
    </p>

    <!-- Errors -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded text-sm mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- First Name -->
        <input type="text" name="firstname"
               placeholder="First Name"
               class="border p-2 w-full rounded"
               required>

        <!-- Last Name -->
        <input type="text" name="lastname"
               placeholder="Last Name"
               class="border p-2 w-full rounded">

        <!-- Username -->
        <input type="text" name="username"
               placeholder="Username"
               class="border p-2 w-full rounded"
               required>

        <!-- Email -->
        <input type="email" name="email"
               placeholder="Email"
               class="border p-2 w-full rounded"
               required>

        <!-- Password -->
        <input type="password" name="password"
               placeholder="Password"
               class="border p-2 w-full rounded"
               required autocomplete="new-password">

        <!-- Confirm Password -->
        <input type="password" name="password_confirmation"
               placeholder="Confirm Password"
               class="border p-2 w-full rounded"
               required autocomplete="new-password">

        <!-- Button -->
        <button type="submit"
                class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            Register
        </button>
    </form>

    <!-- Login link -->
    <p class="mt-6 text-sm text-center text-gray-600">
        Already have an account?
        <a href="{{ route('login') }}"
           class="text-indigo-600 font-medium hover:underline">
            Login
        </a>
    </p>

</div>

</body>
</html>
