<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Niteksindo | Elcoblast</title>

    @vite(['src/input.css', 'src/script.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body>
    {{-- <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="/" class="font-bold text-lg text-primary block py-6">
                        NMP
                    </a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu"
                        class="hidden absolute bg-white shadow-lg rounded-lg py-5 max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group">
                                @can('view employee')
                                    <a href="{{ route('employees.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Employees
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view medical checkup')
                                    <a href="{{ route('medical_checkups.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        MCU
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view offer')
                                    <a href="{{ route('penawaran.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Penawaran
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view warehouse')
                                    <a href="{{ route('warehouse.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Gudang
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view stock')
                                    <a href="{{ route('stock.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Stok
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view stock movement')
                                    <a href="{{ route('stock_movement.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Perpindahan Stok
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view product')
                                    <a href="{{ route('product.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Produk
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view user')
                                    <a href="{{ route('users.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Users
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view permissions')
                                    <a href="{{ route('permissions.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Permissions
                                    </a>
                                @endcan
                            </li>
                            <li class="group">
                                @can('view roles')
                                    <a href="{{ route('roles.index') }}"
                                        class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                        Roles
                                    </a>
                                @endcan
                            </li>
                            {{-- @if (Route::has('login'))
                            <li class="group">
                                <a href="{{ route('login') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Login
                                </a>
                            </li>
                            @endif --}}
    {{-- <li class="relative group">
                                @auth
                                    <button id="userDropdownBtn"
                                        class="text-base text-dark py-2 mx-8 flex items-center gap-1 hover:text-primary">
                                        😊 | Hi, {{ Auth::user()->name }}
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown -->
                                    <div id="userDropdown"
                                        class="hidden absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50">

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="hidden">
                                            @csrf
                                        </form>
                                    </div>
                                @endauth
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header> --}}

    <header>
        <!-- start: Navbar -->
        <div
            class="dark:bg-gray-900 dark:text-white bg-white sticky top-0 left-0 z-30 flex items-center gap-3 px-4 py-3 shadow-md shadow-black/5">

            <!-- Sidebar Toggle -->
            <button type="button" class="sidebar-toggle text-lg text-gray-600 lg:hidden">
                <i class="ri-menu-line"></i>
            </button>

            <!-- Breadcrumb -->
            <div class="hidden sm:flex items-center text-sm min-w-0">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium truncate">
                    Dashboard
                </a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-600 font-medium truncate">
                    Analytics
                </span>
            </div>

            <!-- Right Menu -->
            <div class="ml-auto flex items-center gap-2 sm:gap-3">

                <!-- Search -->
                <div class="dropdown relative">
                    <button type="button"
                        class="dropdown-toggle flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100">
                        <i class="ri-search-line"></i>
                    </button>

                    <div
                        class="dropdown-menu absolute right-0 mt-2 hidden w-[300px] max-w-[90vw] rounded-xl border border-gray-100 bg-white shadow-lg">

                        <div class="p-4">
                            <div class="relative">
                                <input type="text" placeholder="Search..."
                                    class="w-full rounded-lg border border-gray-200 bg-gray-50 py-2 pl-10 pr-4 text-sm outline-none focus:border-blue-500">

                                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Notification -->
                <div class="dropdown relative">
                    <button type="button"
                        class="dropdown-toggle flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100">
                        <i class="ri-notification-3-line"></i>
                    </button>

                    <div
                        class="dropdown-menu absolute right-0 mt-2 hidden w-[320px] max-w-[90vw] rounded-xl border border-gray-100 bg-white shadow-lg">

                        <div class="border-b p-4 font-semibold">
                            Notifications
                        </div>

                        <div class="max-h-80 overflow-y-auto">
                            <a href="#" class="flex items-center gap-3 p-4 hover:bg-gray-50">
                                <img src="https://placehold.co/40x40" class="h-10 w-10 rounded-full object-cover">

                                <div>
                                    <div class="text-sm font-medium text-gray-700">
                                        New Order
                                    </div>

                                    <div class="text-xs text-gray-400">
                                        from customer
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Profile -->
                <div class="dropdown relative">
                    <button type="button" class="dropdown-toggle flex items-center">
                        <img src="https://placehold.co/40x40" class="h-9 w-9 rounded-full object-cover">
                    </button>

                    <ul
                        class="dropdown-menu absolute right-0 mt-2 hidden w-44 rounded-xl border border-gray-100 bg-white py-2 shadow-lg">

                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Profile
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                                Logout
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <!-- end: Navbar -->
    </header>

    <script src="src/script.js"></script>
