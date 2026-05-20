<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="dist/css/style.css"> --}}
    <title>Dashboard</title>
    @vite(['src/input.css', 'src/script.js'])

</head>

<body class="dark:bg-gray-900 dark:text-white text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <div
        class="sidebar-menu fixed left-0 top-0 w-64 h-full bg-gray-900 text-white p-4 z-50 
    transform -translate-x-full md:translate-x-0 transition-transform duration-300">

        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="https://placehold.co/32x32" class="w-8 h-8 rounded object-cover">
            <span class="text-lg font-bold ml-3">Logo</span>
        </a>

        <ul class="mt-4">
            <li class="mb-1 group active">
                <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>

            <li class="mb-1 group">
                @can('view employee')
                    <a href="{{ route('employees.index') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                        <i class="ri-instance-line mr-3 text-lg"></i>
                        <span class="text-sm">Employees</span>
                    </a>
                @endcan
            </li>

            {{-- Menu dropdown category --}}
            <li class="mb-1 group">
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
                </ul>

                {{-- Menu dropdown Warehouse --}}
            <li class="mb-1 group">
                <!-- Button -->
                <button type="button"
                    class="sidebar-dropdown-toggle w-full flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                    <i class="ri-folder-line mr-3 text-lg"></i>
                    <span class="text-sm">Warehouse</span>
                    <i class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow"></i>
                </button>
                <ul class="sidebar-dropdown-menu hidden pl-10 mt-2 space-y-2">
                    <li class="mb-1 group">
                        @can('view warehouse')
                            <a href="{{ route('warehouse.index') }}"
                                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                                <i class="ri-instance-line mr-3 text-lg"></i>
                                <span class="text-sm">Warehouses</span>
                            </a>
                        @endcan
                    </li>
                    <li class="group">
                        @can('view stock')
                            <a href="{{ route('stock.index') }}"
                                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                                <i class="ri-instance-line mr-3 text-lg"></i>
                                <span class="text-sm">
                                    Stok
                                </span>
                            </a>
                        @endcan
                    </li>
                    <li class="group">
                        @can('view stock movement')
                            <a href="{{ route('stock_movement.index') }}"
                                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                                <i class="ri-instance-line mr-3 text-lg"></i>
                                <span class="text-sm">
                                    Perpindahan Stok
                                </span>
                            </a>
                        @endcan
                    </li>
                </ul>

            <li class="mb-1 group">
                @can('view medical checkup')
                    <a href="{{ route('medical_checkups.index') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                        <i class="ri-instance-line mr-3 text-lg"></i>
                        <span class="text-sm">MCU</span>
                    </a>
                @endcan
            </li>
            <li class="group">
                @can('view offer')
                    <a href="{{ route('penawaran.index') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                        <i class="ri-instance-line mr-3 text-lg"></i>
                        <span class="text-sm">
                            Penawaran
                        </span>
                    </a>
                @endcan
            </li>

            <li class="group">
                @can('view product')
                    <a href="{{ route('product.index') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                        <i class="ri-instance-line mr-3 text-lg"></i>
                        <span class="text-sm">
                            Produk
                        </span>
                    </a>
                @endcan
            </li>

            {{-- Menu dropdown User --}}
            <li class="mb-1 group">
                <!-- Button -->
                <button type="button"
                    class="sidebar-dropdown-toggle w-full flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                    <i class="ri-folder-line mr-3 text-lg"></i>
                    <span class="text-sm">User</span>
                    <i class="ri-arrow-right-s-line ml-auto transition-transform duration-300 sidebar-arrow"></i>
                </button>
                <ul class="sidebar-dropdown-menu hidden pl-10 mt-2 space-y-2">
                    <li class="group">
                        @can('view user')
                            <a href="{{ route('users.index') }}"
                                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                                <i class="ri-instance-line mr-3 text-lg"></i>
                                <span class="text-sm">
                                    Users
                                </span>
                            </a>
                        @endcan
                    </li>
                    <li class="group">
                        @can('view permissions')
                            <a href="{{ route('permissions.index') }}"
                                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                                <i class="ri-instance-line mr-3 text-lg"></i>
                                <span class="text-sm">
                                    Permissions
                                </span>
                            </a>
                        @endcan
                    </li>
                    <li class="group">
                        @can('view roles')
                            <a href="{{ route('roles.index') }}"
                                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 rounded-md">
                                <i class="ri-instance-line mr-3 text-lg"></i>
                                <span class="text-sm">
                                    Roles
                                </span>
                            </a>
                        @endcan
                    </li>
                </ul>
        </ul>
    </div>

    <!-- overlay -->
    <div class="sidebar-overlay hidden fixed inset-0 bg-black/50 z-40 md:hidden"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main
        class="dark:bg-gray-900 dark:text-white w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        <!-- start: Navbar -->
        <div
            class="dark:bg-gray-900 dark:text-white py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium">/</li>
                <li class="text-gray-600 mr-2 font-medium">Analytics</li>
            </ul>
            <ul class="ml-auto flex items-center">
                <li class="mr-1 dropdown">
                    <button type="button"
                        class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                        <i class="ri-search-line"></i>
                    </button>
                    <div
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <form action="" class="p-4 border-b border-b-gray-100">
                            <div class="relative w-full">
                                <input type="text"
                                    class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500"
                                    placeholder="Search...">
                                <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </form>
                        <div class="mt-3 mb-2">
                            <div class="text-[13px] font-medium text-gray-400 ml-4 mb-2">Recently</div>
                            <ul class="max-h-64 overflow-y-auto">
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <button type="button"
                        class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                        <i class="ri-notification-3-line"></i>
                    </button>
                    <div
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                            <button type="button" data-tab="notification" data-tab-page="notifications"
                                class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                            <button type="button" data-tab="notification" data-tab-page="messages"
                                class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                        </div>
                        <div class="my-2">
                            <ul class="max-h-64 overflow-y-auto" data-tab-for="notification"
                                data-page="notifications">
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification"
                                data-page="messages">
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown ml-3">
                    {{-- <button type="button" class="dropdown-toggle flex items-center">
                        <img src="https://placehold.co/32x32" alt=""
                            class="w-8 h-8 rounded block object-cover align-middle">
                    </button> --}}
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">zzz</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end: Navbar -->

        <h1>ISI</h1>
        {{-- @include('layout.header') --}}
        @yield('content')
        {{-- @include('layout.footer') --}}


    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="src/script.js"></script>

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
</body>

</html>
