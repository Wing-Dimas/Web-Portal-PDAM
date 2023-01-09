<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet"> 
    <title>Web Portal</title>
</head>
<body class="min-h-screen">
    {{-- LOGO --}}
    <header class="bg-gradient-to-br from-sea to-aqua md:w-[640px] rounded-br-[100px] py-9 pl-20 pr-36 relative z-10">
        <img src="{{ asset("images/PDAM surya sembada kota surabaya.png") }}" alt="logo pdam surabaya" class="w-full">
    </header>
    <svg width="50" height="69" viewBox="0 0 50 69" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-10 md:top-20 right-52 lg:right-96">
        <circle cx="6" cy="6" r="6" fill="#2D499C"/>
        <circle cx="6" cy="25" r="6" fill="#2D499C"/>
        <circle cx="25" cy="25" r="6" fill="#2D499C"/>
        <circle cx="44" cy="25" r="6" fill="#2D499C"/>
        <circle cx="6" cy="44" r="6" fill="#2D499C"/>
        <circle cx="6" cy="63" r="6" fill="#2D499C"/>
        <circle cx="25" cy="44" r="6" fill="#2D499C"/>
        <circle cx="25" cy="63" r="6" fill="#2D499C"/>
        <circle cx="44" cy="44" r="6" fill="#2D499C"/>
        <circle cx="44" cy="63" r="6" fill="#2D499C"/>
        <circle cx="25" cy="6" r="6" fill="#2D499C"/>
        <circle cx="44" cy="6" r="6" fill="#2D499C"/>
    </svg>
    <svg width="340" height="340" viewBox="0 0 340 340" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute hidden md:block sm:-top-48 -top-44 -right-36">
        <circle cx="170.5" cy="169.5" r="150.5" fill="url(#paint0_linear_52_2)"/>
        <circle cx="170" cy="170" r="169" stroke="#2D499C" stroke-width="2"/>
        <defs>
        <linearGradient id="paint0_linear_52_2" x1="-21" y1="403" x2="225.5" y2="186" gradientUnits="userSpaceOnUse">
        <stop stop-color="#BDD855"/>
        <stop offset="1" stop-color="#2D499C"/>
        </linearGradient>
        </defs>
    </svg>

    {{-- HERO --}}
    <section class="hero flex flex-col justify-between lg:flex-row pt-4 p-4 sm:px-16 relative">
        <svg width="50" height="69" viewBox="0 0 50 69" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-28 -left-12 md:-left-6">
            <circle cx="6" cy="6" r="6" fill="#2D499C"/>
            <circle cx="6" cy="25" r="6" fill="#2D499C"/>
            <circle cx="25" cy="25" r="6" fill="#2D499C"/>
            <circle cx="44" cy="25" r="6" fill="#2D499C"/>
            <circle cx="6" cy="44" r="6" fill="#2D499C"/>
            <circle cx="6" cy="63" r="6" fill="#2D499C"/>
            <circle cx="25" cy="44" r="6" fill="#2D499C"/>
            <circle cx="25" cy="63" r="6" fill="#2D499C"/>
            <circle cx="44" cy="44" r="6" fill="#2D499C"/>
            <circle cx="44" cy="63" r="6" fill="#2D499C"/>
            <circle cx="25" cy="6" r="6" fill="#2D499C"/>
            <circle cx="44" cy="6" r="6" fill="#2D499C"/>
        </svg>
        <svg width="69" height="50" viewBox="0 0 69 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden lg:block absolute z-10 top-20 lg:right-8">
            <circle cx="6" cy="44" r="6" transform="rotate(-90 6 44)" fill="#2D499C"/>
            <circle cx="25" cy="44" r="6" transform="rotate(-90 25 44)" fill="#2D499C"/>
            <circle cx="25" cy="25" r="6" transform="rotate(-90 25 25)" fill="#2D499C"/>
            <circle cx="25" cy="6" r="6" transform="rotate(-90 25 6)" fill="#2D499C"/>
            <circle cx="44" cy="44" r="6" transform="rotate(-90 44 44)" fill="#2D499C"/>
            <circle cx="63" cy="44" r="6" transform="rotate(-90 63 44)" fill="#2D499C"/>
            <circle cx="44" cy="25" r="6" transform="rotate(-90 44 25)" fill="#2D499C"/>
            <circle cx="63" cy="25" r="6" transform="rotate(-90 63 25)" fill="#2D499C"/>
            <circle cx="44" cy="6" r="6" transform="rotate(-90 44 6)" fill="#2D499C"/>
            <circle cx="63" cy="6" r="6" transform="rotate(-90 63 6)" fill="#2D499C"/>
            <circle cx="6" cy="25" r="6" transform="rotate(-90 6 25)" fill="#2D499C"/>
            <circle cx="6" cy="6" r="6" transform="rotate(-90 6 6)" fill="#2D499C"/>
        </svg>
        
        <div class="left lg:pr-28">
            <h1 class="text-4xl md:text-5xl text-sea font-bold mb-2">Selamat Datang</h1>
            <h2 class="text-3xl md:text-4xl text-matcha font-semibold mb-2">DI WEB PORTAL <br>PDAM SURYA SEMBADA SURABAYA</h2>
            <p class="text-lg md:text-xl text-sea font-medium">Portal untuk akses aplikasi internal PDAM Surya Sembada Surabaya</p>
            <a href="#" class="btn-daftar-aplikasi mt-5 block">
                <span class="font-semibold text-lg sm:text-xl">Lihat Daftar Aplikasi</span>
                <div class="liquid"></div>
            </a>
        </div>
        <div class="relative text-center mt-8">
            <img src="{{ asset("images/selamat tahun baru.png") }}" alt="selamat tahun baru" class="hero-image ">
        </div>
    </section>
    <img src="{{ asset("images/air.png") }}" alt="air" class="absolute">

    {{-- FOOTER --}}
    <footer class="footer-home relative mt-16 overflow-hidden h-44 md:h-36">
        <div class="copyright pt-8 pr-12">
            <p class="font-medium text-white text-xs md:text-base text-right relative z-10 top-24 md:top-20">&copy; Copyright PDAM Surya Sembada Surabaya. All Rights Reserved</p>
        </div>
    </footer>

</body>
</html>