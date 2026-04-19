<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Niteksindo | Elcoblast</title>

    @vite(['src/input.css', 'src/script.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="/" class="font-bold text-lg text-primary block py-6 mt-5">
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
                                <a href="{{ route('employees.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Employees
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('medical_checkups.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    MCU
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('penawaran.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Penawaran
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('warehouse.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Gudang
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('stock.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Stok
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('stock_movement.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Mutasi Stok
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('product.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Produk
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('users.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Users
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('permissions.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Permissions
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('roles.index') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Roles
                                </a>
                            </li>
                            @if(Route::has('login'))
                            <li class="group">
                                <a href="{{ route('login') }}"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                    Login
                                </a>
                            </li>
                            @endif
                            <li class="relative group">
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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
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

    </header>

    <script src="src/script.js"></script>