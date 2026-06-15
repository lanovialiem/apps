<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT Niteksindo</title>
    
    <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['src/input.css', 'src/script.js']) --}}
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<!-- BACKGROUND: Gradient Orange ke Merah -->
<body class="bg-gradient-to-br from-orange-500 via-red-500 to-red-600 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden relative z-10 border-t-4 border-orange-500">
        
        <!-- Header dengan Gradient Orange -->
        <div class="bg-gradient-to-r from-orange-500 to-red-500 p-8 text-center relative overflow-hidden">
            <!-- Decorative circle ( efek cahaya ) -->
            <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-24 h-24 bg-yellow-300 opacity-20 rounded-full blur-xl"></div>

            <div class="relative z-10">
                <!-- Logo -->
                <div class="mb-4 flex justify-center">
                    <img src="{{ asset('img-home/logo_nmp.png') }}" alt="Logo" class="h-16 w-auto object-contain">
                </div>
                
                <h2 id="formTitle" class="text-2xl font-bold text-white tracking-wide uppercase drop-shadow-md">
                    Login
                </h2>
                <p class="text-orange-100 text-sm mt-2 font-light">
                    Welcome to PT. Niteksindo System
                </p>
            </div>
        </div>

        <!-- Body Form -->
        <div class="p-8">
            
            @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border-l-4 border-red-500 text-red-600 text-sm rounded-r flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $errors->first() }}
            </div>
            @endif

            <form id="authForm" method="POST" action="{{ route('loginProses') }}" class="space-y-5">
                @csrf

                <!-- Name Field (Hanya saat Register) -->
                <div id="nameField" class="hidden group">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input type="text" name="name" value="{{ old('name') }}" 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition text-gray-700 bg-gray-50 focus:bg-white"
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email Field -->
                <div class="group">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition text-gray-700 bg-gray-50 focus:bg-white"
                            placeholder="name@company.com">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="group">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" name="password" required 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition text-gray-700 bg-gray-50 focus:bg-white"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Confirm Password (Hanya saat Register) -->
                <div id="confirmField" class="hidden group">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <input type="password" name="password_confirmation" 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition text-gray-700 bg-gray-50 focus:bg-white"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Button Submit: Gradient Orange ke Merah -->
                <button type="submit" id="submit"
                    class="w-full relative group bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-3.5 rounded-lg shadow-lg transform transition hover:-translate-y-0.5 active:translate-y-0">
                    <span class="absolute inset-0 w-full h-full bg-white opacity-0 group-hover:opacity-10 transition-opacity rounded-lg"></span>
                    Login
                </button>
            </form>

            <!-- Toggle Login/Register -->
            <div class="mt-8 text-center border-t border-gray-100 pt-6">
                <p class="text-sm text-gray-600">
                    <span id="toggleText">Don't have an account?</span>
                    <button type="button" onclick="toggleForm()" class="text-orange-600 font-bold hover:text-orange-800 ml-1 transition">
                        Register/Login
                    </button>
                </p>
            </div>

        </div>
    </div>

    <script>
        let isLogin = true;

        function toggleForm() {
            isLogin = !isLogin;

            const title = document.getElementById('formTitle');
            const submitBtn = document.getElementById('submit');
            const toggleText = document.getElementById('toggleText');
            const nameField = document.getElementById('nameField');
            const confirmField = document.getElementById('confirmField');
            const form = document.getElementById('authForm');

            if (isLogin) {
                title.innerText = "LOGIN";
                submitBtn.innerText = "Login";
                toggleText.innerText = "Don't have an account?";
                form.action = "{{ route('loginProses') }}";
            } else {
                title.innerText = "REGISTER";
                submitBtn.innerText = "Register";
                toggleText.innerText = "Already have an account?";
                form.action = "{{ route('registerProses') }}";
            }

            // Toggle visibility
            nameField.classList.toggle('hidden');
            confirmField.classList.toggle('hidden');
            
            // Handle display property for animation smoothness
            if(!isLogin) {
                nameField.style.display = 'block';
                confirmField.style.display = 'block';
            } else {
                nameField.style.display = 'none';
                confirmField.style.display = 'none';
            }
        }

        // Initialize state
        window.onload = function() {
            document.getElementById('nameField').style.display = 'none';
            document.getElementById('confirmField').style.display = 'none';
        }
    </script>
</body>
</html>