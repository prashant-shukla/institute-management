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
  </div>

</body>
</html>
