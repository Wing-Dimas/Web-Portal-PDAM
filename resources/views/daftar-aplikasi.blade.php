<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet"> 
    <title>Daftar Aplikasi</title>
</head>
<body class="bg-[#EFF0F4] min-h-screen">
    {{-- SEARCH --}}
    <section class="banner relative h-48 md:h-64">
        <div class="flex relative z-20 justify-center top-16 px-2 sm:px-16 md:px-32">
            <div class="relative w-full max-w-xl">
                <ion-icon name="search" class="absolute left-2 top-1 text-2xl text-sea"></ion-icon>
                <input type="text" name="search-application" class="search-application rounded-full outline-none py-1 pl-10 pr-28 w-full placeholder:text-sea placeholder:font-medium" placeholder="Telusuri Aplikasi">
                <div class="flex items-center gap-3 absolute top-0.5 right-0.5">
                    <div class="dropdown relative">
                        <input type="hidden" name="kategori" id="kategori">
                        <button class="btn-filter bg-slate-300 p-1 flex items-center justify-center rounded-lg">
                            <ion-icon name="funnel" class="text-lg text-white"></ion-icon>
                        </button>
                        <ul class="menus hidden flex flex-col gap-3 absolute top-10 right-0 bg-white p-2 rounded-2xl w-64 font-medium text-sm transition-all duration-500">
                            <li onclick="prosesChangeGroup('')" class="menu hover:bg-slate-200 hover:rounded-xl hover:cursor-pointer p-2 bg-slate-200 rounded-xl">Semua</li>
                            @foreach ($groups as $group)
                                <li onclick="prosesChangeGroup('{{ $group->name }}')" class="menu hover:bg-slate-200 hover:rounded-xl hover:cursor-pointer p-2">{{ $group->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button class="btn-search bg-sea rounded-full text-sm text-white font-medium py-1 px-2">Search</button>
                </div>
            </div>
        </div>
        <svg class="absolute -bottom-0 z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#EFF0F4" fill-opacity="1" d="M0,128L40,149.3C80,171,160,213,240,224C320,235,400,213,480,208C560,203,640,213,720,208C800,203,880,181,960,197.3C1040,213,1120,267,1200,261.3C1280,256,1360,192,1400,160L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
    </section>

    {{-- CARDS --}}
    <section class="cards flex flex-wrap items-center justify-center mt-5 gap-3">
        {{-- Content created by JS --}}
    </section>

    {{-- FOOTER --}}
    <footer class="relative mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2d499c" fill-opacity="1" d="M0,160L30,176C60,192,120,224,180,245.3C240,267,300,277,360,250.7C420,224,480,160,540,128C600,96,660,96,720,133.3C780,171,840,245,900,250.7C960,256,1020,192,1080,149.3C1140,107,1200,85,1260,106.7C1320,128,1380,192,1410,224L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
        <div class="bg-sea pb-8">
            <p class="font-medium text-white text-xs md:text-base text-center">&copy; Copyright PDAM Surya Sembada Surabaya. All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/daftar-aplikasi.js"></script>
</body>
</html>