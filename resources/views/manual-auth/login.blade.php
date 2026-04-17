<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body
    class="bg-gradient-to-r from-[#F28383] from-10% via-[#9D6CD2] via-30% to-[#481EDC] to-90% flex items-center justify-center h-screen">
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auth Modern</title>

        <!-- Tailwind CDN -->

        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Font Awesome -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    </head>

    <body
        class="flex items-center justify-between px-6 py-4 border-b bg-slate-300/50 text-white">

        <div
            class="flex items-center justify-between px-6 py-4 border-b bg-slate-300/50 text-white">

            ```
            <!-- LEFT IMAGE -->
            <div class="hidden md:flex items-center justify-center p-10">
                <img src="https://illustrations.popsy.co/gray/web-design.svg" class="w-80">
            </div>

            <!-- RIGHT FORM -->
            <div class="md:p-12 text-white">

                <!-- TITLE -->
                <h2 id="formTitle" class="text-3xl font-bold mb-2">Login</h2>
                <p class="text-white/70 mb-6">Welcome back 👋</p>

                <!-- FORM -->
                <form class="w-full space-y-6">

                    <!-- NAME (REGISTER ONLY) -->
                    <div id="nameField" class="hidden">
                        <input type="text" placeholder="Full Name"
                            class="w-full px-4 py-3 rounded-lg bg-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-300 placeholder-white/70">
                    </div>

                    <!-- EMAIL -->
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-3 top-3 text-white/70"></i>
                        <input id="email" name="email" type="email" placeholder="Email"
                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-300 placeholder-white/70">
                    </div>

                    <!-- PASSWORD -->
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-3 top-3 text-white/70"></i>
                        <input id="password" name="password" type="password" placeholder="Password"
                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-300 placeholder-white/70">
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div id="confirmField" class="hidden relative">
                        <i class="fa-solid fa-lock absolute left-3 top-3 text-white/70"></i>
                        <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password"
                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-300 placeholder-white/70">
                    </div>

                    <!-- BUTTON -->
                    <button id="submit" type="submit"
                        class="w-full py-3 rounded-lg bg-gradient-to-r from-cyan-400 to-blue-500 font-semibold hover:opacity-90 transition">
                        Sign In
                    </button>

                </form>

                <!-- SWITCH -->
                <p class="text-sm text-white/70 mt-6">
                    <span id="toggleText">Don't have an account?</span>
                    <button onclick="toggleForm()" class="text-cyan-300 font-semibold ml-1">
                        Sign up
                    </button>
                </p>

            </div>
            ```

        </div>

        <!-- SCRIPT -->

        <script>
            let isLogin = true;

            function toggleForm() {
                isLogin = !isLogin;

                document.getElementById('formTitle').innerText = isLogin ? 'Login' : 'Register';
                document.getElementById('submitBtn').innerText = isLogin ? 'Sign In' : 'Sign Up';
                document.getElementById('toggleText').innerText = isLogin ?
                    "Don't have an account?" :
                    "Already have an account?";

                document.getElementById('nameField').classList.toggle('hidden');
                document.getElementById('confirmField').classList.toggle('hidden');
            }
        </script>

    </body>

    </html>


</body>

</html>
