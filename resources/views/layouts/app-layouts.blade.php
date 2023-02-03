<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>{{ $title ?? "" }} | PDAM Surya Sembada Surabaya</title>
</head>
<body class="min-h-screen bg-body overflow-hidden">
    <nav class="sidebar fixed top-0 left-0 min-h-screen w-64 bg-sidebar px-4 py-3 transition-all duration-500">
        <header class="image-text relative">
            <div class="flex items-center">
                <span class="flex items-center min-w-[60px]">
                    <img src="{{ asset("/images/logo PDAM.png") }}" alt="logo PDAM.png" class="w-12">
                </span>
                <div class="text header-text flex flex-col font-medium text-xs text-text whitespace-nowrap transition-all duration-400">
                    <span class="font-semibold">PDAM SURYA SEMBADA</span>
                    <span>KOTA SURABAYA</span>
                </div>
            </div>  

            <i class='bx bx-chevron-right toggle absolute justify-center items-center rounded-full top-1/2 -right-6 -translate-y-1/2 w-6 h-6 bg-sea text-sidebar cursor-pointer'></i>
        </header>

        <div class="menubar relative flex flex-col justify-between ">
            <div class="menu">
                {{ $search ?? "" }}
                <ul class="menu-links">
                    <li class="nav-link flex items-center h-12 mt-2 rounded-md">
                        <a href="{{ route("dashboard") }}" class="flex items-center h-full w-full transition-all duration-400 rounded-md {{ $title == "Dashboard" ? "active" : "asu" }} hover:bg-sea">
                            <i class='bx bx-home-alt icon justify-center items-center text-xl min-w-[60px] text-text'></i>
                            <span class="text font-medium text-sm text-text nav-text transition-all duration-300">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link flex items-center h-12 mt-2 rounded-md">
                        <a href="{{ route("application.index") }}" class="flex items-center h-full w-full transition-all duration-400 rounded-md {{ $title == "Application" ? "active" : "" }} hover:bg-sea">
                            <i class='bx bxs-layout icon justify-center items-center text-xl min-w-[60px] text-text'></i>
                            <span class="text font-medium text-sm text-text nav-text transition-all duration-300">Applications</span>
                        </a>
                    </li>
                    <li class="nav-link flex items-center h-12 mt-2 rounded-md">
                        <a href="{{ route("group.index") }}" class="flex items-center h-full w-full transition-all duration-400 rounded-md {{ $title == "Group" ? "active" : "" }} hover:bg-sea">
                            <i class='bx bx-windows icon justify-center items-center text-xl min-w-[60px] text-text'></i>
                            <span class="text font-medium text-sm text-text nav-text transition-all duration-300">Group</span>
                        </a>
                    </li>
                    <li class="nav-link flex items-center h-12 mt-2 rounded-md">
                        <a href="{{ route("profile.index") }}" class="flex items-center h-full w-full transition-all duration-400 rounded-md {{ $title == "Profile" ? "active" : "" }} hover:bg-sea">
                            <i class='bx bxs-user icon justify-center items-center text-xl min-w-[60px] text-text'></i>
                            <span class="text font-medium text-sm text-text nav-text transition-all duration-300">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content h-full">
                <li class="nav-link flex items-center h-12 mt-2 rounded-md">
                    <a href="{{ route("logout") }}" class="flex items-center h-full w-full hover:bg-red-600 transition-all duration-400 rounded-md">
                        <i class='bx bx-log-out icon justify-center items-center text-xl min-w-[60px] text-text'></i>
                        <span class="text font-medium text-sm text-text nav-text transition-all duration-300">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <main class="main absolute top-0 left-64 right-0 min-h-screen p-4 transition-all duration-500" >
        {{ $content ?? "" }}
    </main>

    {{ $modal ?? "" }}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const toggle = document.querySelector(".toggle");
        const sidebar = document.querySelector(".sidebar");
        const main = document.querySelector(".main");

        toggle.addEventListener("click", function(){
            sidebar.classList.toggle("close");
            main.classList.toggle("close");
        })        
    </script>

    {{ $script ?? "" }}

    {{ $alert ?? "" }}
</body>
</html>