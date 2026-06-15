<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    @vite(['src/input.css', 'src/script.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

{{-- SideBar --}}
@php
    function isActive($route)
    {
        return request()->routeIs($route) 
            ? 'bg-orange-600 text-white font-medium shadow-lg shadow-orange-900/20' 
            : 'text-gray-400 hover:text-white hover:bg-gray-800';
    }
@endphp

<body class="dark:bg-gray-950 dark:text-white text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <div id="sidebar" class="sidebar-menu fixed left-0 top-0 w-64 h-full bg-gray-900 text-white p-4 z-50 border-r border-gray-800 transform -translate-x-full md:translate-x-0 transition-transform duration-300 shadow-2xl">

        <a href="#" class="flex items-center gap-3 pb-6 border-b border-gray-800">
                <img src="{{ asset('img-home/logo_nmp.png') }}" alt="logo" class="w-16 h-16 object-contain">
            
            <span class="text-lg font-bold tracking-wide">Nitekindo<span class="text-orange-500">
                <br>
                Multitech Perkasa</span></span>
        </a>

        <ul class="mt-6 space-y-1">
            <li class="mb-1 group">
                @can('view employee')
                    <a href="{{ route('employees.index') }}" class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-200 {{ isActive('employees.*') }}">
                        <i class="ri-user-star-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm">Employees</span>
                    </a>
                @endcan
            </li>

            {{-- Menu dropdown Warehouse --}}
            <li class="mb-1 group">
                @can('view warehouse')
                    <button type="button" id="dropdown-warehouse" class="sidebar-dropdown-toggle w-full flex items-center py-2.5 px-4 text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-all duration-200">
                        <i class="ri-box-3-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm font-medium flex-1 text-left">Warehouse</span>
                        <i class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow text-xs {{ request()->routeIs('warehouse.*', 'stock.*', 'stock_movement.*') ? 'rotate-90 text-orange-500' : 'text-gray-500' }}"></i>
                    </button>
                    <ul id="menu-warehouse" class="sidebar-dropdown-menu pl-4 mt-2 space-y-1 border-l-2 border-gray-800 ml-3 {{ request()->routeIs('warehouse.*', 'stock.*', 'stock_movement.*') ? 'block' : 'hidden' }}">
                        <li class="mb-1 group">
                            <a href="{{ route('warehouse.index') }}" class="flex items-center py-2 px-4 rounded-md text-sm transition-colors duration-200 {{ isActive('warehouse.*') }}">
                                <i class="ri-stack-line mr-2 opacity-70"></i>
                                <span>Warehouses</span>
                            </a>
                        </li>
                        @can('view stock')
                            <li class="group">
                                <a href="{{ route('stock.index') }}" class="flex items-center py-2 px-4 rounded-md text-sm transition-colors duration-200 {{ isActive('stock.*') }}">
                                    <i class="ri-shopping-bag-3-line mr-2 opacity-70"></i>
                                    <span>Stok</span>
                                </a>
                            </li>
                        @endcan
                        @can('view stock movement')
                            <li class="group">
                                <a href="{{ route('stock_movement.index') }}" class="flex items-center py-2 px-4 rounded-md text-sm transition-colors duration-200 {{ isActive('stock_movement.*') }}">
                                    <i class="ri-truck-line mr-2 opacity-70"></i>
                                    <span>Perpindahan Stok</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                @endcan
            </li>

            {{-- MCU --}}
            @can('view medical checkup')
                <li class="mb-1 group">
                    <a href="{{ route('medical_checkups.index') }}" class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-200 {{ isActive('medical_checkups.*') }}">
                        <i class="ri-heart-pulse-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm">MCU</span>
                    </a>
                </li>
            @endcan

            {{-- Penawaran --}}
            @can('view offer')
                <li class="group">
                    <a href="{{ route('penawaran.index') }}" class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-200 {{ isActive('penawaran.*') }}">
                        <i class="ri-file-paper-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm">Penawaran</span>
                    </a>
                </li>
            @endcan

            {{-- approval --}}
            @can('view approval')
                <li class="group">
                    <a href="{{ route('approvals.index') }}" class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-200 {{ isActive('approvals.*') }}">
                        <i class="ri-checkbox-multiple-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm">Approval</span>
                    </a>
                </li>
            @endcan

            {{-- Product Category--}}
            @can('view category_product')
                <li class="group">
                    <a href="{{ route('category_product.index') }}" class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-200 {{ isActive('category_product.*') }}">
                        <i class="ri-price-tag-3-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm">Kategori Produk</span>
                    </a>
                </li>
            @endcan

            {{-- Product --}}
            @can('view product')
                <li class="group">
                    <a href="{{ route('product.index') }}" class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-200 {{ isActive('product.*') }}">
                        <i class="ri-shopping-bag-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm">Produk</span>
                    </a>
                </li>
            @endcan

            {{-- Menu dropdown User --}}
            <li class="mb-1 group">
                @can('view user')
                    <button type="button" id="dropdown-user" class="sidebar-dropdown-toggle w-full flex items-center py-2.5 px-4 text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-all duration-200">
                        <i class="ri-community-line mr-3 text-lg text-orange-500"></i>
                        <span class="text-sm font-medium flex-1 text-left">User</span>
                        <i class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow text-xs {{ request()->routeIs('users.*', 'permissions.*', 'roles.*') ? 'rotate-90 text-orange-500' : 'text-gray-500' }}"></i>
                    </button>
                    <ul id="menu-user" class="sidebar-dropdown-menu pl-4 mt-2 space-y-1 border-l-2 border-gray-800 ml-3 {{ request()->routeIs('users.*', 'permissions.*', 'roles.*') ? 'block' : 'hidden' }}">
                        <li class="group">
                            <a href="{{ route('users.index') }}" class="flex items-center py-2 px-4 rounded-md text-sm transition-colors duration-200 {{ isActive('users.*') }}">
                                <i class="ri-user-line mr-2 opacity-70"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        @can('view permissions')
                            <li class="group">
                                <a href="{{ route('permissions.index') }}" class="flex items-center py-2 px-4 rounded-md text-sm transition-colors duration-200 {{ isActive('permissions.*') }}">
                                    <i class="ri-shield-keyhole-line mr-2 opacity-70"></i>
                                    <span>Permissions</span>
                                </a>
                            </li>
                        @endcan
                        @can('view roles')
                            <li class="group">
                                <a href="{{ route('roles.index') }}" class="flex items-center py-2 px-4 rounded-md text-sm hover:bg-gray-800">
                                    <i class="ri-award-line mr-2 opacity-70"></i>
                                    <span>Roles</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                @endcan
            </li>
        </ul>
    </div>

    <!-- overlay -->
    <div class="sidebar-overlay hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-40 md:hidden"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-gray-950 text-gray-300 w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        {{-- Navbar Start --}}
        @include('layout.header')
        {{-- Navbar End --}}

        @yield('content')

    </main>
    <!-- end: Main -->
    
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('scripts')
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            // DROPDOWN MENU - Menggunakan ID yang spesifik
            const warehouseBtn = document.getElementById('dropdown-warehouse');
            const warehouseMenu = document.getElementById('menu-warehouse');
            const userBtn = document.getElementById('dropdown-user');
            const userMenu = document.getElementById('menu-user');

            // Handle Warehouse Dropdown
            if (warehouseBtn && warehouseMenu) {
                warehouseBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    warehouseMenu.classList.toggle('hidden');
                    const arrow = warehouseBtn.querySelector('.sidebar-arrow');
                    if (arrow) {
                        arrow.classList.toggle('rotate-90');
                        arrow.classList.toggle('text-orange-500');
                        arrow.classList.toggle('text-gray-500');
                    }
                });
            }

            // Handle User Dropdown
            if (userBtn && userMenu) {
                userBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    userMenu.classList.toggle('hidden');
                    const arrow = userBtn.querySelector('.sidebar-arrow');
                    if (arrow) {
                        arrow.classList.toggle('rotate-90');
                        arrow.classList.toggle('text-orange-500');
                        arrow.classList.toggle('text-gray-500');
                    }
                });
            }

            // Sidebar toggle for mobile (optional)
            const sidebar = document.getElementById("sidebar");
            const overlay = document.querySelector(".sidebar-overlay");
            const toggle = document.getElementById("sidebar-toggle");

            if (toggle) {
                toggle.addEventListener("click", function() {
                    sidebar.classList.toggle("-translate-x-full");
                    overlay.classList.toggle("hidden");
                });
            }

            if (overlay) {
                overlay.addEventListener("click", function() {
                    sidebar.classList.add("-translate-x-full");
                    overlay.classList.add("hidden");
                });
            }

        });
    </script>

</html>