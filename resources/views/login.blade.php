<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BareShop</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <!-- page -->
  <form action="" method="POST">
    @csrf <!-- CSRF Token -->

    <main class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white">
      <section class="flex w-[30rem] flex-col space-y-10">
        <div class="text-center text-4xl font-medium">Log In</div>

        <!-- Alert Messages -->
        @if ($errors->any())
        <div class="max-w-4xl mx-auto" id="alertBox">
          <div class="bg-red-50 border-l-8 border-red-900">
            <div class="flex items-center">
              <div class="p-2">
                <div class="flex items-center">
                  <div class="ml-2">
                    <svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" onclick="closeAlert()">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="px-6 py-4 text-red-900 font-semibold text-lg">Please fix the
                    following errors.</p>
                </div>
                <div class="px-16 mb-4">
                  @foreach($errors->all() as $error)
                  <li class="text-md font-bold text-red-500 text-sm">{{ $error }}</li>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

        @if (session('status'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
          {{ session('status') }}
        </div>
        @endif

        <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
          <input type="email" name="email" placeholder="Email" class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
        </div>

        <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
          <input type="password" name="password" placeholder="Password" class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
        </div>

        <button type="submit" class="transform rounded-sm bg-indigo-600 py-2 font-bold duration-300 hover:bg-indigo-400">
          LOG IN
        </button>

        <!-- Google Login Button -->
        <a href="{{ route('login.google') }}" class="transform rounded-sm bg-red-600 py-2 font-bold text-white duration-300 hover:bg-red-400 text-center mt-4">
          Login with Google
        </a>

        <a href="#" class="transform text-center font-semibold text-gray-500 duration-300 hover:text-gray-300">FORGOT PASSWORD?</a>

        <p class="text-center text-lg">
          No account?
          <a href="#" class="font-medium text-indigo-500 underline-offset-4 hover:underline">Create One</a>
        </p>
      </section>
    </main>
  </form>

  <script>
    // Close alert function
    function closeAlert() {
      document.getElementById("alertBox").style.display = "none";
    }
  </script>
</body>

</html>
