<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-[#FF6A2A] via-[#FF8A4C] to-[#FFB36A] flex items-center justify-center h-screen">

    <div class="flex bg-white/10 backdrop-blur-md rounded-xl shadow-lg overflow-hidden border border-white/20 hover:shadow-2xl transition duration-300">

        <!-- LEFT IMAGE -->
        <div class="hidden md:flex items-center justify-center p-10">
            <img src="https://illustrations.popsy.co/gray/web-design.svg" class="w-80">
        </div>

        <!-- RIGHT FORM -->
        <div class="md:p-12 p-8 text-white w-full md:w-[400px]">

            <h2 id="formTitle" class="text-3xl font-bold mb-2 text-white">Login</h2>
            <p class="text-white/70 mb-6">Welcome back 👋</p>

            @if ($errors->any())
            <div class="text-dark mb-3">
                {{ $errors->first() }}
            </div>
            @endif

            <form id="authForm" method="POST" action="{{ route('loginProses') }}" class="space-y-6">
                @csrf

                <!-- NAME (REGISTER ONLY) -->
                <div id="nameField" class="hidden">
                    <input name="name" type="text" placeholder="Full Name" value="{{ old('name') }}"
                        class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#FF6A2A]">
                </div>

                <!-- EMAIL -->
                <div>
                    <input name="email" type="email" placeholder="Email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#FF6A2A]">
                </div>

                <!-- PASSWORD -->
                <div>
                    <input name="password" type="password" placeholder="Password" required
                        class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#FF6A2A]">
                </div>

                <!-- CONFIRM PASSWORD (REGISTER ONLY) -->
                <div id="confirmField" class="hidden">
                    <input name="password_confirmation" type="password" placeholder="Confirm Password"
                        class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#FF6A2A]">
                </div>

                <!-- BUTTON -->
                <button id="submit" type="submit"
                    class="w-full py-3 rounded-lg bg-[#FF6A2A] hover:bg-[#ff7a3d] transition text-white font-semibold">
                    Sign In
                </button>

            </form>

            <!-- SWITCH -->
            <p class="text-sm text-white/70 mt-6">
                <span id="toggleText">Don't have an account?</span>
                <button type="button" onclick="toggleForm()" 
                    class="text-[#FF6A2A] font-semibold ml-1 hover:underline">
                    Sign up
                </button>
            </p>

        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        let isLogin = true;

        function toggleForm() {
            isLogin = !isLogin;

            document.getElementById('formTitle').innerText = isLogin ? 'Login' : 'Register';
            document.getElementById('submit').innerText = isLogin ? 'Sign In' : 'Sign Up';

            document.getElementById('toggleText').innerText = isLogin
                ? "Don't have an account?"
                : "Already have an account?";

            document.getElementById('nameField').classList.toggle('hidden');
            document.getElementById('confirmField').classList.toggle('hidden');

            document.getElementById('authForm').action = isLogin
                ? "{{ route('loginProses') }}"
                : "{{ route('registerProses') }}";
        }
    </script>

</body>
</html>