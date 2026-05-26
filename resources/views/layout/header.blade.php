<nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">

    <div class="w-full px-4">

        <div class="flex h-16 items-center">

            <!-- Mobile button -->
            {{-- <div class="flex items-center sm:hidden">
                <button type="button" command="--toggle" commandfor="mobile-menu"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-500 hover:bg-gray-100">

                    <!-- Hamburger -->
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        class="size-6 in-aria-expanded:hidden">

                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <!-- Close -->
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        class="size-6 not-in-aria-expanded:hidden">

                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div> --}}

            <!-- Logo -->
            <div class="flex items-center ml-3">
                {{-- hamburger line --}}
                <button type="button" id="sidebar-toggle"
                    class="relative rounded-full p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <a href="/" class="text-2xl font-bold text-indigo-600">
                    Niteksindo
                </a>
            </div>

            <!-- Right -->
            <div class="ml-auto flex items-center gap-3">

                <!-- Notification -->
                <button type="button"
                    class="relative rounded-full p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6">

                        <path
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <!-- Profile -->
                <div x-data="{ open: false }" class="relative">

                    <!-- Button -->
                    <button @click="open = !open" class="flex rounded-full hover:bg-gray-100 hover:text-gray-700">
                        <img <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" 
                        class="mr-2 mt-2 size-10 rounded-sm border border-gray-200 object-cover">

                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 mt-2 w-56 overflow-hidden rounded-xl bg-white shadow-xl border border-gray-100 z-50">

                        <!-- User -->
                        <div class="border-b px-4 py-3">
                            <p class="text-sm text-gray-500">
                                Signed in as
                            </p>

                            <p class="truncate text-sm font-semibold text-gray-800">
                                {{ Auth::user()->name ?? 'User' }}
                            </p>
                        </div>

                        <!-- Menu -->
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Settings
                        </a> --}}

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50">
                                Logout
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    {{-- <el-disclosure id="mobile-menu" hidden class="block border-t border-gray-200 bg-white sm:hidden">

        <div class="space-y-1 px-2 py-3">

            @can('view employee')
                <a href="{{ route('employees.index') }}"
                    class="block rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                    Employees
                </a>
            @endcan

            @can('view medical checkup')
                <a href="{{ route('medical_checkups.index') }}"
                    class="block rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                    MCU
                </a>
            @endcan

            @can('view warehouse')
                <a href="{{ route('warehouse.index') }}"
                    class="block rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                    Warehouse
                </a>
            @endcan

        </div>
    </el-disclosure> --}}
</nav>
