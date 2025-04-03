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
    <main class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white">
        <!-- component -->
        <section class="flex w-[30rem] flex-col space-y-10">
            <div class="text-center text-4xl font-medium">Sign Up</div>

            <!-- Full Name -->
            <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                <input
                    type="text"
                    placeholder="Full Name"
                    class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
            </div>

            <!-- Email or Username -->
            <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                <input
                    type="text"
                    placeholder="Email or Username"
                    class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
            </div>

            <!-- Password -->
            <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                <input
                    type="password"
                    placeholder="Password"
                    class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
            </div>

            <!-- Confirm Password -->
            <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                <input
                    type="password"
                    placeholder="Confirm Password"
                    class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
            </div>

            <!-- Phone Number -->
            <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                <input
                    type="text"
                    placeholder="Phone Number (Optional)"
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
</body>

</html>