<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel - Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-900 p-4 flex items-center justify-between">
        <div>
            <h1 class="text-white text-xl font-semibold">Admin Panel</h1>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-gray-300">{{$user->name}}</span>
            <i class="fas fa-user-circle text-gray-300 text-2xl"></i>
        </div>
    </nav>

    <!-- Main Layout (Sidebar + Main Content) -->
    <div class="flex">

        <!-- Sidebar -->
        <aside class="bg-gray-900 text-gray-300 w-64 min-h-screen p-4">
            <nav>
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                <span>Dashboard</span>
                            </div>
                        </div>
                    </li>

                    <!-- Users -->
                    <li class="opcion-con-desplegable">
                        <a href="{{ route('users') }}" class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-users mr-2"></i>
                                <span>User Management</span>
                            </div>
                        </a>
                    </li>


                    <!-- Products -->
                    <li class="opcion-con-desplegable">
                        <a href="{{ route('product') }}" class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-cogs mr-2"></i>
                                <span>Product Management</span>
                            </div>
                        </a>
                    </li>
                    <!-- Orders -->
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-box mr-2"></i>
                                <span>Order Management</span>
                            </div>
                        </div>
                    </li>

                    <!-- Payments -->
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-credit-card mr-2"></i>
                                <span>Payments</span>
                            </div>
                        </div>
                    </li>

                    <!-- Discounts -->
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-tags mr-2"></i>
                                <span>Discounts</span>
                            </div>
                        </div>
                    </li>

                    <!-- Settings -->
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-cogs mr-2"></i>
                                <span>Settings</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center justify-between p-2 hover:bg-gray-700 rounded">
                                <div class="flex items-center">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    <span>Logout</span>
                                </div>
                            </button>
                        </form>
                    </li>



                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100 overflow-y-auto" style="height: calc(100vh - 64px);">
            @yield('content')
        </main>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");
            opcionesConDesplegable.forEach(function(opcion) {
                opcion.addEventListener("click", function() {
                    const desplegable = opcion.querySelector(".desplegable");
                    desplegable.classList.toggle("hidden");
                });
            });
        });
    </script>
</body>

</html>