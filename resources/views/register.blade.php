<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BareShop - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- page -->
    <form action="" method="post">
        @csrf
        <main class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white">
            <!-- component -->
            <section class="flex w-[30rem] flex-col space-y-10">
                <div class="text-center text-4xl font-medium">Sign Up</div>

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
                                    <li class="text-md font-bold text-red-500 text-sm">Name field is required.</li>
                                    <li class="text-md font-bold text-red-500 text-sm">Email field is required.</li>
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

                <!-- Full Name -->
                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input
                        name="name"
                        type="text"
                        placeholder="Full Name"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>

                <!-- Email or Username -->
                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input
                        name="email"
                        type="email"
                        placeholder="Email"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>

                <!-- Password -->
                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input
                        name="password"
                        type="password"
                        placeholder="Password"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>

                <!-- Confirm Password -->
                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input
                        name="password_confirmation"
                        type="password"
                        placeholder="Confirm Password"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>

                <!-- Sign Up Button -->
                <button class="transform rounded-sm bg-indigo-600 py-2 font-bold duration-300 hover:bg-indigo-400">
                    SIGN UP
                </button>

                <p class="text-center text-lg">
                    Already have an account?
                    <a href="#" class="font-medium text-indigo-500 underline-offset-4 hover:underline">Log In</a>
                </p>
            </section>
        </main>
    </form>
    <script>
        function closeAlert() {
            document.getElementById("alertBox").style.display = "none";
        }
    </script>

</body>

</html>