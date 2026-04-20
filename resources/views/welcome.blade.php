<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Niteksindo | Elcoblast</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="./dist/output.css">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @vite(['src/input.css'])
    <!-- Styles -->
</head>

{{-- Header start --}}
@include('layout.header')
{{-- Header end --}}

<body class="">
    {{-- Hero Start --}}
    <section id="home" class="pt-36">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-primary md:text-xl">Hallo Semua 🖐️,
                        <span class="block font-bold text-dark text-3xl mt-1">PT.Niteksindo Multitech Perkasa</span>
                    </h1>
                    <h2 class="font-medium text-slate-500 text-lg mb-5 max-w-md"> is a
                        Blasting and Painting Company. We are offering solution for surface preparation by using various
                        kind of material such as sandblasting, dry ice blasting and vapor abrasive blasting. <span
                            class="text-dark">This method has improved cleaning standards of companies industries. The
                            considerable of using this method are increasing productivity, product quality and
                            environment friendly.</span></h2>
                    <p class="font-medium text-secondary mb-10 leading-relaxed max-w-xl">Service Painting and Blasting
                    </p>

                    <a href="#"
                        class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:opacity-90">Hubungi
                        Kami</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="mt-10">
                        <img src="/img-home/A.Foto.jpg" alt="A.Foto.jpg" class="max-w-full mx-auto" />
                        {{-- <span class="absolute bottom-0 -z-0 left-1/2 translate-x-1/2">
                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF0066"
                                    d="M32.9,-49.9C39.9,-40.1,41,-26.9,43,-15.3C44.9,-3.7,47.6,6.3,46.8,17.1C45.9,27.9,41.5,39.4,33.1,43.4C24.7,47.3,12.3,43.7,1.1,42.3C-10.2,40.8,-20.4,41.4,-31.4,38.3C-42.4,35.2,-54.3,28.4,-58,18.5C-61.8,8.6,-57.5,-4.4,-52.6,-16.4C-47.7,-28.4,-42.2,-39.5,-33.4,-48.7C-24.5,-57.9,-12.3,-65.2,0.3,-65.7C12.9,-66.1,25.8,-59.7,32.9,-49.9Z"
                                    transform="translate(100 100)" />
                            </svg>
                        </span> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Hero End --}}

    {{-- About Section Start --}}
    <section id="about" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">About Me</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">Is the operation of forcibly
                        propelling a stream of abrasive material against a surface under high pressure to smooth a rough
                        surface, roughen a smooth surface, shape a surface or remove surface contaminants.</h2>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Our Blasting Service.</p>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <h3 class="semi-bold text-dark text-2xl mb-4 lg:text-3xl lg:pt-10">ZZZZ</h3>
                    <p class="font-medium text-base text-secondary mb-6 lg:text-lg">Lorem, ipsum dolor sit amet
                        consectetur adipisicing elit. Excepturi id fugit aspernatur blanditiis quaerat tempore minima
                        similique, labore non tempora laborum minus pariatur sequi ab recusandae magnam cupiditate sed
                        doloremque! Aliquam, illo!</p>
                </div>
                <div class="w-full px-4 flex items-center">
                    {{-- Youtube --}}
                    <a href="https://youtube.com" target="_blank"
                        class="w-6 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:text-primary">
                        <svg class="fill-current" role="img" width="20" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>YouTube</title>
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg></a>
                    {{-- instagram --}}
                    <a href="https://youtube.com" target="_blank"
                        class="w-8 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:text-primary">
                        <svg class="fill-current" role="img" width="20" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                        </svg>
                        {{-- location --}}
                        <a href="https://share.google/Y1CdMXsvC1r5hgB6Z" target="_blank"
                            class="w-10 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:text-primary">
                            <svg role="img" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Google Maps</title>
                                <path
                                    d="M19.527 4.799c1.212 2.608.937 5.678-.405 8.173-1.101 2.047-2.744 3.74-4.098 5.614-.619.858-1.244 1.75-1.669 2.727-.141.325-.263.658-.383.992-.121.333-.224.673-.34 1.008-.109.314-.236.684-.627.687h-.007c-.466-.001-.579-.53-.695-.887-.284-.874-.581-1.713-1.019-2.525-.51-.944-1.145-1.817-1.79-2.671L19.527 4.799zM8.545 7.705l-3.959 4.707c.724 1.54 1.821 2.863 2.871 4.18.247.31.494.622.737.936l4.984-5.925-.029.01c-1.741.601-3.691-.291-4.392-1.987a3.377 3.377 0 0 1-.209-.716c-.063-.437-.077-.761-.004-1.198l.001-.007zM5.492 3.149l-.003.004c-1.947 2.466-2.281 5.88-1.117 8.77l4.785-5.689-.058-.05-3.607-3.035zM14.661.436l-3.838 4.563a.295.295 0 0 1 .027-.01c1.6-.551 3.403.15 4.22 1.626.176.319.323.683.377 1.045.068.446.085.773.012 1.22l-.003.016 3.836-4.561A8.382 8.382 0 0 0 14.67.439l-.009-.003zM9.466 5.868L14.162.285l-.047-.012A8.31 8.31 0 0 0 11.986 0a8.439 8.439 0 0 0-6.169 2.766l-.016.018 3.665 3.084z" />
                            </svg>
                        </a>
                </div>
            </div>

        </div>
        </div>
    </section>
    {{-- About Section End --}}

    {{-- Portfolio Section Start --}}
    @include('layout.footer')
    {{-- Portfolio Section End --}}
</body>

</html>
{{-- @if (Route::has('login'))
<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    @auth
    <a href="{{ url('/home') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
    @else
    <a href="{{ route('login') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
        in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}"
        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
    @endif
    @endauth
</div>
@endif --}}
