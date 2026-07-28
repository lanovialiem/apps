<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niteksindo | Elcoblast</title>

    @vite(['src/input.css', 'src/script.js'])

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="text-gray-300 w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

    <header class="absolute top-0 left-0 w-full z-10">

        <!-- Hamburger -->
        <button id="sidebar-toggle"
            class="fixed top-4 left-4 md:hidden z-[60] bg-gray-900 text-white p-2 rounded-lg shadow-lg">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </button>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-gray-900 text-white border-r border-gray-800 shadow-2xl
            transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">

            <div class="p-4">

                <a href="#" class="flex items-center gap-3 pb-6 border-b border-gray-800">

                    <img src="{{ asset('img-home/logo_nmp.png') }}" class="w-16 h-16 object-contain">

                    <span class="text-lg font-bold">
                        Nitekindo
                        <span class="text-orange-500">
                            <br>
                            Multitech Perkasa
                        </span>
                    </span>

                </a>

                <ul class="mt-6 space-y-2">

                    @guest
                    <li>
                        <a href="{{ route('login') }}" class="block py-2 px-4 rounded hover:bg-gray-800">
                            Login
                        </a>
                    </li>
                    @endguest

                    @auth
                    <li>
                        <a href="{{ route('welcome') }}" class="block py-2 px-4 rounded hover:bg-gray-800">
                            Admin Dashboard
                        </a>
                    </li>
                    @endauth

                    <!-- Dropdown -->
                    <li>

                        <button id="dropdown-login" type="button"
                            class="w-full flex items-center py-2 px-4 rounded hover:bg-gray-800">

                            <span class="flex-1 text-left">
                    <li>
                        <span class="block py-2">
                            😊 Hi, {{ Auth::user()->name }}
                        </span>
                    </li>
                    </span>

                    <svg id="dropdown-arrow" class="w-4 h-4 transition-transform" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>

                    </button>
                    <ul id="menu-login" class="hidden mt-2 pl-6 space-y-2">
                        @auth
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="block py-2 text-red-400 hover:text-red-300">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>

                        </li>
                        @endauth
                    </ul>
                    </li>
                </ul>
            </div>

        </aside>

        <!-- Overlay -->
        <div id="sidebar-overlay" class="hidden fixed inset-0 bg-black/50 z-40 md:hidden"></div>

    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Sidebar
            const sidebar = document.getElementById("sidebar");
            const toggle = document.getElementById("sidebar-toggle");
            const overlay = document.getElementById("sidebar-overlay");

            function openSidebar() {
                sidebar.classList.remove("-translate-x-full");
                overlay.classList.remove("hidden");
            }

            function closeSidebar() {
                sidebar.classList.add("-translate-x-full");
                overlay.classList.add("hidden");
            }

            if (toggle) {
                toggle.addEventListener("click", function() {

                    if (sidebar.classList.contains("-translate-x-full")) {
                        openSidebar();
                    } else {
                        closeSidebar();
                    }

                });
            }

            overlay.addEventListener("click", closeSidebar);

            // Resize
            window.addEventListener("resize", function() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove("-translate-x-full");
                    overlay.classList.add("hidden");
                } else {
                    sidebar.classList.add("-translate-x-full");
                }
            });

            // Dropdown
            const dropdownBtn = document.getElementById("dropdown-login");
            const dropdownMenu = document.getElementById("menu-login");
            const arrow = document.getElementById("dropdown-arrow");

            if (dropdownBtn) {

                dropdownBtn.addEventListener("click", function() {

                    dropdownMenu.classList.toggle("hidden");
                    arrow.classList.toggle("rotate-180");

                });

            }

        });
    </script>

</body>

</html>