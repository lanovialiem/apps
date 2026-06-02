<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    {{--
    <link rel="stylesheet" href="dist/css/style.css"> --}}
    <title>Dashboard</title>
    @vite(['src/input.css', 'src/script.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>
{{-- SideBar --}}
@php
    function isActive($route)
    {
        return request()->routeIs($route) ? 'bg-orange-500 text-white' : 'text-gray-300';
    }
@endphp

<body
    class="dark:bg-gray-900 dark:text-white text-gray-800 font-inter hover:text-primary text-primary border-r-2 border-primary">

    <!-- start: Sidebar -->
    <div id="sidebar"
        class="sidebar-menu fixed left-0 top-0 w-64 h-full bg-gray-900 text-white p-4 z-50
    transform -translate-x-full md:translate-x-0 transition-transform duration-300">

        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="https://placehold.co/32x32" class="w-8 h-8 rounded object-cover">
            <span class="text-lg font-bold ml-3">Logo</span>
        </a>

        <ul class="mt-4">
            {{-- <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 rounded-md
   {{ isActive('/') }}">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li> --}}

            <li class="mb-1 group">
                @can('view employee')
                    <a href="{{ route('employees.index') }}"
                        class="flex items-center py-2 px-4 rounded-md
   {{ isActive('employees.*') }}">
                        <i class="ri-instance-line mr-3 text-lg"></i>
                        <span class="text-sm">Employees</span>
                    </a>
                @endcan
            </li>

            {{-- Menu dropdown category --}}
            {{-- <li class="mb-1 group">
                <!-- Button -->
                <button type="button"
                    class="sidebar-dropdown-toggle w-full flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                    <i class="ri-folder-line mr-3 text-lg"></i>
                    <span class="text-sm">Category</span>
                    <i class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow"></i>
                </button>
                <ul class="sidebar-dropdown-menu hidden pl-10 mt-2 space-y-2">
                    <li class="mb-1 group">
                        @can('view category')
                        <a href="{{ route('category.index') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                            <i class="ri-instance-line mr-3 text-lg"></i>
                            <span class="text-sm">Category</span>
                        </a>
                        @endcan
                    </li>
                    <li class="mb-1 group">
                        @can('view category_code')
                        <a href="{{ route('category_code.index') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                            <i class="ri-instance-line mr-3 text-lg"></i>
                            <span class="text-sm">Category Code</span>
                        </a>
                        @endcan
                    </li>
                </ul> --}}

            {{-- Menu dropdown Warehouse --}}
            <li class="mb-1 group">
                @can('view warehouse')
                    <!-- Button -->
                    <button type="button"
                        class="sidebar-dropdown-toggle w-full flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">

                        <i class="ri-folder-line mr-3 text-lg"></i>

                        <span class="text-sm">Warehouse</span>

                        <i
                            class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow
            {{ request()->routeIs('warehouse.*', 'stock.*', 'stock_movement.*') ? 'rotate-90' : '' }}">
                        </i>
                    </button>

                    <!-- Dropdown -->
                    <ul
                        class="sidebar-dropdown-menu pl-10 mt-2 space-y-2
        {{ request()->routeIs('warehouse.*', 'stock.*', 'stock_movement.*') ? '' : 'hidden' }}">

                        {{-- Warehouse --}}
                        <li class="mb-1 group">
                            <a href="{{ route('warehouse.index') }}"
                                class="flex items-center py-2 px-4 rounded-md {{ isActive('warehouse.*') }}">

                                <i class="ri-instance-line mr-3 text-lg"></i>

                                <span class="text-sm">Warehouses</span>
                            </a>
                        </li>

                        {{-- Stock --}}
                        @can('view stock')
                            <li class="group">
                                <a href="{{ route('stock.index') }}"
                                    class="flex items-center py-2 px-4 rounded-md {{ isActive('stock.*') }}">

                                    <i class="ri-instance-line mr-3 text-lg"></i>

                                    <span class="text-sm">
                                        Stok
                                    </span>
                                </a>
                            </li>
                        @endcan

                        {{-- Stock Movement --}}
                        @can('view stock movement')
                            <li class="group">
                                <a href="{{ route('stock_movement.index') }}"
                                    class="flex items-center py-2 px-4 rounded-md {{ isActive('stock_movement.*') }}">

                                    <i class="ri-instance-line mr-3 text-lg"></i>

                                    <span class="text-sm">
                                        Perpindahan Stok
                                    </span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                @endcan

            </li>

            {{-- MCU --}}
            @can('view medical checkup')
                <li class="mb-1 group">
                    <a href="{{ route('medical_checkups.index') }}"
                        class="flex items-center py-2 px-4 rounded-md {{ isActive('medical_checkups.*') }}">

                        <i class="ri-instance-line mr-3 text-lg"></i>

                        <span class="text-sm">MCU</span>
                    </a>
                </li>
            @endcan

            {{-- Penawaran --}}
            @can('view offer')
                <li class="group">
                    <a href="{{ route('penawaran.index') }}"
                        class="flex items-center py-2 px-4 rounded-md {{ isActive('penawaran.*') }}">

                        <i class="ri-instance-line mr-3 text-lg"></i>

                        <span class="text-sm">
                            Penawaran
                        </span>
                    </a>
                </li>
            @endcan

            {{-- approval --}}
            @can('view approval')
                <li class="group">
                    <a href="{{ route('approvals.index') }}"
                        class="flex items-center py-2 px-4 rounded-md {{ isActive('approvals.*') }}">

                        <i class="ri-instance-line mr-3 text-lg"></i>

                        <span class="text-sm">
                            Approval
                        </span>
                    </a>
                </li>
            @endcan

            {{-- Product --}}
            @can('view product')
                <li class="group">
                    <a href="{{ route('product.index') }}"
                        class="flex items-center py-2 px-4 rounded-md {{ isActive('product.*') }}">

                        <i class="ri-instance-line mr-3 text-lg"></i>

                        <span class="text-sm">
                            Produk
                        </span>
                    </a>
                </li>
            @endcan

            {{-- Menu dropdown User --}}
            <li class="mb-1 group">

                @can('view user')
                    <!-- Button -->
                    <button type="button"
                        class="sidebar-dropdown-toggle w-full flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">

                        <i class="ri-folder-line mr-3 text-lg"></i>

                        <span class="text-sm">User</span>

                        <i
                            class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow
            {{ request()->routeIs('users.*', 'permissions.*', 'roles.*') ? 'rotate-90' : '' }}">
                        </i>
                    </button>

                    <!-- Dropdown -->
                    <ul
                        class="sidebar-dropdown-menu pl-10 mt-2 space-y-2
        {{ request()->routeIs('users.*', 'permissions.*', 'roles.*') ? '' : 'hidden' }}">

                        {{-- Users --}}
                        <li class="group">
                            <a href="{{ route('users.index') }}"
                                class="flex items-center py-2 px-4 rounded-md {{ isActive('users.*') }}">

                                <i class="ri-instance-line mr-3 text-lg"></i>

                                <span class="text-sm">
                                    Users
                                </span>
                            </a>
                        </li>

                        {{-- Permissions --}}
                        @can('view permissions')
                            <li class="group">
                                <a href="{{ route('permissions.index') }}"
                                    class="flex items-center py-2 px-4 rounded-md {{ isActive('permissions.*') }}">

                                    <i class="ri-instance-line mr-3 text-lg"></i>

                                    <span class="text-sm">
                                        Permissions
                                    </span>
                                </a>
                            </li>
                        @endcan

                        {{-- Roles --}}
                        @can('view roles')
                            <li class="group">
                                <a href="{{ route('roles.index') }}"
                                    class="flex items-center py-2 px-4 rounded-md {{ isActive('roles.*') }} hover:bg-gray-800">

                                    <i class="ri-instance-line mr-3 text-lg"></i>

                                    <span class="text-sm">
                                        Roles
                                    </span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                @endcan
            </li>
        </ul>
    </div>

    <!-- overlay -->
    <div class="sidebar-overlay hidden fixed inset-0 bg-black/50 z-40 md:hidden"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main
        class="bg-gray-900 text-gray-300 w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        {{-- Navbar Start --}}
        @include('layout.header')
        {{-- Navbar End --}}

        {{-- <h1>ISI</h1> --}}
        {{-- @include('layout.header') --}}
        @yield('content')
        {{-- @include('layout.footer') --}}


    </main>
    <!-- end: Main -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script src="src/script.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggles = document.querySelectorAll('.sidebar-dropdown-toggle');
            toggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const currentMenu =
                        this.parentElement.querySelector('.sidebar-dropdown-menu');
                    const currentArrow =
                        this.parentElement.querySelector('.sidebar-arrow');

                    // tutup semua menu lain
                    document.querySelectorAll('.sidebar-dropdown-menu').forEach(menu => {
                        if (menu !== currentMenu) {
                            menu.classList.add('hidden');
                        }
                    });

                    document.querySelectorAll('.sidebar-arrow').forEach(arrow => {
                        if (arrow !== currentArrow) {
                            arrow.classList.remove('rotate-90');
                        }
                    });

                    // toggle current
                    currentMenu.classList.toggle('hidden');
                    currentArrow.classList.toggle('rotate-90');
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("sidebar-overlay");
            const toggle = document.getElementById("sidebar-toggle");

            // OPEN / CLOSE SIDEBAR
            toggle.addEventListener("click", function() {

                sidebar.classList.toggle("-translate-x-full");
                overlay.classList.toggle("hidden");

            });

            // CLOSE WHEN CLICK OVERLAY
            overlay.addEventListener("click", function() {

                sidebar.classList.add("-translate-x-full");
                overlay.classList.add("hidden");

            });

            // DROPDOWN MENU
            const toggles = document.querySelectorAll('.sidebar-dropdown-toggle');

            toggles.forEach(toggle => {

                toggle.addEventListener('click', function() {

                    const currentMenu =
                        this.parentElement.querySelector('.sidebar-dropdown-menu');

                    const currentArrow =
                        this.parentElement.querySelector('.sidebar-arrow');

                    document.querySelectorAll('.sidebar-dropdown-menu')
                        .forEach(menu => {

                            if (menu !== currentMenu) {
                                menu.classList.add('hidden');
                            }

                        });

                    document.querySelectorAll('.sidebar-arrow')
                        .forEach(arrow => {

                            if (arrow !== currentArrow) {
                                arrow.classList.remove('rotate-90');
                            }

                        });

                    currentMenu.classList.toggle('hidden');
                    currentArrow.classList.toggle('rotate-90');

                });

            });

        });
    </script>

</html>
