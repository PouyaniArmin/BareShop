<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">

  <div class="flex items-center justify-center min-h-screen">
    <section class="w-[30rem] bg-gray-800 p-8 rounded-lg shadow-lg space-y-8">

      <!-- Title -->
      <div class="text-center text-3xl font-semibold">
        Reset Password
      </div>

      <!-- Success Message -->
      @if (session('status'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
          {{ session('status') }}
        </div>
      @endif

      <!-- Error Messages -->
      @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Form -->
      <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="w-full">
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" 
                 class="w-full py-3 px-4 border-b-2 border-gray-400 bg-transparent text-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 rounded-md placeholder:italic" required />
        </div>

        <div class="w-full">
          <input type="password" name="password" placeholder="New Password"
                 class="w-full py-3 px-4 border-b-2 border-gray-400 bg-transparent text-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 rounded-md placeholder:italic" required />
        </div>

        <div class="w-full">
          <input type="password" name="password_confirmation" placeholder="Confirm New Password"
                 class="w-full py-3 px-4 border-b-2 border-gray-400 bg-transparent text-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 rounded-md placeholder:italic" required />
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full py-3 bg-indigo-600 text-white font-bold rounded-md duration-300 hover:bg-indigo-500 transform transition-all">
          Reset Password
        </button>
      </form>

    </section>
  </div>

</body>

</html>
