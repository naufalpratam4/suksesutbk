<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    {{-- <!-- NAVBAR / HEADER -->
    <div class="flex items-center justify-center h-16 bg-gray-900 text-white">
        <i class="fas fa-tachometer-alt fa-2x mr-2"></i>
        <span class="text-xl font-semibold">@yield('header', 'Admin')</span>
    </div> --}}

    <!-- CONTENT -->
    <div class="flex md:flex-row flex-col">
        <aside class="bg-gray-800 text-gray-100 w-full md:w-64 min-h-screen md:min-h-0 md:flex md:flex-col">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <i class="fas fa-tachometer-alt fa-2x mr-2"></i>
                <span class="text-xl font-semibold">Admin</span>
            </div>
            <nav class="mt-4 flex-1">
                <a href="/dashboard"
                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-home fa-fw mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/kategori-ujian"
                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-chart-bar fa-fw mr-3"></i>
                    <span>Kategori Ujian</span>
                </a>
                <a href="/soal" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-chart-bar fa-fw mr-3"></i>
                    <span>Soal</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-table fa-fw mr-3"></i>
                    <span>Tables</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-users fa-fw mr-3"></i>
                    <span>Users</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-cog fa-fw mr-3"></i>
                    <span>Settings</span>
                </a>
            </nav>
            <div class="px-6 py-4 mt-auto">
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md w-full text-left">
                        <i class="fas fa-sign-out-alt fa-fw mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>

            </div>
        </aside>

        <main class="flex-1">
            <header class="bg-white shadow-md">
                <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                    <div class="relative">
                        <button class="md:hidden text-gray-600 focus:outline-none" id="sidebarToggle">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                        <input type="text"
                            class="hidden md:block bg-gray-200 text-gray-700 focus:outline-none focus:bg-white focus:shadow rounded-full py-2 px-4 pl-10"
                            placeholder="Search...">
                        <span class="hidden md:block absolute top-0 left-0 mt-2 ml-3">
                            <i class="fas fa-search text-gray-500"></i>
                        </span>
                    </div>
                    <div class="flex items-center">
                        <button class="text-gray-600 mr-4 relative">
                            <i class="fas fa-bell fa-lg"></i>
                            <span
                                class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                        </button>
                        <div class="relative">
                            <button class="flex items-center text-gray-600 focus:outline-none">
                                <img src="https://via.placeholder.com/40" alt="User Avatar"
                                    class="w-8 h-8 rounded-full mr-2">
                                <span>John Doe</span>
                                <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container mx-auto p-6">
                <div class="p-6">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
