@extends('template.dashboard')
@section('content')
    <h1 class="text-2xl font-semibold text-gray-700 mb-6">Dashboard Overview</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="bg-blue-500 p-3 rounded-full text-white mr-4">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Users</p>
                    <p class="text-2xl font-bold text-gray-800">1,250</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="bg-green-500 p-3 rounded-full text-white mr-4">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-800">350</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="bg-yellow-500 p-3 rounded-full text-white mr-4">
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-800">$15,600</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="bg-red-500 p-3 rounded-full text-white mr-4">
                    <i class="fas fa-chart-line fa-2x"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Growth</p>
                    <p class="text-2xl font-bold text-gray-800">+12.5%</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
        <div class="px-6 py-4">
            <h2 class="text-xl font-semibold text-gray-700">Recent Activities</h2>
        </div>
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        User
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Action
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Timestamp
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full" src="https://via.placeholder.com/40"
                                    alt="" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Alice Johnson
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">Logged In</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            May 30, 2024, 10:00 AM
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Completed</span>
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Sales Analytics</h2>
            <div class="bg-gray-200 h-64 rounded flex items-center justify-center">
                <p class="text-gray-500">Chart Placeholder</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">User Demographics</h2>
            <div class="bg-gray-200 h-64 rounded flex items-center justify-center">
                <p class="text-gray-500">Chart Placeholder</p>
            </div>
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('aside');

        // Fungsi untuk menyesuaikan tampilan awal sidebar saat load
        function adjustSidebarOnLoad() {
            if (window.innerWidth < 768) {
                sidebar.classList.add('hidden');
            } else {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('md:flex');
            }
        }

        // Toggle sidebar saat tombol diklik
        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Sesuaikan sidebar saat ukuran layar berubah
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('md:flex');
            }
        });

        // Jalankan saat halaman pertama kali dimuat
        window.addEventListener('DOMContentLoaded', adjustSidebarOnLoad);
    </script>
@endsection
